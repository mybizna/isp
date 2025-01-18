<?php

namespace Modules\Isp\Models;

use Modules\Account\Models\Ledger;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Payment;
use Illuminate\Database\Schema\Blueprint;

class PaymentCharge extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'payment_id', 'ledger_id', 'price', 'quantity', 'published'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_payment_charge";

    /**
     * Add relationship to Payment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
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
        $table->foreignId('payment_id')->nullable()->constrained(table: 'isp_payment')->onDelete('set null');
        $table->foreignId('ledger_id')->nullable()->constrained(table: 'account_ledger')->onDelete('set null');
        $table->integer('quantity')->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();
    }
}
