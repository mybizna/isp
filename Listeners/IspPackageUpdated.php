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
        if ($event->table_name == 'isp_package') {
            if (defined('MYBIZNA_MIGRATION') && MYBIZNA_MIGRATION) {
                return;
            }

            $freeradius = new Freeradius();
            $freeradius->setPackages($event->model);
        }

    }
}
