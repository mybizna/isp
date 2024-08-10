<?php

namespace Modules\Isp\Listeners;

use Modules\Isp\Models\Subscriber;

class IspUsernameResolver
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
        $username = $event->username;

        $allow_partner_lookup = true;

        if ($allow_partner_lookup) {
            $subscriber = Subscriber::where('username', $username)->first();

            if ($subscriber) {
                return $username;
            }

        }

    }
}
