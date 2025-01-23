<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\PaymentCharge;

class PaymentChargeResource extends BaseResource
{
    protected static ?string $model = PaymentCharge::class;

    protected static ?string $slug = 'isp/payment/charge';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
