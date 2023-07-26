<?php

namespace Modules\Isp\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class SubscriberLogin extends BaseModel
{

    protected $fillable = ['mac', 'ip', 'username', 'link_login', 'link_orig', 'error', 'chap_id', 'chap_challenge', 'link_login_id', 'link_orig_esc', 'mac_esc'];
    public $migrationDependancy = [];
    protected $table = "isp_subscriber_login";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('mac')->type('text')->ordering(true);
        $fields->name('ip')->type('text')->ordering(true);
        $fields->name('username')->type('text')->ordering(true);
        $fields->name('link_login')->type('text')->ordering(true);
        $fields->name('link_orig')->type('text')->ordering(true);
        $fields->name('error')->type('text')->ordering(true);
        $fields->name('chap_id')->type('text')->ordering(true);
        $fields->name('chap_challenge')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('mac')->type('text')->group('w-1/2');
        $fields->name('ip')->type('text')->group('w-1/2');
        $fields->name('username')->type('text')->group('w-1/2');
        $fields->name('link_login')->type('text')->group('w-1/2');
        $fields->name('link_orig')->type('text')->group('w-1/2');
        $fields->name('error')->type('text')->group('w-1/2');
        $fields->name('chap_id')->type('text')->group('w-1/2');
        $fields->name('chap_challenge')->type('text')->group('w-1/2');
        $fields->name('link_login_id')->type('text')->group('w-1/2');
        $fields->name('link_orig_esc')->type('text')->group('w-1/2');
        $fields->name('mac_esc')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('mac')->type('text')->group('w-1/2');
        $fields->name('ip')->type('text')->group('w-1/2');
        $fields->name('username')->type('text')->group('w-1/2');

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
        $table->string('mac')->nullable();
        $table->string('ip')->nullable();
        $table->string('username')->nullable();
        $table->string('link_login')->nullable();
        $table->string('link_orig')->nullable();
        $table->string('error')->nullable();
        $table->string('chap_id')->nullable();
        $table->string('chap_challenge')->nullable();
        $table->string('link_login_id')->nullable();
        $table->string('link_orig_esc')->nullable();
        $table->string('mac_esc')->nullable();
    }

}
