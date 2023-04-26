<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Account\Classes\Invoice;
use Modules\Account\Classes\Ledger;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;
use Modules\Isp\Entities\SubscriberLogin;
use Modules\Isp\Entities\Subscription as DBSubscription;
use Session;

class SubscriptionController extends BaseController
{
    public function summary(Request $request)
    {
        $subscription = new Subscription();

        $data = $request->all();

        $result = $subscription->summary($data);

        return response()->json($result);
    }
    public function access(Request $request)
    {
        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = [];
        //$s_data = $request->session()->get('subscription_data', []);

        $data = array_merge($r_data, $s_data);

        $data = $subscription->processData($data);

        $request->session()->put('subscription_data', $data);

        return redirect()->route('isp_profile');
    }

    public function profile(Request $request)
    {
        $subscription = new Subscription();
        $ledger = new Ledger();
        $invoice = new Invoice();

        $data = $request->session()->get('subscription_data', []);

        $partner = false;
        $subscriber = $subscription->getSubscriber($data);
        $packages = $subscription->getPackages();
        $featured_package = $packages[0];
        $user_packages = [];
        $current_package = false;
        $invoices = collect([]);
        $wallet = collect([]);

        if (isset($subscriber->partner_id) && $subscriber->partner_id) {
            $invoices = $invoice->getPartnerInvoices($subscriber->partner_id);
            $wallet = $ledger->getAccountBalance($subscriber->partner_id);
            $partner = $subscription->getPartner($subscriber->partner_id);
            $user_packages = $subscription->getUserPackages($subscriber->id);
            $current_package = $subscription->getCurrentPackage($subscriber->id);
        }

        $data = [
            'return_url' => base64_encode(url(route('isp_access_thankyou'))),
            'profile_return_url' => base64_encode(url(route('isp_profile'))),
            'subscriber' => $subscriber,
            'packages' => $packages,
            'featured_package' => $featured_package,
            'current_package' => $current_package,
            'user_packages' => $user_packages,
            'invoices' => $invoices,
            'wallet' => $wallet,
            'partner' => $partner,
        ];

        return view('isp::access-dashboard', $data);
    }
    public function autosubscribe(Request $request)
    {

        $subscription = new Subscription();

        $subscriber_id = $request->get('subscriber_id');
        $package_id = $request->get('package_id');

        $subscription->addSubscription($package_id, $subscriber_id);

        $result = [
            'error' => 0,
            'status' => 1,
            'message' => 'Auto Subscribed Successfully.',
        ];

        return response()->json($result);

    }
    public function buyPackage(Request $request, $id)
    {
        $subscription = new Subscription();

        $data = $request->session()->get('subscription_data', []);

        $subscriber = $subscription->getSubscriber($data);
        $invoice = $subscription->buyPackage($id, $subscriber->id);

        if ($invoice->status == 'paid') {
            return redirect()->route('isp_access_thankyou');
        } else {
            return redirect()->route('account_payment', ['invoice_id' => $invoice->id]);
        }
    }

    public function canceled(Request $request)
    {
        $data = $request->session()->get('subscription_data', []);

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);

        $data['subscriber'] = $subscriber;

        return view('isp::access-canceled', $data);
    }

    public function error(Request $request)
    {
        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        return view('isp::access-error', $data);
    }

    public function thankyou(Request $request)
    {

        $data = $request->session()->get('subscription_data', []);

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);

        $data['subscriber'] = $subscriber;

        return view('isp::access-thankyou', $data);
    }

    public function login(Request $request)
    {
        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        $data['message'] = $request->query('message', '');

        return view('isp::access-login', $data);
    }

    public function savelogin(Request $request)
    {
        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($s_data, $r_data);

        $username = $data['username'];
        $phone = substr($data['phone'], -9);

        $subscriber = DBSubscription::from('isp_subscriber as iser')
            ->select('iser.*')
            ->leftJoin('partner AS p', 'p.id', '=', 'iser.partner_id')
            ->where('iser.username', $username)
            ->where(function ($query) use ($phone) {
                $query->orWhere('p.phone', 'LIKE', '%' . $phone . '%');
                $query->orWhere('p.mobile', 'LIKE', '%' . $phone . '%');
            })
            ->first();

        if ($subscriber) {
            $data['subscriber_id'] = $subscriber->id;
            $data['partner_id'] = $subscriber->partner_id;

            $request->session()->put('subscription_data', $data);

            return redirect()->route('isp_profile');
        } else {
            $request->session()->put('subscription_data', $data);

            $message = "No account that has phone " . $data['phone'] . " and username " . $data['username'];

            return redirect()->route('isp_access_login', ['message' => $message]);
        }

    }
    public function buyform(Request $request)
    {
        $error = false;
        $message = '';

        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        if (!$data['package_id']) {
            $error = true;
            $message = $message . 'Package Id not Found. ';
        }

        if ((!isset($data['mac']) || $data['mac'] == '') && (!isset($data['partner_id']) || $data['partner_id'] == '')) {
            $error = true;
            $return_url = base64_encode(url(route('isp_access_thankyou')));
            return redirect()->route('isp_access_login', ['message' => $message, 'return_url' => $return_url]);
        }

        $request->session()->put('subscription_data', $data);

        if ($error) {
            return redirect()->route('isp_access_error', ['message' => $message]);
        } else {
            $subscriber = $subscription->getSubscriber($data);

            if ($subscriber) {
                return redirect()->route('isp_access_savebuyform', [
                    'package_id' => $data['package_id'],
                    'subscriber_id' => $subscriber->id,
                ]);
            }

            return view('isp::access-buyform', $data);
        }

    }
    public function savebuyform(Request $request)
    {
        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        $invoice = $subscription->saveSubcriber($data);

        if ($invoice->status == 'paid') {
            return redirect()->route('isp_access_mikrotik_login');
        } else {
            return redirect()->route('account_payment', ['invoice_id' => $invoice->id]);
        }

    }

    public function mikrotiklogin(Request $request)
    {
        $data = $request->session()->get('subscription_data', []);

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);
        $subscriber_login = SubscriberLogin::where('mac', $data['mac'])->first();

        $data = [
            'subscriber' => $subscriber,
            'subscriber_login' => $subscriber_login,
        ];

        return view('isp::access-mikrotik-login', $data);
    }

    public function billingCycleSelect(Request $request)
    {

        $type = $request->get('type');

        $result = [
            'module' => 'isp',
            'model' => 'billing_cycle',
            'status' => 0,
            'total' => 0,
            'error' => 1,
            'records' => [],
            'message' => 'No Records',
        ];

        $query = DB::table('isp_billing_cycle');

        try {
            $records = $query->get();
            $list = collect();
            $list->push(['value' => '', 'label' => '--- Please Select ---']);

            foreach ($records as $key => $record) {
                $list->push(['value' => $record->id, 'label' => $record->title]);
            }

            $result['error'] = 0;
            $result['status'] = 1;
            $result['records'] = $list;
            $result['message'] = 'Records Found Successfully.';
        } catch (\Throwable$th) {
            //throw $th;
        }

        return response()->json($result);
    }
}
