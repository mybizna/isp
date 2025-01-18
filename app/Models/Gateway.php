<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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

    public function migration(Blueprint $table): void
    {

        $table->string('title');
        $table->string('username');
        $table->string('password');
        $table->string('database');
        $table->string('ip_address');
        $table->string('port');
        $table->string('type');
        $table->boolean('published')->nullable()->default(true);

    }
}
