<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;

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

}
