<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\SubscriberLogin;

class SubscriberLoginResource extends BaseResource
{
    protected static ?string $model = SubscriberLogin::class;

    protected static ?string $slug = 'isp/subscriber/login';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
