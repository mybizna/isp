<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\BillingCycle;
use Modules\Isp\Models\Gateway;

class Package extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 'slug', 'pool', 'description', 'billing_cycle_id', 'gateway_id',
        'speed', 'speed_type', 'bundle', 'bundle_type', 'published', 'ordering',
        'featured', 'default', 'is_unlimited', 'is_hidden', 'amount',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package";

    /**
     * Add relationship to BillingCycle
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingCycle()
    {
        return $this->belongsTo(BillingCycle::class);
    }

    /**
     * Add relationship to Gateway
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }

}
