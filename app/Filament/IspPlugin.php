<?php

namespace Modules\Isp\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class IspPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Isp';
    }

    public function getId(): string
    {
        return 'isp';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
