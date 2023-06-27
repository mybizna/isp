<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Subscriber extends BaseModel
{

    protected $fillable = ['username', 'password','had_trail', 'partner_id'];
    public $migrationDependancy = [];
    protected $table = "isp_subscriber";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('username')->unique();
        $table->string('password');
        $table->boolean('had_trail')->default(0)->nullable();
        $table->foreignId('partner_id')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'partner', 'partner_id');
    }
}
