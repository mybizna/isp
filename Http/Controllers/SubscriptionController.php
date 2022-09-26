<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {

        $mac =  $request->get('mac');
        $ip =  $request->get('ip');
        $username =  $request->get('username');
        $link_login =  $request->get('link-login');
        $link_orig =  $request->get('link-orig');
        $error =  $request->get('error');
        $chap_id =  $request->get('chap-id');
        $chap_challenge =  $request->get('chap-challenge');
        $link_login_id =  $request->get('link-login-id');
        $link_orig_esc =  $request->get('link-orig-esc');
        $mac_esc =  $request->get('mac-esc');

        $result = [
            'mac' => $mac,
            'ip' => $ip,
            'username' => $username,
            'link_login' => $link_login,
            'link_orig' => $link_orig,
            'error' => $error,
            'chap_id' => $chap_id,
            'chap_challenge' => $chap_challenge,
            'link_login_id' => $link_login_id,
            'link_orig_esc' => $link_orig_esc,
            'mac_esc' => $mac_esc,
        ];

        return view('isp::access', $result );

    }
}
