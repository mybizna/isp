<?php

namespace Modules\Isp\Models;

use Modules\Account\Models\Rate;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\PaymentCharge;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentChargeRate extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['payment_charge_id', 'rate_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_payment_charge_rate";

    /**
     * Add relationship to PaymentCharge
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentCharge(): BelongsTo
    {
        return $this->belongsTo(PaymentCharge::class);
    }

    /**
     * Add relationship to Rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->foreignId('payment_charge_id')->nullable()->constrained(table: 'isp_payment_charge')->onDelete('set null');
        $table->foreignId('rate_id')->nullable()->constrained(table: 'account_rate')->onDelete('set null');

    }
}
