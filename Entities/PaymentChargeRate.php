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
        $table->integer('payment_charge_id')->unsigned();
        $table->integer('rate_id')->unsigned();
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('isp_payment_charge_rate', 'payment_charge_id')) {
            $table->foreign('payment_charge_id')->references('id')->on('isp_payment_charge')->nullOnDelete();
        }
        
        if (Migration::checkKeyExist('isp_payment_charge_rate', 'rate_id')) {
            $table->foreign('rate_id')->references('id')->on('account_rate')->nullOnDelete();
        }
    }
}
