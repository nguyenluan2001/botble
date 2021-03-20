<?php

Route::group(['namespace' => 'Platform\Product\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
            Route::resource('', 'ProductController')->parameters(['' => 'product']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ProductController@deletes',
                'permission' => 'product.destroy',
            ]);
        });
    });

});
