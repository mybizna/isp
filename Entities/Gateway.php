<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;

class Gateway extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'username', 'password', 'database', 'ip_address', 'port', 'type', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_gateway";

}
