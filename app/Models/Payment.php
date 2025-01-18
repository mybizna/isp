<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Invoice;
use Modules\Isp\Models\Subscription;
use Illuminate\Database\Schema\Blueprint;

class Payment extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'subscription_id', 'invoice_id', 'description', 'is_paid', 'completed', 'successful'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_payment";

    /**
     * Add relationship to Subscription
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Add relationship to Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('title');
        $table->foreignId('subscription_id')->nullable()->constrained(table: 'isp_subscription')->onDelete('set null');
        $table->foreignId('invoice_id')->nullable()->constrained(table: 'account_invoice')->onDelete('set null');
        $table->string('description')->nullable();
        $table->boolean('is_paid')->default(0)->nullable();
        $table->boolean('completed')->default(0)->nullable();
        $table->boolean('successful')->default(0)->nullable();

    }

}
