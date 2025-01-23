<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\PackageChargeRate;

class PackageChargeRateResource extends BaseResource
{
    protected static ?string $model = PackageChargeRate::class;

    protected static ?string $slug = 'isp/package/charge/rate';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
