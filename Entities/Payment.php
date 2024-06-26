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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title', 'subscription_id'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_subscription', 'account_invoice'];

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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        //'title', 'subscription_id', 'invoice_id', 'description', 'is_paid', 'completed', 'successful'

        $structure['table'] = ['title', 'subscription_id', 'invoice_id', 'is_paid', 'completed', 'successful'];
        $structure['form'] = [
            ['label' => 'Payment Title', 'class' => 'col-span-full', 'fields' => ['title']],
            ['label' => 'Payment Details', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['subscription_id', 'invoice_id']],
            ['label' => 'Payment Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['is_paid', 'completed', 'successful']],
            ['label' => 'Payment Description', 'class' => 'col-span-full', 'fields' => ['description']],
        ];
        $structure['filter'] = ['title', 'subscription_id', 'invoice_id', 'successful'];

        return $structure;
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }

}
