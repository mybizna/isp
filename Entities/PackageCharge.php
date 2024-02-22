<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class PackageCharge extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'package_id', 'ledger_id', 'price', 'quantity', 'published'];

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
    public array $migrationDependancy = ['isp_package', 'account_ledger'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package_charge";

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
        $this->fields->string('slug')->html('text');
        $this->fields->foreignId('package_id')->html('recordpicker')->relation(['isp', 'package']);
        $this->fields->foreignId('ledger_id')->html('recordpicker')->relation(['account', 'ledger']);
        $this->fields->tinyInteger('quantity')->default(1)->html('text');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->double('price', 8, 2)->nullable()->html('number');
        $this->fields->boolean('published')->default(true)->nullable()->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['title', 'slug', 'package_id', 'ledger_id', 'price', 'quantity', 'published'];
        $structure['form'] = [
            ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['title', 'slug']],
            ['label' => 'Package', 'class' => 'col-span-full md:col-span-6', 'fields' => ['package_id', 'ledger_id']],
            ['label' => 'Price', 'class' => 'col-span-full md:col-span-6', 'fields' => ['price', 'quantity']],
            ['label' => 'Setting', 'class' => 'col-span-full md:col-span-6', 'fields' => ['published']],
            ['label' => 'Description', 'class' => 'col-span-full', 'fields' => ['description']],
        ];
        $structure['filter'] = ['title', 'package_id', 'ledger_id', 'published'];

        return $structure;
    }
}
