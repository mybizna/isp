<?php
namespace Modules\Isp\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Account\Models\Invoice;
use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Subscription;

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

        $table->string('title');
        $table->unsignedBigInteger('subscription_id')->nullable();
        $table->unsignedBigInteger('invoice_id')->nullable();
        $table->string('description')->nullable();
        $table->boolean('is_paid')->default(0)->nullable();
        $table->boolean('completed')->default(0)->nullable();
        $table->boolean('successful')->default(0)->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('subscription_id')->references('id')->on('isp_subscription')->onDelete('set null');
        $table->foreign('invoice_id')->references('id')->on('account_invoice')->onDelete('set null');
    }

}
