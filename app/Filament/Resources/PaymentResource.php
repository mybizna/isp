<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\Payment;

class PaymentResource extends BaseResource
{
    protected static ?string $model = Payment::class;

    protected static ?string $slug = 'isp/payment';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
