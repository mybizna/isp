<?php

namespace Modules\Isp\Listeners;

use Modules\Isp\Classes\Freeradius;

class IspSubscriptionCreated
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
        $freeradius = new Freeradius();

        $table_name = $event->table_name;

        if ($table_name == 'isp_subscription') {
            $freeradius->setSubscription($event->model);
        }

    }
}
