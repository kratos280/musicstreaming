<?php
require_once(__DIR__ . '/../../../vendor/magpierss-0.72/rss_fetch.inc');

class PlaylistController extends BaseController{

    public function playlistView () {
        $params = json_decode(base64_decode(Input::get('params')),true);
        $topSongs = fetch_rss("https://itunes.apple.com/jp/rss/topsongs/limit=100/xml")->items;

        return View::make('Music.playlist', ['topSongs' => $topSongs]);
    }
}