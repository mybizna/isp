<?php

namespace Modules\Isp\Entities\Data;

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

        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', '1-month')->value('id');

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1M Hotspot",
            "slug" => "1m-hotspot",
            "pool" => "dhcp",
            "description" => "1M Hotspot",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 100,
            "speed" => "1",
            "speed_type" => "megabyte",
            "published" => true,
            "featured" => 0,
            "is_hidden" => 0,
        ]);

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "2M Hotspot",
            "slug" => "2m-hotspot",
            "pool" => "dhcp",
            "description" => "2M Hotspot",
            "gateway_id" => $gateway_id,
            "billing_cycle_id" => $billing_cycle_id,
            "amount" => 150,
            "speed" => "2",
            "speed_type" => "megabyte",
            "published" => true,
            "featured" => 1,
            "is_hidden" => 0,
        ]);

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
