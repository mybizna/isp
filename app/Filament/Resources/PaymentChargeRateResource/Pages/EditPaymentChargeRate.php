<?php

namespace Modules\Isp\Filament\Resources\PaymentChargeRateResource\Pages;

use Modules\Isp\Filament\Resources\PaymentChargeRateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentChargeRate extends EditRecord
{
    protected static string $resource = PaymentChargeRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
