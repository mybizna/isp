<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;
use Illuminate\Support\Facades\DB;

class Gateway
{

    public $ordering = 1;

    public function data(Datasetter $datasetter)
    {
        $datasetter->add_data('isp', 'gateway', 'type', [
            "title" => "Freeradius",
            "username" => "admin",
            "password" => "passme",
            "database" => "freeradius",
            "ip_address" => "127.0.0.1",
            "port" => "3306",
            "type" => "freeradius",
            "published" => true
        ]);


    }
}