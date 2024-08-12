<?php

namespace Modules\Isp\Filament\Resources\PackageChargeResource\Pages;

use Modules\Isp\Filament\Resources\PackageChargeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageCharges extends ListRecords
{
    protected static string $resource = PackageChargeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
