<?php

namespace Modules\Isp\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Models\Subscription;

class SubscriptionResource extends BaseResource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $slug = 'isp/subscription';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
