<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title')->html('text');
        $this->fields->foreignId('subscription_id')->nullable()->html('recordpicker')->relation(['isp', 'subscription']);
        $this->fields->foreignId('invoice_id')->nullable()->html('recordpicker')->relation(['account', 'invoice']);
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->boolean('is_paid')->default(0)->nullable()->html('switch');
        $this->fields->boolean('completed')->default(0)->nullable()->html('switch');
        $this->fields->boolean('successful')->default(0)->nullable()->html('switch');
    }





}
