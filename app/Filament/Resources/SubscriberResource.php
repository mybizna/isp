<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\Subscriber;

class SubscriberResource extends BaseResource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $slug = 'isp/subscriber';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
