<?php

namespace Platform\Translation\Providers;

use Illuminate\Routing\Events\RouteMatched;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Platform\Translation\Console\CleanCommand;
use Platform\Translation\Console\ExportCommand;
use Platform\Translation\Console\FindCommand;
use Platform\Translation\Console\ImportCommand;
use Platform\Translation\Console\ResetCommand;
use Platform\Translation\Manager;
use Event;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind('translation-manager', Manager::class);

        $this->commands([
            ImportCommand::class,
            FindCommand::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ResetCommand::class,
                ExportCommand::class,
                CleanCommand::class,
            ]);
        }
    }

    public function boot()
    {
        $this->setNamespace('plugins/translation')
            ->loadAndPublishConfigurations(['general', 'permissions'])
            ->loadMigrations()
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugin-translation',
                    'priority'    => 6,
                    'parent_id'   => 'cms-core-platform-administration',
                    'name'        => 'plugins/translation::translation.translations',
                    'icon'        => null,
                    'url'         => route('translations.index'),
                    'permissions' => ['translations.index'],
                ]);
        });
    }
}
