<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Account\Classes\Invoice;
use Modules\Account\Classes\Ledger;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Core\Classes\Currency;
use Modules\Isp\Classes\Subscription;
use Modules\Isp\Models\SubscriberLogin;
use Modules\Isp\Models\Subscription as DBSubscription;
use Session;

class SubscriptionController extends BaseController
{
    public function summary(Request $request)
    {
        $subscription = new Subscription();

        $data = $request->all();

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $result = $subscription->summary($data);

        return response()
            ->json($result)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
    }
    public function access(Request $request)
    {
        $subscription = new Subscription();
        $currency = new Currency();

        $data = $request->all();

        if (!empty($data)) {
            $data['currency'] = $currency->getDefaultCurrency();

            $data = $subscription->processData($data);

            $request->session()->put('subscription_data', $data);
        }

        return redirect()
            ->route('isp_profile')
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
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

        $result = [
            'mac' => $data['mac'] ?? '',
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

        $currency = new Currency();
        $result['currency'] = $currency->getDefaultCurrency();

        if (isset($data['mac']) && $data['mac'] != '' && count($user_packages) > 0) {
            return redirect()
                ->route('isp_access_mikrotik_login')
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        } else {
            return response()
                ->view('isp::access-dashboard', $result)
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

        }

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

        return response()
            ->json($result)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

    }
    public function buyPackage(Request $request, $id)
    {
        $invoice = null;

        $currency = new Currency();
        $subscription = new Subscription();

        $data = $request->session()->get('subscription_data', []);

        $data['package_id'] = $id;
        $data['return_url'] = $request->get('return_url');
        $data['currency'] = $currency->getDefaultCurrency();

        $subscriber = $subscription->getSubscriber($data);

        if ($subscriber) {
            $invoice = $subscription->buyPackage($id, $subscriber->id);
        } else {
            $invoice = $subscription->saveSubcriber($request, $data);
        }

        $request->session()->put('subscription_data', $data);

        if ($invoice) {
            if ($invoice->status == 'paid') {
                return redirect()
                    ->route('isp_access_thankyou')
                    ->header('pragma', 'no-cache')
                    ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
            } else {
                return redirect()
                    ->route('account_payment', ['invoice_id' => $invoice->id, 'return_url' => $data['return_url']])
                    ->header('pragma', 'no-cache')
                    ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
            }
        }
    }

    public function canceled(Request $request)
    {
        $data = $request->session()->get('subscription_data', []);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);

        $data['subscriber'] = $subscriber;

        return response()
            ->view('isp::access-canceled', $data)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function error(Request $request)
    {
        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        return response()
            ->view('isp::access-error', $data)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function thankyou(Request $request)
    {

        $data = $request->session()->get('subscription_data', []);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);

        $data['subscriber'] = $subscriber;

        return response()
            ->view('isp::access-thankyou', $data)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function login(Request $request)
    {
        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $data['message'] = $request->query('message', '');

        return response()
            ->view('isp::access-login', $data)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

    }

    public function savelogin(Request $request)
    {
        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($s_data, $r_data);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

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

            return redirect()
                ->route('isp_profile')
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        } else {
            $request->session()->put('subscription_data', $data);

            $message = "No account that has phone " . $data['phone'] . " and username " . $data['username'];

            return redirect()
                ->route('isp_access_login', ['message' => $message])
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
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

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        if (!$data['package_id']) {
            $error = true;
            $message = $message . 'Package Id not Found. ';
        }

        if ((!isset($data['mac']) || $data['mac'] == '') && (!isset($data['partner_id']) || $data['partner_id'] == '')) {
            $error = true;
            $return_url = base64_encode(url(route('isp_access_thankyou')));
            return redirect()
                ->route('isp_access_login', ['message' => $message, 'return_url' => $return_url])
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

        }

        $request->session()->put('subscription_data', $data);

        if ($error) {
            return redirect()
                ->route('isp_access_error', ['message' => $message])
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

        } else {
            $subscriber = $subscription->getSubscriber($data);

            if ($subscriber) {
                return redirect()
                    ->route('isp_access_savebuyform', [
                        'package_id' => $data['package_id'],
                        'subscriber_id' => $subscriber->id,
                    ])
                    ->header('pragma', 'no-cache')
                    ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');

            }

            return response()
                ->view('isp::access-buyform', $data, 200)
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        }

    }
    public function savebuyform(Request $request)
    {
        $subscription = new Subscription();

        $r_data = $request->all();
        $s_data = $request->session()->get('subscription_data', []);
        $data = array_merge($r_data, $s_data);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $invoice = $subscription->saveSubcriber($request, $data);

        if ($invoice->status == 'paid') {
            return redirect()
                ->route('isp_access_mikrotik_login')
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        } else {
            return redirect()
                ->route('account_payment', ['invoice_id' => $invoice->id])
                ->header('pragma', 'no-cache')
                ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
        }

    }

    public function mikrotiklogin(Request $request)
    {
        $data = $request->session()->get('subscription_data', []);

        $currency = new Currency();
        $data['currency'] = $currency->getDefaultCurrency();

        $subscription = new Subscription();

        $subscriber = $subscription->getSubscriber($data);
        $subscriber_login = SubscriberLogin::where('mac', $data['mac'])->first();

        $result = [
            'subscriber' => $subscriber,
            'subscriber_login' => $subscriber_login,
        ];

        return response()
            ->view('isp::access-mikrotik-login', $result, 200)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
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
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()
            ->json($result)
            ->header('pragma', 'no-cache')
            ->header('Cache-Control', 'no-store,no-cache, must-revalidate, post-check=0, pre-check=0');
    }
}
