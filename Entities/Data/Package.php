<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;
use Illuminate\Support\Facades\DB;

class Package
{

    public $ordering = 5;

    public function data(Datasetter $datasetter)
    {
        $gateway_id = DB::table('isp_gateway')->where('type', 'freeradius')->value('id');
        $billing_cycle_id = DB::table('isp_billing_cycle')->where('slug', 'monthly')->value('id');
        
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1M Hotspot",
            "slug" => "1m-hotspot",
            "description" => "1M Hotspot",
            "gateway_id" => $gateway_id ,
            "billing_cycle_id" => $billing_cycle_id,
            "speed" => "1",
            "speed_type" => "megabyte",
            "published" => true,
        ]);

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "2M Hotspot",
            "slug" => "2m-hotspot",
            "description" => "2M Hotspot",
            "gateway_id" => $gateway_id ,
            "billing_cycle_id" => $billing_cycle_id,
            "speed" => "2",
            "speed_type" => "megabyte",
            "published" => true,
        ]);    
        
        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "1M-PPP",
            "slug" => "1m-ppp",
            "description" => "1M-PPP",
            "gateway_id" => $gateway_id ,
            "billing_cycle_id" => $billing_cycle_id,
            "speed" => "1",
            "speed_type" => "megabyte",
            "published" => true,
        ]);

        $datasetter->add_data('isp', 'package', 'slug', [
            "title" => "2M-PPP",
            "slug" => "2m-ppp",
            "description" => "2M-PPP",
            "gateway_id" => $gateway_id ,
            "billing_cycle_id" => $billing_cycle_id,
            "speed" => "2",
            "speed_type" => "megabyte",
            "published" => true,
        ]);  

    }
}