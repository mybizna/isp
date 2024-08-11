<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;

class MacAddress extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'mac'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_mac_address";

}
