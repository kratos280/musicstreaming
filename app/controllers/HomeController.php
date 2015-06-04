<?php

require_once(__DIR__.'/../../vendor/magpierss-0.72/rss_fetch.inc');

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

        $topSongs = fetch_rss("https://itunes.apple.com/jp/rss/topsongs/limit=100/xml")->items;
        $topAlbums = fetch_rss("https://itunes.apple.com/jp/rss/topalbums/limit=6/xml")->items;
        $newReleases = fetch_rss("https://itunes.apple.com/WebObjects/MZStore.woa/wpa/MRSS/newreleases/sf=143441/limit=15/genre=17/rss.xml")->items;

        return View::make('index', [
            'topSongs' => $topSongs,
            'topAlbums' => $topAlbums,
            'newReleases' => $newReleases,
        ]);
	}

    public function getPlayList()
    {
        $key = Input::get('key');
        if( isset($key) ) {
            // Call to SoundClound API
            $soundCloudService = new \Soundcloud\Service(Config::get('app.soundcloud.client_id'), Config::get('app.soundcloud.client_secret'));
            $items_json = $soundCloudService->get('tracks', ['q' => $key, 'limit' => Config::get('parameters.searchLimit')]);
            $items = json_decode($items_json);
            return View::make('list', [
                'items' => $items,
                'key' => $key
            ]);
        }
    }

}
