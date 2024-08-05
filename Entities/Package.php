<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;

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

}
