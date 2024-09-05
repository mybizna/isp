<?php

namespace Modules\Isp\Models;

use Modules\Account\Models\Rate;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\PaymentCharge;

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
    public function paymentCharge()
    {
        return $this->belongsTo(PaymentCharge::class);
    }

    /**
     * Add relationship to Rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
