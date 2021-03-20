<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.

use Theme\Shop\Http\Controllers\ShopController;

Route::group(['namespace' => 'Theme\Shop\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'ShopController@getHello');
        Route::get('product/{id}', [ShopController::class, 'detailProduct'])->name('product.detail');
        Route::get('category/{id}', [ShopController::class, 'detailCategory'])->name('category.detail');
    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\Shop\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'ShopController@getIndex')
            ->name('public.index');

        Route::get('sitemap.xml', 'ShopController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'ShopController@getView')
            ->name('public.single');
        Route::post('cart/add', function () {
            return request();
        })->name('cart.add');
    });
});
