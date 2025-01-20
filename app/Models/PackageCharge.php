<?php
namespace Modules\Isp\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Account\Models\Ledger;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Package;

class PackageCharge extends BaseModel
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
    protected $fillable = ['title', 'slug', 'description', 'package_id', 'ledger_id', 'price', 'quantity', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_package_charge";

    /**
     * Add relationship to Package
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Add relationship to Ledger
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title');
        $table->string('slug');
        $table->unsignedBigInteger('package_id')->nullable();
        $table->unsignedBigInteger('ledger_id')->nullable();
        $table->tinyInteger('quantity')->default(1);
        $table->string('description')->nullable();
        $table->integer('price')->nullable();
        $table->string('currency')->default('USD');
        $table->boolean('published')->default(true)->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('package_id')->references('id')->on('isp_package')->onDelete('set null');
        $table->foreign('ledger_id')->references('id')->on('account_ledger')->onDelete('set null');
    }
}
