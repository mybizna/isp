<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class BillingCycle extends BaseModel
{

    protected $fillable = ['title', 'slug', 'description', 'duration', 'duration_type', 'published'];
    public $migrationDependancy = [];
    protected $table = "isp_billing_cycle";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('duration')->type('text')->ordering(true);
        $fields->name('duration_type')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('duration')->type('text')->group('w-1/2');
        $fields->name('duration_type')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');
        $fields->name('description')->type('textarea')->group('w-full');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('duration')->type('text')->group('w-1/6');
        $fields->name('duration_type')->type('text')->group('w-1/6');

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
        $table->string('description')->nullable();
        $table->string('duration')->nullable();
        $table->enum('duration_type', ['minute', 'hour', 'day', 'week', 'month', 'year'])->default('month')->nullable();
        $table->boolean('published')->default(true)->nullable();
    }
}
