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
        $table->integer('subscriber_id')->nullable()->unsigned();
        $table->string('mac')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_mac_address', 'subscriber_id')) {
            $table->foreign('subscriber_id')->references('id')->on('isp_subscriber')->nullOnDelete();
        }
    }

}
