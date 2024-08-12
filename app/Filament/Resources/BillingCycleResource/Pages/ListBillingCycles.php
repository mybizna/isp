<?php

namespace Modules\Isp\Filament\Resources\BillingCycleResource\Pages;

use Modules\Isp\Filament\Resources\BillingCycleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillingCycles extends ListRecords
{
    protected static string $resource = BillingCycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
