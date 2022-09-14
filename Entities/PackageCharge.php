<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class PackageCharge extends BaseModel
{

    protected $fillable = ['title', 'slug', 'description', 'package_id', 'ledger_id', 'price','quantity', 'published'];
    public $migrationDependancy = ['isp_package',   'account_ledger'];
    protected $table = "isp_package_charge";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title');
        $table->string('slug');
        $table->integer('package_id')->unsigned();
        $table->integer('ledger_id')->unsigned();
        $table->integer('quantity')->unsigned()->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_package_charge', 'package_id')) {
            $table->foreign('package_id')->references('id')->on('isp_package')->nullOnDelete();
        }
        if (Migration::checkKeyExist('isp_package_charge', 'ledger_id')) {
            $table->foreign('ledger_id')->references('id')->on('account_ledger')->nullOnDelete();
        }
    }
}
