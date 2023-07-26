<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Gateway extends BaseModel
{

    protected $fillable = ['title', 'username', 'password', 'database', 'ip_address', 'port', 'type', 'published'];
    public $migrationDependancy = [];
    protected $table = "isp_gateway";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('username')->type('text')->ordering(true);
        $fields->name('database')->type('text')->ordering(true);
        $fields->name('ip_address')->type('text')->ordering(true);
        $fields->name('port')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true); 



        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('username')->type('text')->group('w-1/2');
        $fields->name('password')->type('text')->group('w-1/2');
        $fields->name('database')->type('text')->group('w-1/2');
        $fields->name('ip_address')->type('text')->group('w-1/2');
        $fields->name('port')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('username')->type('text')->group('w-1/6');
        $fields->name('ip_address')->type('text')->group('w-1/6');
        $fields->name('port')->type('text')->group('w-1/6');

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
        $table->string('username');
        $table->string('password');
        $table->string('database');
        $table->string('ip_address');
        $table->string('port');
        $table->string('type');
        $table->boolean('published')->default(true)->nullable();
    }


}
