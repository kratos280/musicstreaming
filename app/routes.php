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
$musicDomainFunction =  function() {
    Route::get ('/', 'HomeController@getIndex' );

    Route::post('search', function() {
        $keyword = Input::get('search');

        return Redirect::to('/play?params='.base64_encode(json_encode(array('name' => $keyword))));
    });

    Route::get('/playlist/{params}','PlaylistController@playlistView');

    Route::get('play/{params}', 'PlayController@play');

    Route::get('play', function () {
        $params = Input::get('params');
        return Redirect::to('play/'.str_replace('/', '-----',$params));
    });

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
};

Route::group(["domain" => "musiconlinetop1.com"], $musicDomainFunction);
Route::group(["domain" => "www.musiconlinetop1.com"], $musicDomainFunction);

Route::group([
    "domain" => "gameonlinevui.com"
], function() {
    Route::get ('/', 'BoiVui@index' );

    Route::get ('/{type}', function($type) {
        return View::make('BoiVui.user_info_form', ['type' => $type]);
    });

    Route::post ('/submit', 'BoiVui@submit');

    Route::get ('/ketqua/{type}/{param}', function($type, $param) {
        return View::make('BoiVui.result', ['type' => $type, 'param' => $param]);
    });

    Route::get ('/gen_img/{type}/{param}', 'ImageGenerator@generateImage');
});
