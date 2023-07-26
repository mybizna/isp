<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

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
        $table->foreignId('package_charge_id');
        $table->foreignId('rate_id');
        $table->boolean('published')->default(true)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_package_charge', 'package_charge_id');
        Migration::addForeign($table, 'account_rate', 'rate_id');
    }
}
