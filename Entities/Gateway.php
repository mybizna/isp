<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
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

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title')->html('text');
        $this->fields->string('username')->html('text');
        $this->fields->string('password')->html('password');
        $this->fields->string('database')->html('text');
        $this->fields->string('ip_address')->html('text');
        $this->fields->string('port')->html('text');
        $this->fields->string('type')->html('text');
        $this->fields->boolean('published')->default(true)->nullable()->html('switch');
    }

   




}
