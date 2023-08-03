<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Payment extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'subscription_id', 'invoice_id', 'description', 'is_paid', 'completed', 'successful'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_subscription', 'account_invoice'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_payment";

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
        $fields->name('subscription_id')->type('recordpicker')->table('isp_subscription')->ordering(true);
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->ordering(true);
        $fields->name('is_paid')->type('switch')->ordering(true);
        $fields->name('completed')->type('switch')->ordering(true);
        $fields->name('successful')->type('switch')->ordering(true);

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
        $fields->name('subscription_id')->type('recordpicker')->table('isp_subscription')->group('w-1/2');
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->group('w-1/2');
        $fields->name('is_paid')->type('switch')->group('w-1/2');
        $fields->name('completed')->type('switch')->group('w-1/2');
        $fields->name('successful')->type('switch')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');

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
        $fields->name('subscription_id')->type('recordpicker')->table('isp_subscription')->group('w-1/6');
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->group('w-1/6');

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
        $table->foreignId('subscription_id')->nullable();
        $table->foreignId('invoice_id')->nullable();
        $table->string('description')->nullable();
        $table->boolean('is_paid')->default(0)->nullable();
        $table->boolean('completed')->default(0)->nullable();
        $table->boolean('successful')->default(0)->nullable();
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
        Migration::addForeign($table, 'isp_subscription', 'subscription_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
