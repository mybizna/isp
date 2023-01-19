<?php

namespace Modules\Isp\Providers;

use Modules\Account\Events\InvoiceItemPaid;
use Modules\Isp\Listeners\PaidPackageActivation;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InvoiceItemPaid::class => [
            PaidPackageActivation::class,
        ],
    ];
}