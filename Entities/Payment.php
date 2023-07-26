<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Payment extends BaseModel
{

    protected $fillable = ['title', 'subscription_id', 'invoice_id', 'description', 'is_paid', 'completed', 'successful'];
    public $migrationDependancy = ['isp_subscription', 'account_invoice'];
    protected $table = "isp_payment";


    public function listTable(){
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
    
    public function formBuilder(){
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

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('subscription_id')->type('recordpicker')->table('isp_subscription')->group('w-1/6');
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->group('w-1/6');

        

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
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

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscription', 'subscription_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
