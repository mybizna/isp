<?php

namespace Modules\Isp\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Partner\Events\GetPartner;
use Modules\Base\Events\ReservedUsernames;
use Modules\Account\Events\InvoiceItemPaid;
use Modules\Isp\Listeners\IspPartnerResolver;
use Modules\Isp\Listeners\IspUsernameResolver;
use Modules\Isp\Listeners\PaidPackageActivation;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InvoiceItemPaid::class => [
            PaidPackageActivation::class,
        ],
        GetPartner::class => [
            IspPartnerResolver::class,
        ],
        ReservedUsernames::class => [
            IspUsernameResolver::class,
        ],
    ];

}
