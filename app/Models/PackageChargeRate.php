<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\PackageCharge;
use Modules\Isp\Models\Rate;

class PackageChargeRate extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['package_charge_id', 'rate_id', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package_charge_rate";

    /**
     * Add relationship to PackageCharge
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageCharge()
    {
        return $this->belongsTo(PackageCharge::class);
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
