<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\PaymentChargeRate;

class PaymentChargeRateResource extends BaseResource
{
    protected static ?string $model = PaymentChargeRate::class;

    protected static ?string $slug = 'isp/payment/charge/rate';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
