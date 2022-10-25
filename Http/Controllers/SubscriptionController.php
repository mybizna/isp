<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Entities\Subscriber;
use Modules\Partner\Entities\Partner;

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

        if ($data['view'] == 'submit-login') {
            $where = ['username' => $data['username'], 'password' => $data['password']];

            $subscriber = Subscriber::where($where)->first();

            if ($subscriber === null) {
                $data['view'] = 'login';
            } else {
                $data['view'] = 'package';
            }
        }

        if ($data['view'] == 'submit-register') {

            $name_arr = explode(' ', $data['name']);

            $partner = Partner::create([
                'first_name' => $name_arr[0],
                'last_name' => $name_arr[1],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);

            $subscriber = Subscriber::create([
                'partner_id' => $partner->id,
                'username' => $data['username'],
                'password' => $data['password'],
            ]);

            $data['view'] = 'login';
        }

        if ($data['view'] == 'package') {
            $data['packages'] = DB::table('isp_package AS p')
                ->select('p.*', 'b.title as package_title')
                ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
                ->get();
        }

        return view('isp::access', $data);

    }
}
