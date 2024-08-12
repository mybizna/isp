<?php

namespace Modules\Isp\Filament\Resources\PaymentChargeResource\Pages;

use Modules\Isp\Filament\Resources\PaymentChargeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentCharges extends ListRecords
{
    protected static string $resource = PaymentChargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
