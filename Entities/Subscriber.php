<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Subscriber extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['username', 'password', 'had_trail', 'partner_id'];

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
    protected $table = "isp_subscriber";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('username')->type('text')->ordering(true);
        $fields->name('had_trail')->type('switch')->ordering(true);
        $fields->name('partner_id')->type('recordpicker')->table('partner')->ordering(true);

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

        $fields->name('username')->type('text')->group('w-1/2');
        $fields->name('password')->type('password')->group('w-1/2');
        $fields->name('had_trail')->type('switch')->group('w-1/2');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/2');

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

        $fields->name('username')->type('text')->group('w-1/6');
        $fields->name('had_trail')->type('switch')->group('w-1/6');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/6');

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
        $table->string('username')->unique();
        $table->string('password');
        $table->boolean('had_trail')->default(0)->nullable();
        $table->foreignId('partner_id')->nullable();
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
        Migration::addForeign($table, 'partner', 'partner_id');
    }
}
