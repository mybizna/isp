<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Subscription extends BaseModel
{

    protected $fillable = ['subscriber_id', 'package_id', 'start_date','end_date'];
    public $migrationDependancy = ['isp_subscriber', 'isp_package'];
    protected $table = "isp_subscription";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('subscriber_id')->unsigned();
        $table->integer('package_id')->unsigned();
        $table->date('start_date');
        $table->date('end_date');
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_subscription', 'subscriber_id')) {
            $table->foreign('subscriber_id')->references('id')->on('isp_subscriber')->nullOnDelete();
        }

        if (Migration::checkKeyExist('isp_subscription', 'package_id')) {
            $table->foreign('package_id')->references('id')->on('isp_package')->nullOnDelete();
        }
    }
}
