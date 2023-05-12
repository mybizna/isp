<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Package extends BaseModel
{

    protected $fillable = [
        'title', 'slug', 'pool', 'description', 'billing_cycle_id', 'gateway_id',
        'speed', 'speed_type', 'bundle', 'bundle_type', 'published',
        'featured', 'default', 'is_unlimited', 'is_hidden', 'amount',
    ];
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
        $table->string('slug');
        $table->string('pool');
        $table->string('description')->nullable();

        $table->integer('billing_cycle_id')->unsigned()->nullable();
        $table->integer('gateway_id')->unsigned()->nullable();

        $table->string('speed')->nullable();
        $table->enum('speed_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();

        $table->string('bundle')->nullable();
        $table->enum('bundle_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();

        $table->boolean('published')->default(true)->nullable();
        $table->boolean('featured')->default(false)->nullable();
        $table->boolean('default')->default(false)->nullable();
        $table->boolean('is_unlimited')->default(false)->nullable();
        $table->boolean('is_hidden')->default(false)->nullable();
        $table->double('amount', 8, 2)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_package', 'billing_cycle_id')) {
            $table->foreign('billing_cycle_id')->references('id')->on('isp_billing_cycle')->nullOnDelete();
        }

        if (Migration::checkKeyExist('isp_package', 'gateway_id')) {
            $table->foreign('gateway_id')->references('id')->on('isp_gateway')->nullOnDelete();
        }
    }
}
