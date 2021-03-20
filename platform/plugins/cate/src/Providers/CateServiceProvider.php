<?php

namespace Platform\Cate\Providers;

use Platform\Cate\Models\Cate;
use Illuminate\Support\ServiceProvider;
use Platform\Cate\Repositories\Caches\CateCacheDecorator;
use Platform\Cate\Repositories\Eloquent\CateRepository;
use Platform\Cate\Repositories\Interfaces\CateInterface;
use Platform\Base\Supports\Helper;
use Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class CateServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(CateInterface::class, function () {
            return new CateCacheDecorator(new CateRepository(new Cate));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/cate')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Cate::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-cate',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/cate::cate.name',
                'icon'        => 'fa fa-list',
                'url'         => route('cate.index'),
                'permissions' => ['cate.index'],
            ]);
        });
    }
}
