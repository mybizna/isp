<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;

class Subscription extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'package_id', 'start_date', 'end_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscription";
}
