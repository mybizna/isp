<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Package;
use Modules\Isp\Models\Subscriber;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'package_id', 'start_date', 'end_date'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscription";

    /**
     * Add relationship to Subscriber
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }

    /**
     * Add relationship to Package
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }


    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->foreignId('subscriber_id')->nullable()->constrained(table: 'isp_subscriber')->onDelete('set null');
        $table->foreignId('package_id')->nullable()->constrained(table: 'isp_package')->onDelete('set null');
        $table->datetime('start_date');
        $table->datetime('end_date');

    }
}
