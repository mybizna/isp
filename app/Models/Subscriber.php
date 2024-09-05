<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;

class Subscriber extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['username', 'password', 'had_trail', 'partner_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscriber";

    /**
     * Set if model is visible from frontend.
     *
     * @var bool
     */
    public bool $show_frontend = true;

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
