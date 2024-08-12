<?php

namespace Modules\Isp\Filament\Resources\PackageChargeResource\Pages;

use Modules\Isp\Filament\Resources\PackageChargeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageCharge extends EditRecord
{
    protected static string $resource = PackageChargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
