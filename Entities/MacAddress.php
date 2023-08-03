<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class MacAddress extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'mac'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_subscriber'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_mac_address";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->ordering(true);
        $fields->name('mac')->type('text')->ordering(true);

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

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/2');
        $fields->name('mac')->type('text')->group('w-1/2');

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

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/6');
        $fields->name('mac')->type('text')->group('w-1/6');

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
        $table->foreignId('subscriber_id')->nullable();
        $table->string('mac')->nullable();
    }

    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function post_migration(Blueprint $table): void
    {
        Migration::addForeign($table, 'isp_subscriber', 'subscriber_id');
    }

}
