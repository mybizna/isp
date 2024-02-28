<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class BillingCycle extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'duration', 'duration_type', 'published'];

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
    protected $table = "isp_billing_cycle";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $duration_type = ['minute' => 'Minute', 'hour' => 'Hour', 'day' => 'Day', 'week' => 'Week', 'month' => 'Month', 'year' => 'Year'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->string('duration')->nullable()->html('number');
        $this->fields->enum('duration_type', array_keys($duration_type))->options($duration_type)->default('month')->nullable()->html('switch');
        $this->fields->boolean('published')->default(true)->nullable()->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['title', 'slug', 'duration', 'duration_type', 'published'];
        $structure['form'] = [
            ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['title', 'slug']],
            ['label' => 'Duration', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['duration', 'duration_type']],
            ['label' => 'Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['published']],
        ];
        $structure['filter'] = ['title', 'duration', 'duration_type', 'published'];

        return $structure;
    }
}
