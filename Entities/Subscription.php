<?php

namespace Modules\Isp\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Subscription extends BaseModel
{

    protected $fillable = ['subscriber_id', 'package_id', 'start_date','end_date'];
    public $migrationDependancy = ['isp_subscriber', 'isp_package'];
    protected $table = "isp_subscription";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->ordering(true);
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->ordering(true);
        $fields->name('start_date')->type('datetime')->ordering(true);
        $fields->name('end_date')->type('datetime')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/2');
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/2');
        $fields->name('start_date')->type('datetime')->group('w-1/2');
        $fields->name('end_date')->type('datetime')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/2');
        $fields->name('package_id')->type('recordpicker')->table('isp_package')->group('w-1/2');
        $fields->name('start_date')->type('datetime')->group('w-1/2');
        $fields->name('end_date')->type('datetime')->group('w-1/2');
        

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
        $table->foreignId('subscriber_id');
        $table->foreignId('package_id');
        $table->datetime('start_date');
        $table->datetime('end_date');
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscriber', 'subscriber_id');
        Migration::addForeign($table, 'isp_package', 'package_id');
    }
}
