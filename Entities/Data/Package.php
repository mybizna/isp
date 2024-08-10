<?php

namespace Modules\Isp\Models\Data;

use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class Package
{
    /**
     * Set ordering of the Class to be migrated.
     *
     * @var int
     */
    public $ordering = 5;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $gateway_id = DB::table('isp_gateway')->where('type', 'freeradius')->value('id');
        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '10-minute')->value('id');

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "Trial",
            "slug" => "trail",
            "pool" => "dhcp",
            "description" => "Trial",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 0,
            "speed" => "1",
            "speed_type" => "megabyte",
            "bundle" => "10",
            "bundle_type" => "gigabyte",
            "published" => true,
            "featured" => 0,
            "is_hidden" => 1,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-month')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "Free",
            "slug" => "free",
            "pool" => "dhcp",
            "description" => "Free",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 0,
            "speed" => "32",
            "speed_type" => "kilobyte",
            "bundle" => "2",
            "bundle_type" => "gigabyte",
            "published" => true,
            "default" => 1,
            "featured" => 0,
            "is_hidden" => 1,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-hour')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1 Hr",
            "slug" => "1-hr",
            "pool" => "dhcp",
            "description" => "1 Hour",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 5,
            "published" => true,
            "ordering" => 1,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '3-hour')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "3 Hr",
            "slug" => "3-hr",
            "pool" => "dhcp",
            "description" => "3 Hour",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 10,
            "ordering" => 2,
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '12-hour')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "12 Hr",
            "slug" => "12-hr",
            "pool" => "dhcp",
            "description" => "12 Hour",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 50,
            "ordering" => 3,
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-day')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1 Day",
            "slug" => "1-day",
            "pool" => "dhcp",
            "description" => "1 Day",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 90,
            "ordering" => 4,
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-week')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1 Wk",
            "slug" => "1-wk",
            "pool" => "dhcp",
            "description" => "1 Week",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 150,
            "ordering" => 5,
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '2-week')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "2 Wk",
            "slug" => "2-wk",
            "pool" => "dhcp",
            "description" => "2 Week",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 250,
            "ordering" => 6,
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-month')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1 Mth",
            "slug" => "1-mth",
            "pool" => "dhcp",
            "description" => "1 Month",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 500,
            "ordering" => 7,
            "published" => true,
            "featured" => 1,
            "is_hidden" => 0,
        ]);

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-month')->value('id');
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1M-PPP",
            "slug" => "1m-ppp",
            "pool" => "dhcp",
            "description" => "1M-PPP",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 100,
            "speed" => "1",
            "speed_type" => "megabyte",
            "published" => true,
            "featured" => 0,
            "is_hidden" => 1,
        ]);

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "2M-PPP",
            "slug" => "2m-ppp",
            "pool" => "dhcp",
            "description" => "2M-PPP",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 150,
            "speed" => "2",
            "speed_type" => "megabyte",
            "published" => true,
            "featured" => 0,
            "is_hidden" => 1,
        ]);

    }
}
