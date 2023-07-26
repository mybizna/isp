<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;


class PackageCharge extends BaseModel
{

    protected $fillable = ['title', 'slug', 'description', 'package_id', 'ledger_id', 'price','quantity', 'published'];
    public $migrationDependancy = ['isp_package',   'account_ledger'];
    protected $table = "isp_package_charge";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->ordering(true);
        $fields->name('ledger_id')->type('recordpicker')->table('account_ledger')->ordering(true);
        $fields->name('quantity')->type('text')->ordering(true);
        $fields->name('description')->type('textarea')->ordering(true);
        $fields->name('price')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/2');
        $fields->name('ledger_id')->type('recordpicker')->table('account_ledger')->group('w-1/2');
        $fields->name('quantity')->type('text')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');
        $fields->name('price')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/6');
        $fields->name('ledger_id')->type('recordpicker')->table('account_ledger')->group('w-1/6');
        $fields->name('quantity')->type('text')->group('w-1/6');
        $fields->name('price')->type('text')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');
        

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
        $table->foreignId('package_id');
        $table->foreignId('ledger_id');
        $table->tinyInteger('quantity')->default(1);
        $table->string('description')->nullable();
        $table->double('price', 8, 2)->nullable();
        $table->boolean('published')->default(true)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_package', 'package_id');
        Migration::addForeign($table, 'account_ledger', 'ledger_id');
    }
}
