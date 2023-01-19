<?php

namespace Modules\Isp\Listeners;

use Modules\Isp\Classes\Subscription;
use Modules\Isp\Entities\Subscriber;

class PaidPackageActivation
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
        $subscription = new Subscription();

        $invoice = $event->invoice;
        $invoice_item = $event->invoice_item;

        if ($invoice_item->module == 'Isp' && $invoice_item->module == 'Package') {

            $subscriber = Subscriber::where('partner_id', $invoice->partner_id)->first();

            $subscription->addSubscription($invoice_item->item_id, $subscriber->id);

        }

    }
}
