<?php

namespace Modules\Isp\Listeners;

class IspSubscriberDeleted
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

        if ($table_name == 'isp_subscriber') {
            $model = $event->model;

        }

    }
}
