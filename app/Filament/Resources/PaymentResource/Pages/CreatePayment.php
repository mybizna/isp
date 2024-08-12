<?php

namespace Modules\Isp\Filament\Resources\PaymentResource\Pages;

use Modules\Isp\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
