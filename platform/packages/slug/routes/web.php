<?php

Route::group(['namespace' => 'Platform\Slug\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(['prefix' => 'ajax'], function () {
        Route::group(['prefix' => 'slug'], function () {
            Route::post('create', [
                'as'         => 'slug.create',
                'uses'       => 'SlugController@store',
            ]);
        });
    });
});
