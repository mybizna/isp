<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {

        $data = [];

        $subscription = new Subscription();

        $data = $subscription->initData($request);

        if ($data['view'] == 'submit-login') {
            $data = $subscription->login($data);
        } 
        
        if ($data['view'] == 'submit-register') {
            $data = $subscription->register($data);
        } 
        
        if ($data['view'] == 'package') {
            $data = $subscription->package($data);
        } 
        
        if (Str::contains($data['view'], 'package_')) {
            $data = $subscription->packageId($data);
        } 
        
        if (Str::contains($data['view'], 'invoicecancel_')) {
            $data = $subscription->invoiceCancel($data);
        } 
        
        if (Str::contains($data['view'], 'invoicebuy_')) {
            $data = $subscription->invoiceBuy($data);
        } 
        
        if ($data['view'] == 'payment') {
            $data = $subscription->payment($data);
        }

        return view('isp::access', $data);

    }
}
