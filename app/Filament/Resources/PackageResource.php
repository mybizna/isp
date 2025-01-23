<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\Package;

class PackageResource extends BaseResource
{
    protected static ?string $model = Package::class;

    protected static ?string $slug = 'isp/package';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
