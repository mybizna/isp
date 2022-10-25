<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {

        $data = [];

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
        
        if ($data['view'] == 'package') {
            $data['packages'] = DB::table('isp_package')->all();
        }

        return view('isp::access', $data);

    }
}
