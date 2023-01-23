<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Classes\Invoice;
use Modules\Account\Classes\Ledger;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Isp\Classes\Subscription;
use Modules\Isp\Entities\SubscriberLogin;

class SubscriptionController extends BaseController
{

    public function access(Request $request)
    {
        $request->session()->put('subscription_data', []);

        $subscription = new Subscription();
        $ledger = new Ledger();
        $invoice = new Invoice();

        $user = Auth::user();
        $subscriber = $subscription->getSubscriber();
        $packages = $subscription->getPackages();
        $invoices = $invoice->getPartnerInvoices($subscriber->partner_id);
        $featured_package = $current_package = $packages[0];

        $wallet = $ledger->getAccountBalance($subscriber->partner_id);

        $current_package->expiry_date = date(DATE_ATOM, mktime(23, 59, 0, date('m'), date('d'), date('Y')));

        //$featured_package=$current_package='';

        $data = [
            'subscriber' => $subscriber,
            'packages' => $packages,
            'featured_package' => $featured_package,
            'current_package' => $current_package,
            'invoices' => $invoices,
            'user' => $user,
            'wallet' => $wallet,
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

        $invoice = $subscription->buyPackage($id);

        if ($invoice->status == 'paid') {
            return redirect()->route('isp_access');
        } else {
            return redirect()->route('account_payment', ['invoice_id' => $invoice->id]);
        }
    }

    public function thankyou(Request $request)
    {

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber();

        $subscriber_login = SubscriberLogin::where('subscriber_id', $subscriber->id)->first();

        $data = [
            'subscriber' => $subscriber,
            'subscriber_login' => $subscriber_login,
        ];

        return view('isp::access-thankyou', $data);
    }

    public function mikrotiklogin(Request $request)
    {

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber();

        $subscriber_login = SubscriberLogin::where('subscriber_id', $subscriber->id)->first();

        $data = [
            'subscriber' => $subscriber,
            'subscriber_login' => $subscriber_login,
        ];

        return view('isp::access-mikrotik-login', $data);
    }
}
