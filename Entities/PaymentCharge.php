<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class PaymentCharge extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'slug', 'payment_id', 'ledger_id', 'price', 'quantity', 'published'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['isp_payment', 'account_ledger'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "isp_payment_charge";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->string('title')->html('text');
        $this->fields->string('slug')->html('text');
        $this->fields->foreignId('payment_id')->html('recordpicker')->relation(['isp', 'payment']);
        $this->fields->foreignId('ledger_id')->html('recordpicker')->relation(['account', 'ledger']);
        $this->fields->integer('quantity')->default(1)->html('number');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->double('price', 8, 2)->nullable()->html('number');
        $this->fields->boolean('published')->default(true)->nullable()->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure = [
            'table' => ['title', 'payment_id', 'ledger_id', 'price', 'published'],
            'form' => [
                ['label' => 'Title', 'class' => 'w-full', 'fields' => ['title', 'slug']],
                ['label' => 'Payment Charge', 'class' => 'w-1/2', 'fields' => ['payment_id', 'ledger_id']],
                ['label' => 'Amount', 'class' => 'w-1/2', 'fields' => ['price', 'quantity']],
                ['label' => 'Setting', 'class' => 'w-1/2', 'fields' => ['published']],
            ],
            'filter' => ['title', 'payment_id', 'ledger_id'],
        ];

        return $structure;
    }

}
