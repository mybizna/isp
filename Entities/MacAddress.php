<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class MacAddress extends BaseModel
{

    protected $fillable = ['subscriber_id', 'mac'];
    public $migrationDependancy = ['isp_subscriber'];
    protected $table = "isp_mac_address";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->ordering(true);
        $fields->name('mac')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/2');
        $fields->name('mac')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('subscriber_id')->type('recordpicker')->table('isp_subscriber')->group('w-1/6');
        $fields->name('mac')->type('text')->group('w-1/6');

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
        $table->foreignId('subscriber_id')->nullable();
        $table->string('mac')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'isp_subscriber', 'subscriber_id');
    }

}
