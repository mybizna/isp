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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['mac', 'username'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscriber_login";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['mac', 'ip', 'username', 'link_login', 'link_orig', 'error', 'mac_esc'],
            'filter' => ['mac', 'ip', 'username'],
        ];

        return $structure;
    }

}
