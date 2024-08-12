<?php

namespace Modules\Isp\Filament\Resources\GatewayResource\Pages;

use Modules\Isp\Filament\Resources\GatewayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGateways extends ListRecords
{
    protected static string $resource = GatewayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
