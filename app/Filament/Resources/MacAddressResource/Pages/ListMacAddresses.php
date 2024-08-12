<?php

namespace Modules\Isp\Filament\Resources\MacAddressResource\Pages;

use Modules\Isp\Filament\Resources\MacAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMacAddresses extends ListRecords
{
    protected static string $resource = MacAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
