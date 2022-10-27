<?php

namespace Modules\Isp\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Account\Classes\Invoice;
use Modules\Account\Entities\Invoice as DBInvoice;
use Modules\Isp\Entities\Subscriber;
use Modules\Partner\Classes\Partner;

class Subscription
{
    public function initData($request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
        } else {
            $data['view'] = $request->get('view', 'login');
            $data['mac'] = $request->get('mac');
            $data['ip'] = $request->get('ip');
            $data['username'] = $request->get('username');
            $data['link_login'] = $request->get('link-login');
            $data['link_orig'] = $request->get('link-orig');
            $data['error'] = $request->get('error');
            $data['chap_id'] = $request->get('chap-id');
            $data['chap_challenge'] = $request->get('chap-challenge');
            $data['link_login_id'] = $request->get('link-login-id');
            $data['link_orig_esc'] = $request->get('link-orig-esc');
            $data['mac_esc'] = $request->get('mac-esc');
        }

        return $data;
    }

    public function login($data)
    {
        $username = Str::of($data['username'])->trim();
        $password = Str::of($data['password'])->trim();

        $where = ['username' => $username, 'password' => $password];

        $subscriber = Subscriber::where($where)->first();

        if ($subscriber === null) {
            $data['view'] = 'login';
        } else {
            $data['view'] = 'package';
        }

        return $data;
    }

    public function register($data)
    {
        $partner_cls = new Partner();

        $name_arr = explode(' ', $data['name']);
        $username = Str::of($data['username'])->trim();
        $password = Str::of($data['password'])->trim();

        $partner = $partner_cls->createPartner([
            'first_name' => $name_arr[0],
            'last_name' => $name_arr[1],
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

            $data['view'] = 'login';

        }

        return $data;
    }

    public function package($data)
    {

        $username = Str::of($data['username'])->trim();

        $data['packages'] = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        $subscriber = Subscriber::where(['username' => $username])->first();

        $invoices = DBInvoice::where(['partner_id' => $subscriber->partner_id])->get();

        $data['invoices'] = collect([]);

        if ($invoices) {
            $data['invoices'] = $invoices;
        }

        return $data;
    }

    public function packageId($data)
    {
        $invoice = new Invoice();

        $view_arr = explode('_', $data['view']);
        $username = Str::of($data['username'])->trim();

        $data['package'] = $package = DB::table('isp_package AS p')
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

        $data['invoice'] = $invoice;

        $data['view'] = 'payment';

        return $data;
    }

    public function payment($data)
    {

        $data['packages'] = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        return $data;
    }

    public function invoiceCancel($data)
    {
        $invoice = new Invoice();

        $view_arr = explode('_', $data['view']);

        $invoice->deleteInvoices($view_arr[1]);

        $data['view'] = 'package';

        return $data;
    }

    public function invoiceBuy($data)
    {
        $view_arr = explode('_', $data['view']);

        $invoice_id = $view_arr[1];

        $invoice = DBInvoice::where(['id' => $invoice_id])->get();

        $data['invoice'] = $invoice;

        $data['view'] = 'payment';

        return $data;
    }
}
