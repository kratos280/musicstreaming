<?php

require_once(__DIR__ . '/../../../vendor/magpierss-0.72/rss_fetch.inc');

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
        if( Auth::check() ) {
            $user = Auth::user();
        }
		$lang = Input::get('lang');
		if (!$lang || !in_array($lang, array('en', 'jp'))) {
			$lang = 'en';
		}
        $topSongs = fetch_rss("https://itunes.apple.com/".$lang."/rss/topsongs/limit=100/xml")->items;
        $topAlbums = fetch_rss("https://itunes.apple.com/".$lang."/rss/topalbums/limit=6/xml")->items;

        return View::make('Music.index', [
            'topSongs' => $topSongs,
            'topAlbums' => $topAlbums,
			'lang' => $lang
        ]);
	}
}
