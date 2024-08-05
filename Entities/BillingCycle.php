<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;

class BillingCycle extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'duration', 'duration_type', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_billing_cycle";

}
