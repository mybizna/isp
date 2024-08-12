<?php

namespace Modules\Isp\Filament\Resources\SubscriberLoginResource\Pages;

use Modules\Isp\Filament\Resources\SubscriberLoginResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriberLogin extends EditRecord
{
    protected static string $resource = SubscriberLoginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
