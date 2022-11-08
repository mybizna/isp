<?php

namespace Modules\Isp\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Account\Classes\Invoice;
use Modules\Account\Entities\Invoice as DBInvoice;
use Modules\Isp\Entities\Subscriber;
use Modules\Mpesa\Classes\Mpesa;
use Modules\Partner\Classes\Partner;

class Subscription
{
    public function processData($request, $tmp_data = [])
    {
        $data = $request->session()->get('subscription_data', []);

        if (empty($tmp_data)) {
            if ($request->isMethod('post')) {
                $tmp_data = $request->all();
            } else {
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

        $data = array_merge($tmp_data, $data);

        $request->session()->put('subscription_data', $tmp_data);

        $data = $request->session()->get('subscription_data', []);

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

        if (!isset($data['request_sent'])) {
            $tmpdata['request_sent'] = 0;
        }

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

    public function invoiceBuy($data, $id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();

        $data['invoice'] = $invoice;

        if ($invoice === null) {
            return false;
        }

        return true;
    }

    public function paybill($data, $id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();

        $tmpdata = [];

        $tmpdata['invoice'] = $invoice;

        return $tmpdata;
    }

    public function tillno($data, $id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();
        
        $tmpdata = [];

        $tmpdata['invoice'] = $invoice;

        return $tmpdata;
    }

    public function stkpush($data, $id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();

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
