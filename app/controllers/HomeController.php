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
//        $client = new Desarrolla2\RSSClient\RSSClient();
//        $client->addFeeds(['https://itunes.apple.com/us/rss/topsongs/limit=10/xml']);
//        $topSongs = $client->fetch();
//        $client->addFeeds(['https://itunes.apple.com/us/rss/topalbums/limit=10/xml']);
//        $topAlbums = $client->fetch();
//        $client->addFeeds(['https://itunes.apple.com/WebObjects/MZStore.woa/wpa/MRSS/newreleases/sf=143441/limit=10/rss.xml']);
//        $newReleases = $client->fetch();
//        dd($topAlbums);
        $topSongs = fetch_rss("https://itunes.apple.com/us/rss/topsongs/limit=10/xml")->items;

        $topAlbums = fetch_rss("https://itunes.apple.com/us/rss/topalbums/limit=10/xml")->items;

        $newReleases = fetch_rss("https://itunes.apple.com/WebObjects/MZStore.woa/wpa/MRSS/newreleases/sf=143441/limit=10/rss.xml")->items;

        return View::make('index', [
            'topSongs' => $topSongs,
            'topAlbums' => $topAlbums,
            'newReleases' => $newReleases,
        ]);
	}

    public function getPlayList()
    {
        $title = Input::get('title');
        if( isset($title) ) {
            // Call to SoundClound API
            $soundCloudService = new \Soundcloud\Service(Config::get('app.soundcloud.client_id'), Config::get('app.soundcloud.client_secret'));
            $items_json = $soundCloudService->get('tracks', ['q' => $title, 'limit' => Config::get('parameters.searchLimit')]);
            $items = json_decode($items_json);
            return View::make('list', [
                'items' => $items,
            ]);
        }
    }

}
