<?php

namespace Platform\Product\Providers;

use Platform\Product\Models\Product;
use Illuminate\Support\ServiceProvider;
use Platform\Product\Repositories\Caches\ProductCacheDecorator;
use Platform\Product\Repositories\Eloquent\ProductRepository;
use Platform\Product\Repositories\Interfaces\ProductInterface;
use Platform\Base\Supports\Helper;
use Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ProductServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ProductInterface::class, function () {
            return new ProductCacheDecorator(new ProductRepository(new Product));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/product')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Product::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-product',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/product::product.name',
                'icon'        => 'fa fa-list',
                'url'         => route('product.index'),
                'permissions' => ['product.index'],
            ]);
        });
    }
}
