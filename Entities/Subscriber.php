<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('username')->unique()->html('text');
        $this->fields->string('password')->html('text');
        $this->fields->boolean('had_trail')->default(0)->nullable()->html('switch');
        $this->fields->foreignId('partner_id')->nullable()->html('recordpicker')->relation(['partner']);
    }

  

}
