<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class SubscriberLogin extends BaseModel
{

    protected $fillable = ['mac', 'ip', 'username', 'link_login', 'link_orig', 'error', 'chap_id', 'chap_challenge', 'link_login_id', 'link_orig_esc', 'mac_esc'];
    public $migrationDependancy = ['isp_subscriber'];
    protected $table = "isp_subscriber_login";

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
        $table->string('mac')->nullable();
        $table->string('ip')->nullable();
        $table->string('username')->nullable();
        $table->string('link_login')->nullable();
        $table->string('link_orig')->nullable();
        $table->string('error')->nullable();
        $table->string('chap_id')->nullable();
        $table->string('chap_challenge')->nullable();
        $table->string('link_login_id')->nullable();
        $table->string('link_orig_esc')->nullable();
        $table->string('mac_esc')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_subscription', 'subscriber_id')) {
            $table->foreign('subscriber_id')->references('id')->on('isp_subscriber')->nullOnDelete();
        }
    }

}
