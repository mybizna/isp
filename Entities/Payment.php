<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Payment extends BaseModel
{

    protected $fillable = ['title', 'subscription_id', 'invoice_id', 'description', 'is_paid', 'completed', 'successful'];
    public $migrationDependancy = ['isp_subscription', 'account_invoice'];
    protected $table = "isp_payment";

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
        $table->boolean('is_paid')->default(false)->nullable();
        $table->boolean('completed')->default(false)->nullable();
        $table->boolean('successful')->default(false)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscription', 'subscription_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
