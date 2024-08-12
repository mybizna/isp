<?php

namespace Modules\Isp\Listeners;

use Modules\Isp\Models\Subscriber;

class IspPartnerResolver
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
        //
        $slug = $event->slug;

        $allow_partner_lookup = true;

        if ($allow_partner_lookup) {
            $subscriber = Subscriber::where('username', $slug)->first();

            if ($subscriber) {
                return $subscriber->partner_id;
            }
        }

    }
}
