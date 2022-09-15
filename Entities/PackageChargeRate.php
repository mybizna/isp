<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class PackageChargeRate extends BaseModel
{

    protected $fillable = ['package_charge_id', 'rate_id', 'published'];
    public $migrationDependancy = ['isp_package','account_rate'];
     protected $table = "isp_package_charge_rate";
 
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('package_charge_id')->unsigned();
        $table->integer('rate_id')->unsigned();
        $table->boolean('published')->default(true)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_package_charge', 'package_charge_id')) {
            $table->foreign('package_charge_id')->references('id')->on('isp_package_charge')->nullOnDelete();
        }
        if (Migration::checkKeyExist('isp_package_charge', 'rate_id')) {
            $table->foreign('rate_id')->references('id')->on('account_rate')->nullOnDelete();
        }
    }
}
