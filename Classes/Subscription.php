<?php

namespace Modules\Isp\Classes;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Account\Classes\Invoice;
use Modules\Account\Entities\Invoice as DBInvoice;
use Modules\Isp\Classes\Freeradius;
use Modules\Isp\Entities\Subscriber;
use Modules\Isp\Entities\Subscription as DBSubscription;
use Modules\Partner\Classes\Partner as PartnerCls;
use Modules\Partner\Entities\Partner;
use Session;

class Subscription
{
    public function processData( $data = [])
    {
        Session::put('subscription_data', $data);

        return $data;
    }

    public function getSubscriber($user_id = '')
    {
        $partner_cls = new PartnerCls();

        $user = Auth::user();

        if ($user_id) {
            $user = User::where(['id' => $user_id])->first();
        }

        $subscriber = Subscriber::where(['username' => $user->username])->first();
        
        $partner = $partner_cls->getPartner($user->username);

        if (!$subscriber) {
            $partner = $this->addPartner($user);

            if ($partner) {
                $subscriber = $this->addSubscriber($partner, $user);
            }
        }else{
            if($partner->id != $subscriber->partner_id){
                $subscriber->partner_id = $partner->id;
                $subscriber->save();
            }
        }

        return $subscriber;

    }

    public function addSubscriber($partner, $user)
    {
        $subscriber = Subscriber::where('username', $user->username)->first();

        if (!$subscriber) {
            $password = $this->generatePassword(8);

            $subscriber = Subscriber::create([
                'partner_id' => $partner->id,
                'username' => $user->username,
                'password' => $password,
            ]);
        }

        return $subscriber;

    }

    public function addSubscription($package_id, $subscriber_id)
    {
        $package = $this->getPackage($package_id);

        $date = Carbon::now();

        $start_date = $date->toDateTimeString();

        switch ($package->duration_type) {
            case 'minute':
                $date = ($package->duration) ? $date->addMinutes($package->duration) : $date->addMinute();
                break;
            case 'hour':
                $date = ($package->duration) ? $date->addHours($package->duration) : $date->addHour();
                break;
            case 'day':
                $date = ($package->duration) ? $date->addDays($package->duration) : $date->addDay();
                break;

            case 'week':
                $date = ($package->duration) ? $date->addWeeks($package->duration) : $date->addWeek();
                break;

            case 'month':
                $date = ($package->duration) ? $date->addMonths($package->duration) : $date->addMonth();
                break;

            case 'year':
                $date = ($package->duration) ? $date->addYears($package->duration) : $date->addYear();
                break;
            default:
                throw new \Exception("Package [$package->title] does not have correct Duration setting", 1);
                break;
        }

        $end_date = $date->toDateTimeString();

        $input['subscriber_id'] = $subscriber_id;
        $input['package_id'] = $package->id;
        $input['start_date'] = $start_date;
        $input['end_date'] = $end_date;

        $subscription = DBSubscription::create($input);

        if ($subscription) {
            $freeradius = new Freeradius($subscription);
            $freeradius->setPackages();
            $freeradius->setUser($package);
        }

    }

    public function addPartner($user)
    {
        $partner_cls = new PartnerCls();

        $name_arr = explode(' ', $user->name);

        $partner = Partner::where('email', $user->email)
            ->orWhere('phone', $user->phone)->first();

        if (!$partner) {
            $partner = $partner_cls->createPartner([
                'first_name' => (isset($name_arr[0])) ? $name_arr[0] : '',
                'last_name' => (isset($name_arr[1])) ? $name_arr[1] : '',
                'email' => $user->email,
                'phone' => $user->phone,
                'slugs' => [$user->username],
            ]);
        }

        return $partner;

    }

    public function getPackages()
    {
        $packages = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title', 'b.duration_type', 'b.duration')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.is_hidden' => false])
            ->get();

        return $packages;

    }

    public function getPackage($id)
    {
        $package = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title', 'b.duration_type', 'b.duration')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.id' => $id])
            ->first();

        return $package;

    }

    public function buyPackage($id)
    {

        $invoice = new Invoice();

        $package = $this->getPackage($id);
        $subscriber = $this->getSubscriber();

        $speed_type = $package->speed_type == 'kilobyte' ? 'KBps' : ($package->speed_type == 'megabyte' ? 'MBps' : 'GBps');
        $bundle_type = $package->bundle_type == 'kilobyte' ? 'KB' : ($package->bundle_type == 'megabyte' ? 'MB' : 'GB');

        $title = "Internet Purchase for " . $package->title . "  (" . $subscriber->username . ") [";
        if ($package->bundle) {
            $title .= " Bundle: " . $package->bundle . $bundle_type;
        } else {
            $title .= " Speed: " . $package->speed . $speed_type;
        }

        $title .= " for " . $package->duration . " " . $package->duration_type . "]";
        $partner_id = $subscriber->partner_id;
        $amount = $package->amount;

        $items = [['title' => $title, 'price' => $amount, 'total' => $amount, 'module' => 'Isp', 'model' => 'package', 'item_id' => $id]];

        $invoice = $invoice->generateInvoice($title, $partner_id, $items, description:$title);

        return $invoice;
    }

    public function getInvoices($subscriber)
    {
        $invoice_cls = new Invoice();

        $invoices = $invoice_cls->getPartnerInvoices($subscriber->partner_id);

        return $invoices;
    }

    public function getInvoice($id)
    {
        $invoice = DBInvoice::where(['id' => $id])->first();

        if ($invoice === null) {
            return false;
        }

        return $invoice;
    }

    public function generatePassword($_len = 6, $special_char = false)
    {

        $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz'; // small letters
        $_alphaCaps = strtoupper($_alphaSmall); // CAPITAL LETTERS
        $_numerics = '1234567890'; // numerics
        $_specialChars = '`~!@#$%^&*()-_=+]}[{;:,<.>/?\'"\|'; // Special Characters

        $_container = ($special_char)
        ? $_alphaSmall . $_alphaCaps . $_numerics . $_specialChars
        : $_alphaSmall . $_alphaCaps . $_numerics;

        $password = '';

        for ($i = 0; $i < $_len; $i++) { // Loop till the length mentioned
            $_rand = rand(0, strlen($_container) - 1); // Get Randomized Length
            $password .= substr($_container, $_rand, 1); // returns part of the string [ high tensile strength ;) ]
        }

        return $password; // Returns the generated Pass
    }

}
