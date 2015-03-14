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

Route::get ('/', 'HomeController@getIndex' );

Route::get('/list','HomeController@getPlayList');

Route::group(
    [
        'before' => '',
        'prefix' => 'audios'
    ]
    , function() {

        // DASHBOARD
        Route::get('/{audio_id}', 'AudiosController@getItem');
    });
