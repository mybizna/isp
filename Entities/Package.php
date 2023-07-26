<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Package extends BaseModel
{

    protected $fillable = [
        'title', 'slug', 'pool', 'description', 'billing_cycle_id', 'gateway_id',
        'speed', 'speed_type', 'bundle', 'bundle_type', 'published',
        'featured', 'default', 'is_unlimited', 'is_hidden', 'amount',
    ];
    public $migrationDependancy = ['isp_billing_cycle'];
    protected $table = "isp_package";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('pool')->type('text')->ordering(true);
        $fields->name('billing_cycle_id')->type('recordpicker')->table('isp_billing_cycle')->ordering(true);
        $fields->name('gateway_id')->type('recordpicker')->table('isp_gateway')->ordering(true);
        $fields->name('speed')->type('text')->ordering(true);
        $fields->name('speed_type')->type('text')->ordering(true);
        $fields->name('bundle')->type('text')->ordering(true);
        $fields->name('bundle_type')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('pool')->type('text')->group('w-1/2');
        $fields->name('billing_cycle_id')->type('recordpicker')->table('isp_billing_cycle')->group('w-1/2');
        $fields->name('gateway_id')->type('recordpicker')->table('isp_gateway')->group('w-1/2');
        $fields->name('speed')->type('text')->group('w-1/2');
        $fields->name('speed_type')->type('text')->group('w-1/2');
        $fields->name('bundle')->type('text')->group('w-1/2');
        $fields->name('bundle_type')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('pool')->type('text')->group('w-1/6');
        $fields->name('billing_cycle_id')->type('recordpicker')->table('isp_billing_cycle')->group('w-1/6');
        $fields->name('gateway_id')->type('recordpicker')->table('isp_gateway')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title');
        $table->string('slug');
        $table->string('pool');
        $table->string('description')->nullable();

        $table->foreignId('billing_cycle_id')->nullable();
        $table->foreignId('gateway_id')->nullable();

        $table->string('speed')->nullable();
        $table->enum('speed_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();

        $table->string('bundle')->nullable();
        $table->enum('bundle_type', ['gigabyte', 'kilobyte', 'megabyte'])->default('megabyte')->nullable();

        $table->boolean('published')->default(1)->nullable();
        $table->boolean('featured')->default(0)->nullable();
        $table->boolean('default')->default(0)->nullable();
        $table->boolean('is_unlimited')->default(0)->nullable();
        $table->boolean('is_hidden')->default(0)->nullable();
        $table->double('amount', 8, 2)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_billing_cycle', 'billing_cycle_id');
        Migration::addForeign($table, 'isp_gateway', 'gateway_id');
    }
}
