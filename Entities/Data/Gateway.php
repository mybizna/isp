<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;

class Gateway
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 1;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $datasetter->add_data('isp', 'gateway', 'type', [
            "title" => "Freeradius",
            "username" => "admin",
            "password" => "passme",
            "database" => "freeradius",
            "ip_address" => "127.0.0.1",
            "port" => "3306",
            "type" => "freeradius",
            "published" => true,
        ]);

    }
}
