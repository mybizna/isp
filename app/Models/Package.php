<?php
namespace Modules\Isp\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\BillingCycle;
use Modules\Isp\Models\Gateway;

class Package extends BaseModel
{

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total' => Money::class, // Use the custom MoneyCast
    ];
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
     * Add relationship to BillingCycle
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingCycle(): BelongsTo
    {
        return $this->belongsTo(BillingCycle::class);
    }

    /**
     * Add relationship to Gateway
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway(): BelongsTo
    {
        return $this->belongsTo(Gateway::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title');
        $table->string('slug');
        $table->string('pool');
        $table->string('description')->nullable();
        $table->unsignedBigInteger('billing_cycle_id')->nullable();
        $table->unsignedBigInteger('gateway_id')->nullable();
        $table->string('speed')->nullable();
        $table->enum('speed_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();
        $table->string('bundle')->nullable();
        $table->enum('bundle_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();
        $table->integer('ordering');
        $table->boolean('published')->default(true)->nullable();
        $table->boolean('featured')->default(false)->nullable();
        $table->boolean('default')->default(false)->nullable();
        $table->boolean('is_unlimited')->default(false)->nullable();
        $table->boolean('is_hidden')->default(false)->nullable();
        $table->integer('amount')->nullable();
        $table->string('currency')->default('USD');

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('billing_cycle_id')->references('id')->on('isp_billing_cycle')->onDelete('set null');
        $table->foreign('gateway_id')->references('id')->on('isp_gateway')->onDelete('set null');
    }
}
