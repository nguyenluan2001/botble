<?php

namespace Platform\Language\Providers;

use Platform\Language\Commands\RouteTranslationsCacheCommand;
use Platform\Language\Commands\RouteTranslationsClearCommand;
use Platform\Language\Commands\SyncOldDataCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (version_compare(get_cms_version(), '5.12') > 0) {
            $this->commands([
                SyncOldDataCommand::class,
                RouteTranslationsClearCommand::class,
                RouteTranslationsCacheCommand::class,
            ]);
        } else {
            $this->commands([
                SyncOldDataCommand::class,
            ]);
        }
    }
}
