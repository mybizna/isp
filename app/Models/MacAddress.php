<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Subscriber;

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

    /**
     * Add relationship to Subscriber
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
}
