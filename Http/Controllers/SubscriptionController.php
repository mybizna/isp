<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {

        $data = [];

        $subscription = new Subscription();

        $data = $subscription->initData();

        if ($data['view'] == 'submit-login') {
            $data = $subscription->login($data);
        } elseif ($data['view'] == 'submit-register') {
            $data = $subscription->register($data);

        } elseif ($data['view'] == 'package') {
            $data = $subscription->package($data);
        } elseif (Str::contains($data['view'], 'package_')) {
            $data = $subscription->packageId($data);
        }

        print_r($data);
        exit;

        return view('isp::access', $data);

    }
}
