<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\PackageCharge;
use Modules\Account\Models\Rate;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackageChargeRate extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['package_charge_id', 'rate_id', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package_charge_rate";

    /**
     * Add relationship to PackageCharge
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageCharge(): BelongsTo
    {
        return $this->belongsTo(PackageCharge::class);
    }

    /**
     * Add relationship to Rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }


    public function migration(Blueprint $table): void
    {

        $table->unsignedBigInteger('package_charge_id')->nullable();
        $table->unsignedBigInteger('rate_id')->nullable();

        $table->boolean('published')->default(true)->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('package_charge_id')->references('id')->on('isp_package_charge')->onDelete('set null');
        $table->foreign('rate_id')->references('id')->on('account_rate')->onDelete('set null');
    }
}
