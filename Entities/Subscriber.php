<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Subscriber extends BaseModel
{

    protected $fillable = ['username', 'password','had_trail', 'partner_id'];
    public $migrationDependancy = [];
    protected $table = "isp_subscriber";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('username')->type('text')->ordering(true);
        $fields->name('had_trail')->type('switch')->ordering(true);
        $fields->name('partner_id')->type('recordpicker')->table('partner')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('username')->type('text')->group('w-1/2');
        $fields->name('password')->type('password')->group('w-1/2');
        $fields->name('had_trail')->type('switch')->group('w-1/2');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('username')->type('text')->group('w-1/6');
        $fields->name('had_trail')->type('switch')->group('w-1/6');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/6');

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
        $table->string('username')->unique();
        $table->string('password');
        $table->boolean('had_trail')->default(0)->nullable();
        $table->foreignId('partner_id')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'partner', 'partner_id');
    }
}
