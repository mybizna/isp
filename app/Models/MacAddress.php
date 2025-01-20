<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Isp\Models\Subscriber;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MacAddress extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['subscriber_id', 'mac'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_mac_address";

    /**
     * Add relationship to Subscriber
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->unsignedBigInteger('subscriber_id')->nullable();
        $table->string('mac')->nullable();
    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('subscriber_id')->references('id')->on('isp_subscriber')->onDelete('set null');
    }
}
