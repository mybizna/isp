<?php

namespace Modules\Isp\Filament\Resources\SubscriberLoginResource\Pages;

use Modules\Isp\Filament\Resources\SubscriberLoginResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubscriberLogins extends ListRecords
{
    protected static string $resource = SubscriberLoginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
