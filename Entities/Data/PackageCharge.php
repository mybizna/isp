<?php

namespace Modules\Isp\Entities\Data;

use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class PackageCharge
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 7;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {

        $ledger_id = DB::table('account_ledger')->where('slug', 'sales_revenue')->value('id');
        $package_id = DB::table('isp_package')->where('slug', '1m-ppp')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Router",
            "slug" => "1m-ppp-router",
            "description" => "Router",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 10,
            "published" => true,
        ]);

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Cable",
            "slug" => "1m-ppp-cable",
            "description" => "Cable",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 6,
            "published" => true,
        ]);

        $ledger_id = DB::table('account_ledger')->where('slug', 'service_revenue')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Installation",
            "slug" => "1m-ppp-installation",
            "description" => "Installation",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 15,
            "published" => true,
        ]);

        $ledger_id = DB::table('account_ledger')->where('slug', 'sales_revenue')->value('id');
        $package_id = DB::table('isp_package')->where('slug', '2m-ppp')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Router",
            "slug" => "2m-ppp-router",
            "description" => "Router",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 10,
            "published" => true,
        ]);

        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Cable",
            "slug" => "2m-ppp-cable",
            "description" => "Cable",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 6,
            "published" => true,
        ]);

        $ledger_id = DB::table('account_ledger')->where('slug', 'service_revenue')->value('id');
        $datasetter->add_data('isp', 'package_charge', 'slug', [
            "title" => "Installation",
            "slug" => "2m-ppp-installation",
            "description" => "Installation",
            "package_id" => $package_id,
            "ledger_id" => $ledger_id,
            "amount" => 15,
            "published" => true,
        ]);

    }
}
