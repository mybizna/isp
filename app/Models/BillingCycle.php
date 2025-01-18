<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class BillingCycle extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'description', 'duration', 'duration_type', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_billing_cycle";

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('title');
        $table->string('slug');
        $table->string('description')->nullable();
        $table->string('duration')->nullable();
        $table->enum('duration_type', ['minute', 'hour', 'day', 'week', 'month', 'year'])->default('day')->nullable();
        $table->boolean('published')->default(true)->nullable();
    }
}
