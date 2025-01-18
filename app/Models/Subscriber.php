<?php

namespace Modules\Isp\Models;

use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['username', 'password', 'had_trail', 'partner_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_subscriber";

    /**
     * Set if model is visible from frontend.
     *
     * @var bool
     */
    public bool $show_frontend = true;

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }


    public function migration(Blueprint $table): void
    {

        $table->string('username');
        $table->string('password');
        $table->boolean('had_trail')->default(0)->nullable();
        $table->foreignId('partner_id')->nullable()->constrained(table: 'partner_partner')->onDelete('set null');

    }
}
