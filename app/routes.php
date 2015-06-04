<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group([
    "domain" => "musicfreeonline.tk"
], function() {
    Route::get ('/', 'HomeController@getIndex' );

    Route::get('/list','HomeController@getPlayList');

    Route::group(
        [
            'before' => '',
            'prefix' => 'audios'
        ]
        , function() {
            Route::get('/{audio_id}', 'AudiosController@getItem');
            Route::get('/{audio_id}/{playlist_id}', 'AudiosController@playPlaylist');
        });

    Route::group(
        [
            'prefix' => 'auth'
        ]
        , function() {
            Route::get('login', 'AuthController@index');
            Route::get('connect', 'AuthController@connect');
    });

    Route::group(
        [
            'before' => 'auth'
        ]
        , function() {
            Route::resource('playlists', 'PlaylistController');
            Route::get('me', 'AccountController@getIndex');
            Route::post('bookmark/create', 'BookmarksController@postItem');
            Route::get('audios/playlists', 'AudiosController@getPlaylists');
            Route::get('auth/logout', 'AuthController@logout');
        });
});

Route::group([
    "domain" => "boivuimienphi.tk"
], function() {
    Route::get ('/', 'BoiVui@index' );

    Route::get ('/congviec', 'BoiVui@userInfoForm');

    Route::post ('/ketqua', 'BoiVui@result');

    Route::get ('/gen_img', 'BoiVui@imageGenerator');
});
