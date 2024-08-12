<?php

namespace Modules\Isp\Filament\Resources\BillingCycleResource\Pages;

use Modules\Isp\Filament\Resources\BillingCycleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillingCycle extends EditRecord
{
    protected static string $resource = BillingCycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
