<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class PaymentCharge extends BaseModel
{

    protected $fillable = ['title', 'slug', 'payment_id', 'ledger_id', 'price','quantity', 'published'];
    public $migrationDependancy = ['isp_payment', 'account_ledger'];
    protected $table = "isp_payment_charge";

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
        $table->string('slug');
        $table->foreignId('payment_id');
        $table->foreignId('ledger_id');
        $table->integer('quantity')->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_payment', 'payment_id');
        Migration::addForeign($table, 'account_ledger', 'ledger_id');
    }
}
