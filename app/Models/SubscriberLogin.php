<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class SubscriberLogin extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['mac', 'ip', 'username', 'link_login', 'link_orig', 'error', 'chap_id', 'chap_challenge', 'link_login_id', 'link_orig_esc', 'mac_esc'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscriber_login";


    public function migration(Blueprint $table): void
    {

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
}
