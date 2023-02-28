<?php

namespace Modules\Isp\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Partner\Events\GetPartner;
use Modules\Base\Events\ReservedUsernames;
use Modules\Account\Events\InvoiceItemPaid;
use Modules\Base\Events\ModelCreated;
use Modules\Base\Events\ModelUpdated;
use Modules\Base\Events\ModelDeleted;
use Modules\Isp\Listeners\IspPartnerResolver;
use Modules\Isp\Listeners\IspUsernameResolver;
use Modules\Isp\Listeners\PaidPackageActivation;
use Modules\Isp\Listeners\IspSubscriberCreated;
use Modules\Isp\Listeners\IspSubscriberDeleted;
use Modules\Isp\Listeners\IspSubscriptionCreated;
use Modules\Isp\Listeners\IspSubscriptionDeleted;
use Modules\Isp\Listeners\IspPackageCreated;
use Modules\Isp\Listeners\IspPackageUpdated;
use Modules\Isp\Listeners\IspPackageDeleted;

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
        ModelCreated::class => [
            IspSubscriberCreated::class,
            IspSubscriptionCreated::class,
            IspPackageCreated::class,
        ],
        ModelDeleted::class => [
            IspSubscriberDeleted::class,
            IspSubscriptionDeleted::class,
            IspPackageDeleted::class,
        ],
        ModelUpdated::class => [
            IspPackageUpdated::class,
        ],
    ];

}
