<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\PackageCharge;

class PackageChargeResource extends BaseResource
{
    protected static ?string $model = PackageCharge::class;

    protected static ?string $slug = 'isp/package/charge';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
