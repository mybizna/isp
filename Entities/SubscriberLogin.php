<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('mac')->type('text')->ordering(true);
        $fields->name('ip')->type('text')->ordering(true);
        $fields->name('username')->type('text')->ordering(true);
        $fields->name('link_login')->type('text')->ordering(true);
        $fields->name('link_orig')->type('text')->ordering(true);
        $fields->name('error')->type('text')->ordering(true);
        $fields->name('chap_id')->type('text')->ordering(true);
        $fields->name('chap_challenge')->type('text')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('mac')->type('text')->group('w-1/2');
        $fields->name('ip')->type('text')->group('w-1/2');
        $fields->name('username')->type('text')->group('w-1/2');
        $fields->name('link_login')->type('text')->group('w-1/2');
        $fields->name('link_orig')->type('text')->group('w-1/2');
        $fields->name('error')->type('text')->group('w-1/2');
        $fields->name('chap_id')->type('text')->group('w-1/2');
        $fields->name('chap_challenge')->type('text')->group('w-1/2');
        $fields->name('link_login_id')->type('text')->group('w-1/2');
        $fields->name('link_orig_esc')->type('text')->group('w-1/2');
        $fields->name('mac_esc')->type('text')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('mac')->type('text')->group('w-1/2');
        $fields->name('ip')->type('text')->group('w-1/2');
        $fields->name('username')->type('text')->group('w-1/2');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {

        $table->increments('id');
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
