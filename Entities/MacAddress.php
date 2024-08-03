<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->foreignId('subscriber_id')->nullable()->html('recordpicker')->relation(['isp', 'subscriber']);
        $this->fields->string('mac')->nullable()->html('text');
    }


   

}
