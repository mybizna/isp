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





}
