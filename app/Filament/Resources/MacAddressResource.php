<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\MacAddress;

class MacAddressResource extends BaseResource
{
    protected static ?string $model = MacAddress::class;

    protected static ?string $slug = 'isp/mac_address';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
