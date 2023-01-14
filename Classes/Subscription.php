<?php

namespace Modules\Isp\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Account\Classes\Invoice;
use Modules\Account\Entities\Invoice as DBInvoice;
use Modules\Isp\Entities\Subscriber;
use Modules\Mpesa\Classes\Mpesa;
use Modules\Partner\Classes\Partner;
use Session;

class Subscription
{
    public function processData($request, $tmp_data = [])
    {
        $data = Session::get('subscription_data');

        if (empty($tmp_data)) {
            if ($request->isMethod('post')) {
                $tmp_data = $request->all();
            } else {
                if (empty($data)) {
                    $tmp_data['phone'] = '';
                    $tmp_data['view'] = $request->get('view', 'login');
                    $tmp_data['mac'] = $request->get('mac');
                    $tmp_data['ip'] = $request->get('ip');
                    $tmp_data['username'] = $request->get('username');
                    $tmp_data['link_login'] = $request->get('link-login');
                    $tmp_data['link_orig'] = $request->get('link-orig');
                    $tmp_data['error'] = $request->get('error');
                    $tmp_data['chap_id'] = $request->get('chap-id');
                    $tmp_data['chap_challenge'] = $request->get('chap-challenge');
                    $tmp_data['link_login_id'] = $request->get('link-login-id');
                    $tmp_data['link_orig_esc'] = $request->get('link-orig-esc');
                    $tmp_data['mac_esc'] = $request->get('mac-esc');
                }
            }
        }

        $data = array_merge($data, $tmp_data);

        Session::put('subscription_data', $data);

        $data = Session::get('subscription_data', []);

        return $data;
    }

    public function login($data)
    {
        $username = Str::of($data['username'])->trim();
        $password = Str::of($data['password'])->trim();

        $where = ['username' => $username, 'password' => $password];

        $subscriber = Subscriber::where($where)->first();

        if ($subscriber === null) {
            return false;
        }

        return true;
    }

    public function register($data)
    {
        $partner_cls = new Partner();

        $name_arr = explode(' ', $data['name']);
        $username = Str::of($data['username'])->trim();
        $password = Str::of($data['password'])->trim();

        $partner = $partner_cls->createPartner([
            'first_name' => (isset($name_arr[0])) ? $name_arr[0] : '',
            'last_name' => (isset($name_arr[1])) ? $name_arr[1] : '',
            'email' => $data['email'],
            'phone' => $data['phone'],
            'slugs' => [$username],
        ]);

        if ($partner) {
            $subscriber = Subscriber::create([
                'partner_id' => $partner->id,
                'username' => $username,
                'password' => $password,
            ]);

            return true;
        }

        return false;
    }

    public function getSubscriber()
    {
        $user = Auth::user();

        $subscriber = Subscriber::where(['username' => $user->username])->first();

        return $subscriber;

    }

    public function getPackages()
    {
        $packages = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        return $packages;

    }

    public function getInvoices($subscriber)
    {
        $invoices = collect([]);

        if (isset($subscriber->partner_id) && $subscriber->partner_id) {
            $invoices = DBInvoice::where(['partner_id' => $subscriber->partner_id])->get();
        }

        return $invoices;
    }

    public function packages($data)
    {
        $username = Str::of($data['username'])->trim();

        $tmpdata = [];
        $tmpdata['packages'] = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        $subscriber = Subscriber::where(['username' => $username])->first();

        $invoices = DBInvoice::where(['partner_id' => $subscriber->partner_id])->get();

        $tmpdata['invoices'] = collect([]);

        if ($invoices) {
            $tmpdata['invoices'] = $invoices;
        }

        return $tmpdata;

    }

    public function singlePackage($data, $id)
    {
        $invoice = new Invoice();

        $view_arr = explode('_', $data['view']);
        $username = Str::of($data['username'])->trim();

        $tmpdata = [];
        $tmpdata['package'] = $package = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.id' => $view_arr[1]])
            ->first();

        $subscriber = Subscriber::where(['username' => $username])->first();

        $title = $package->title . " " . $package->speed . " " . $username;
        $partner_id = $subscriber->partner_id;
        $amount = $package->amount;

        $items = [['title' => $title, 'price' => $amount, 'total' => $amount]];

        $invoice_id = $invoice->generateInvoice($title, $partner_id, $items, description:$title);

        $invoice = DBInvoice::where(['id' => $invoice_id])->get();

        $tmpdata['invoice'] = $invoice;

        return $tmpdata;
    }

    public function payment($data)
    {
        $tmpdata = [];

        if (!isset($data['phone'])) {
            $tmpdata['phone'] = '';
        }

        $tmpdata['packages'] = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        return $tmpdata;
    }

    public function invoiceCancel($data, $id)
    {
        $invoice = new Invoice();

        $invoice->deleteInvoices($id);
    }

    public function getInvoice($id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();

        if ($invoice === null) {
            return false;
        }

        return $invoice;
    }

    public function invoiceBuy($data, $id)
    {
        $tmpdata = [];

        $invoice = DBInvoice::where(['id' => $id])->first();

        if ($invoice === null) {
            return false;
        }

        $tmpdata['invoice_id'] = $id;

        return $tmpdata;
    }

    public function paybill($data)
    {

        $invoice = DBInvoice::where(['id' => $data['invoice_id']])->first();

        $tmpdata = [];

        $tmpdata['invoice'] = $invoice;

        return $tmpdata;
    }

    public function tillno($data)
    {
        $invoice = DBInvoice::where(['id' => $data['invoice_id']])->first();

        $tmpdata = [];

        $tmpdata['invoice'] = $invoice;

        return $tmpdata;
    }

    public function stkpush($data)
    {
        $invoice = DBInvoice::where(['id' => $data['invoice_id']])->first();

        $tmpdata = [];
        $tmpdata['invoice'] = $invoice;

        if (isset($data['verifying']) && $data['verifying']) {
            $data['view'] = 'thankyou';
            $mpesa = new Mpesa();
            $stkpush = $mpesa->validateStkpush($data['phone'], $invoice->total, $invoice->title, $invoice->partner_id, $invoice->id);
            return true;
        } else {
            $mpesa = new Mpesa();
            $stkpush = $mpesa->stkpush($data['phone'], $invoice->total, $invoice->title);

            if ($stkpush) {
                $tmpdata['request_sent'] = 1;
            } else {
                $tmpdata['request_sent'] = 0;
            }
        }

        return $tmpdata;
    }

}
