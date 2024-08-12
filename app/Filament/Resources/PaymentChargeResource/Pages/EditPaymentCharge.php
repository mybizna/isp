<?php

namespace Modules\Isp\Filament\Resources\PaymentChargeResource\Pages;

use Modules\Isp\Filament\Resources\PaymentChargeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentCharge extends EditRecord
{
    protected static string $resource = PaymentChargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
