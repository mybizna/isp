<?php

namespace Modules\Isp\Listeners;

use Modules\Isp\Classes\Freeradius;

class IspPackageUpdated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        
        $table_name = $event->table_name;
        
        if ($table_name == 'isp_package') {
            $freeradius = new Freeradius();

            $model = $event->model;
            
            $freeradius->setPackages($model);
        }

    }
}
