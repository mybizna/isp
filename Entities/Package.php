<?php

namespace Modules\Isp\Entities;

use Modules\Core\Entities\BaseModel AS Model;
use Illuminate\Database\Schema\Blueprint;
use Modules\Core\Classes\Migration;

class Package extends Model
{

    protected $fillable = ['title', 'description', 'gateway_id', 'billing_cycle_id', 'speed', 'speed_type', 'published', 'amount'];
    public $migrationDependancy = ['isp_billing_cycle'];
    protected $table = "isp_package";

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
        $table->string('description')->nullable();

        $table->integer('billing_cycle_id')->unsigned()->nullable();

        $table->string('speed')->nullable();
        $table->enum('speed_type', ['kilobyte', 'megabyte'])->default('megabyte')->nullable();
        $table->boolean('published')->default(true)->nullable();
        $table->double('amount', 8, 2)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_billing_cycle', 'billing_cycle_id')) {
            $table->foreign('billing_cycle_id')->references('id')->on('isp_billing_cycle')->nullOnDelete();
        }
    }


    /*packages_setupitems_ids = fields.One2many('mybizna.isp.packages_setupitems', 'package_id',
                                              'Package Setup Items',
                                              track_visibility='onchange')*/
}
