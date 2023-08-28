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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['title', 'username', 'database', 'ip_address', 'port', 'type', 'published'];
        $structure['form'] = [
            ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['title']],
            ['label' => 'Setting', 'class' => 'col-span-6', 'fields' => ['username', 'password', 'database', 'ip_address']],
            ['label' => 'Other', 'class' => 'col-span-6', 'fields' => ['port', 'type', 'published']],
        ];
        $structure['filter'] = ['title', 'username', 'published'];

        return $structure;
    }

}
