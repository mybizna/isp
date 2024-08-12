<?php

namespace Modules\Isp\Filament\Resources\PackageChargeRateResource\Pages;

use Modules\Isp\Filament\Resources\PackageChargeRateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageChargeRate extends EditRecord
{
    protected static string $resource = PackageChargeRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
