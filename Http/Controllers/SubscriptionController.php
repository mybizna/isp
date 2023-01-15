<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;
use Modules\Mpesa\Entities\Gateway;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {
        $request->session()->put('subscription_data', []);

        $subscription = new Subscription();

        $user = Auth::user();
        $subscriber = $subscription->getSubscriber();
        $packages = $subscription->getPackages();
        $invoices = $subscription->getInvoices($subscriber);
        $featured_package = $current_package = $packages[0];

        $current_package->expiry_date = date(DATE_ATOM, mktime(23, 59, 0, date('m'), date('d'), date('Y')));

        //$featured_package=$current_package='';

        $data = [
            'subscriber' => $subscriber,
            'packages' => $packages,
            'featured_package' => $featured_package,
            'current_package' => $current_package,
            'invoices' => $invoices,
            'user' => $user,
        ];

        return view('isp::access-dashboard', $data);
    }

    public function register(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        return view('isp::access-register', $data);
    }

    public function submitregister(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $is_registered = $subscription->register($data);

        if ($is_registered) {
            return redirect()->route('isp_access_login');
        }

        return redirect()->route('isp_access_register');
    }

    public function login(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        return view('isp::access-login', $data);
    }

    public function submitlogin(Request $request)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $is_logged_in = $subscription->login($data);

        if ($is_logged_in) {
            return redirect()->route('isp_access_packages');
        }

        return redirect()->route('isp_access_login');
    }

    public function invoicecancel(Request $request, $id)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $subscription->invoicecancel($data, $id);

        return redirect()->route('isp_access_packages');
    }

    public function invoicebuy(Request $request, $id)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $result = $subscription->invoiceBuy($data, $id);

        if (is_array($result)) {
            $data = $subscription->processData($request, $result);
            return redirect()->route('isp_access_payment');
        }

        return redirect()->route('isp_access_packages');
    }

    public function packages(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $tmpdata = $subscription->packages($data);

        $data = $subscription->processData($request, $tmpdata);

        return view('isp::access-packages', $data);
    }

    public function singlepackage(Request $request, $id)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $tmpdata = $subscription->singlePackage($data, $id);

        $data = $subscription->processData($request, $tmpdata);

        return redirect()->route('isp_access_payment');
    }

    public function paybill(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $result = $subscription->paybill($data);

        if ($result == true) {
            return redirect()->route('isp_access_thankyou');
        }

        return redirect()->route('isp_access_payment');
    }

    public function tillno(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $result = $subscription->tillno($data);

        if ($result === true) {
            return redirect()->route('isp_access_thankyou');
        }

        return redirect()->route('isp_access_payment');
    }

    public function stkpush(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $result = $subscription->stkpush($data);
        $tmp_data = ['request_sent' => 0];
        if ($result === true) {
            return redirect()->route('isp_access_thankyou');
        } else if (is_array($result)) {
            $data = $subscription->processData($request, $result);
            $tmp_data['request_sent'] = 1;
        }

        return redirect()->route('isp_access_payment', $tmp_data);
    }

    public function payment(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        $tmpdata = $subscription->payment($data);

        $tmp_data['request_sent'] = $request->get('request_sent', 0);
        $tmp_data['gateway'] = Gateway::where(['default' => true])->first();
        $tmp_data['invoice'] = $subscription->getInvoice($data['invoice_id']);

        $data = array_merge($data, $tmp_data);

        return view('isp::access-payment', $data);
    }

    public function thankyou(Request $request)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);

        //$data = $subscription->thankyou($data);

        return view('isp::access-thankyou', $data);
    }

}
