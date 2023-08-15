<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Package extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 'slug', 'pool', 'description', 'billing_cycle_id', 'gateway_id',
        'speed', 'speed_type', 'bundle', 'bundle_type', 'published',
        'featured', 'default', 'is_unlimited', 'is_hidden', 'amount',
    ];

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
    public array $migrationDependancy = ['isp_billing_cycle'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('text');
        $this->fields->string('title')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->string('pool')->html('text');
        $this->fields->string('description')->nullable()->html('textarea');

        $this->fields->foreignId('billing_cycle_id')->nullable()->html('recordpicker')->table(['isp', 'billing_cycle']);
        $this->fields->foreignId('gateway_id')->nullable()->html('recordpicker')->table(['isp', 'gateway']);

        $this->fields->string('speed')->nullable()->html('text');
        $this->fields->enum('speed_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable()->html('switch');

        $this->fields->string('bundle')->nullable()->html('text');
        $this->fields->enum('bundle_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable()->html('switch');

        $this->fields->boolean('published')->default(1)->nullable()->html('switch');
        $this->fields->boolean('featured')->default(0)->nullable()->html('switch');
        $this->fields->boolean('default')->default(0)->nullable()->html('switch');
        $this->fields->boolean('is_unlimited')->default(0)->nullable()->html('switch');
        $this->fields->boolean('is_hidden')->default(0)->nullable()->html('switch');
        $this->fields->double('amount', 8, 2)->nullable()->html('number');
    }

}
