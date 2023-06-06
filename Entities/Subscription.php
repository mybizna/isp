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
        $table->foreignId('subscriber_id');
        $table->foreignId('package_id');
        $table->datetime('start_date');
        $table->datetime('end_date');
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscriber', 'subscriber_id');
        Migration::addForeign($table, 'isp_package', 'package_id');
    }
}
