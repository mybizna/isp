<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Subscription extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'package_id', 'start_date', 'end_date'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_subscriber', 'isp_package'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscription";

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
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->ordering(true);
        $fields->name('start_date')->type('datetime')->ordering(true);
        $fields->name('end_date')->type('datetime')->ordering(true);

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
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/2');
        $fields->name('start_date')->type('datetime')->group('w-1/2');
        $fields->name('end_date')->type('datetime')->group('w-1/2');

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

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/2');
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/2');
        $fields->name('start_date')->type('datetime')->group('w-1/2');
        $fields->name('end_date')->type('datetime')->group('w-1/2');

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
        $table->foreignId('subscriber_id');
        $table->foreignId('package_id');
        $table->datetime('start_date');
        $table->datetime('end_date');
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
        Migration::addForeign($table, 'isp_package', 'package_id');
    }
}
