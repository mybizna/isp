<?php

namespace Modules\Isp\Models;

use Modules\Account\Models\Ledger;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Package;

class PackageCharge extends BaseModel
{

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
        $table->id();

        $table->string('title');
        $table->string('slug');
        $table->foreignId('package_id')->nullable()->constrained(table: 'isp_package')->onDelete('set null');
        $table->foreignId('ledger_id')->nullable()->constrained(table: 'account_ledger')->onDelete('set null');
        $table->tinyInteger('quantity')->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();

    }
}
