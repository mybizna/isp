<?php

namespace Modules\Isp\Filament\Resources\PackageChargeRateResource\Pages;

use Modules\Isp\Filament\Resources\PackageChargeRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageChargeRates extends ListRecords
{
    protected static string $resource = PackageChargeRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
