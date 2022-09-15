<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;
use Illuminate\Support\Facades\DB;

class PackageCharge
{

    public $ordering = 7;

    public function data(Datasetter $datasetter)
    {

        $package_id = DB::table('isp_package')->where('slug', '1m-hotspot')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Router",
            "slug" => "1m-hotspot-router",
            "description" => "Router",
            "package_id" => $package_id,
            "amount" => 10,
            "published" => true
        ]);   

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Cable",
            "slug" => "1m-hotspot-cable",
            "description" => "Cable",
            "package_id" => $package_id,
            "amount" => 6,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Installation",
            "slug" => "1m-hotspot-installation",
            "description" => "Installation",
            "package_id" => $package_id,
            "amount" => 15,
            "published" => true
        ]);

        $package_id = DB::table('isp_package')->where('slug', '2m-hotspot')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Router",
            "slug" => "2m-hotspot-router",
            "description" => "Router",
            "package_id" => $package_id,
            "amount" => 10,
            "published" => true
        ]);   

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Cable",
            "slug" => "2m-hotspot-cable",
            "description" => "Cable",
            "package_id" => $package_id,
            "amount" => 6,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Installation",
            "slug" => "2m-hotspot-installation",
            "description" => "Installation",
            "package_id" => $package_id,
            "amount" => 15,
            "published" => true
        ]);
        
    }
}