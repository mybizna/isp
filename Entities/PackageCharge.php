<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class PackageCharge extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'package_id', 'ledger_id', 'price', 'quantity', 'published'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_package', 'account_ledger'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package_charge";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('package_id')->type('recordpicker')->table(['isp', 'package'])->ordering(true);
        $fields->name('ledger_id')->type('recordpicker')->table(['account', 'ledger'])->ordering(true);
        $fields->name('quantity')->type('text')->ordering(true);
        $fields->name('description')->type('textarea')->ordering(true);
        $fields->name('price')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

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

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('package_id')->type('recordpicker')->table(['isp', 'package'])->group('w-1/2');
        $fields->name('ledger_id')->type('recordpicker')->table(['account', 'ledger'])->group('w-1/2');
        $fields->name('quantity')->type('text')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');
        $fields->name('price')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

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

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('package_id')->type('recordpicker')->table(['isp', 'package'])->group('w-1/6');
        $fields->name('ledger_id')->type('recordpicker')->table(['account', 'ledger'])->group('w-1/6');
        $fields->name('quantity')->type('text')->group('w-1/6');
        $fields->name('price')->type('text')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');

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
        $table->string('title');
        $table->string('slug');
        $table->foreignId('package_id');
        $table->foreignId('ledger_id');
        $table->tinyInteger('quantity')->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();
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
        Migration::addForeign($table, 'isp_package', 'package_id');
        Migration::addForeign($table, 'account_ledger', 'ledger_id');
    }
}
