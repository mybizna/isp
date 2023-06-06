<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class MacAddress extends BaseModel
{

    protected $fillable = ['subscriber_id', 'mac'];
    public $migrationDependancy = ['isp_subscriber'];
    protected $table = "isp_mac_address";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->foreignId('subscriber_id')->nullable();
        $table->string('mac')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscriber', 'subscriber_id');
    }

}
