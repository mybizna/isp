<?php

namespace Modules\Isp\Filament\Resources\PaymentChargeRateResource\Pages;

use Modules\Isp\Filament\Resources\PaymentChargeRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentChargeRates extends ListRecords
{
    protected static string $resource = PaymentChargeRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
