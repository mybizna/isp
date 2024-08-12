<?php

namespace Modules\Isp\Filament\Resources\SubscriberResource\Pages;

use Modules\Isp\Filament\Resources\SubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubscribers extends ListRecords
{
    protected static string $resource = SubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
