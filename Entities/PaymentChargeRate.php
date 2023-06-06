<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class PaymentChargeRate extends BaseModel
{

    protected $fillable = ['payment_charge_id', 'rate_id'];
    public $migrationDependancy = ['isp_payment_charge', 'account_rate'];
    protected $table = "isp_payment_charge_rate";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->foreignId('payment_charge_id');
        $table->foreignId('rate_id');
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_payment_charge', 'payment_charge_id');
        Migration::addForeign($table, 'account_rate', 'rate_id');
    }
}
