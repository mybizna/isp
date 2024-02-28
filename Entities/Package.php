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
        'speed', 'speed_type', 'bundle', 'bundle_type', 'published', 'ordering',
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
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $speed_type = ['gigabyte' => 'Gigabyte', 'kilobyte' => 'Kilobyte', 'megabyte' => 'Megabyte'];
        $speed_type_color = ['gigabyte' => 'green', 'kilobyte' => 'red', 'megabyte' => 'blue'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->string('pool')->html('text');
        $this->fields->string('description')->nullable()->html('textarea');

        $this->fields->foreignId('billing_cycle_id')->nullable()->html('recordpicker')->relation(['isp', 'billing_cycle']);
        $this->fields->foreignId('gateway_id')->nullable()->html('recordpicker')->relation(['isp', 'gateway']);

        $this->fields->string('speed')->nullable()->html('text');
        $this->fields->enum('speed_type', array_keys($speed_type))->options($speed_type)->color($speed_type_color)->default('megabyte')->nullable()->html('switch');

        $this->fields->string('bundle')->nullable()->html('text');
        $this->fields->enum('bundle_type', array_keys($speed_type))->options($speed_type)->color($speed_type_color)->default('megabyte')->nullable()->html('switch');

        $this->fields->integer('ordering')->html('text');

        $this->fields->boolean('published')->default(1)->nullable()->html('switch');
        $this->fields->boolean('featured')->default(0)->nullable()->html('switch');
        $this->fields->boolean('default')->default(0)->nullable()->html('switch');
        $this->fields->boolean('is_unlimited')->default(0)->nullable()->html('switch');
        $this->fields->boolean('is_hidden')->default(0)->nullable()->html('switch');
        $this->fields->double('amount', 8, 2)->nullable()->html('number');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['title', 'pool', 'billing_cycle_id', 'gateway_id', 'speed', 'speed_type', 'bundle', 'bundle_type', 'amount', 'featured', 'ordering', 'published'];
        $structure['form'] = [
            ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['title', 'slug']],
            ['label' => 'Bundle', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['bundle', 'bundle_type']],
            ['label' => 'Speed', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['speed', 'speed_type']],
            ['label' => 'Package', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['pool', 'billing_cycle_id', 'gateway_id', 'amount', 'default']],
            ['label' => 'Package', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['published', 'featured', 'is_unlimited', 'is_hidden', 'ordering']],
            ['label' => 'Description', 'class' => 'col-span-full', 'fields' => ['description']],
        ];
        $structure['filter'] = ['title', 'billing_cycle_id', 'gateway_id', 'published'];

        return $structure;
    }
}
