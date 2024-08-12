<?php

namespace Modules\Isp\Filament\Resources\MacAddressResource\Pages;

use Modules\Isp\Filament\Resources\MacAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMacAddress extends EditRecord
{
    protected static string $resource = MacAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
