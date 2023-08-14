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
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->string('title')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->foreignId('package_id')->html('recordpicker')->table(['isp', 'package']);
        $this->fields->foreignId('ledger_id')->html('recordpicker')->table(['account', 'ledger']);
        $this->fields->tinyInteger('quantity')->default(1)->html('text');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->double('price', 8, 2)->nullable()->html('number');
        $this->fields->boolean('published')->default(true)->nullable()->html('switch');
    }
}
