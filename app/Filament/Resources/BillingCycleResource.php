<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\BillingCycle;

class BillingCycleResource extends BaseResource
{
    protected static ?string $model = BillingCycle::class;

    protected static ?string $slug = 'isp/billing_cycle';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
