<?php

Route::group(['namespace' => 'Platform\Cate\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'cates', 'as' => 'cate.'], function () {
            Route::resource('', 'CateController')->parameters(['' => 'cate']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CateController@deletes',
                'permission' => 'cate.destroy',
            ]);
        });
    });

});
