<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);

        return view('isp::access-login', $data);
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
            return redirect()->route('isp_access_login');
        }

        return redirect()->route('isp_access_packages');
    }

    public function invoicecancel(Request $request, $id)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);
        $subscription->invoicecancel($data);

        return redirect()->route('isp_access_packages');
    }

    public function invoicebuy(Request $request, $id)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);
        $has_invoice = $subscription->invoicebuy($data);

        if ($has_invoice) {
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

        if ($result == true) {
            return redirect()->route('isp_access_thankyou');
        }

        return redirect()->route('isp_access_payment');
    }

    public function stkpush(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);
        $result = $subscription->stkpush($data);

        if ($result == true) {
            return redirect()->route('isp_access_thankyou');
        } else if (is_array($result)) {
            $subscription->processData($request, $tmpdata);
        }

        return redirect()->route('isp_access_payment');

    }

    public function payment(Request $request)
    {
        $subscription = new Subscription();

        $data = $subscription->processData($request);
        $tmpdata = $subscription->payment($data);

        $data = $subscription->processData($request, $tmpdata);

        return view('isp::access-payment', $data);
    }

    public function thankyou(Request $request)
    {

        $subscription = new Subscription();

        $data = $subscription->processData($request);
        $data = $subscription->thankyou($data);

        return view('isp::access-thankyou', $data);
    }

}
