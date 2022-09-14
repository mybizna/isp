<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Gateway extends BaseModel
{

    protected $fillable = ['title', 'username', 'password', 'database', 'ip_address', 'port', 'type', 'published'];
    public $migrationDependancy = [];
    protected $table = "isp_gateway";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title');
        $table->string('username');
        $table->string('password');
        $table->string('database');
        $table->string('ip_address');
        $table->string('port');
        $table->string('type');
        $table->boolean('published')->default(true)->nullable();
    }


}
