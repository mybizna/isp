<?php

namespace Modules\Isp\Listeners;

class IspSubscriptionDeleted
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

        if ($table_name == 'isp_subscription') {
            $model = $event->model;

        }

    }
}
