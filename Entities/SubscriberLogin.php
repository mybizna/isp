<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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

    /**
     * Set if model is visible from frontend.
     *
     * @var bool
     */
    public bool $show_frontend = true;

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('mac')->nullable()->html('text');
        $this->fields->string('ip')->nullable()->html('text');
        $this->fields->string('username')->nullable()->html('text');
        $this->fields->string('link_login')->nullable()->html('text');
        $this->fields->string('link_orig')->nullable()->html('text');
        $this->fields->string('error')->nullable()->html('text');
        $this->fields->string('chap_id')->nullable()->html('text');
        $this->fields->string('chap_challenge')->nullable()->html('text');
        $this->fields->string('link_login_id')->nullable()->html('text');
        $this->fields->string('link_orig_esc')->nullable()->html('text');
        $this->fields->string('mac_esc')->nullable()->html('text');
    }






}
