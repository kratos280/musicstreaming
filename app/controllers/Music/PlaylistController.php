<?php
require_once(__DIR__ . '/../../../vendor/magpierss-0.72/rss_fetch.inc');

class PlaylistController extends BaseController{

    public function playlistView ($params) {
        $params = json_decode(base64_decode(str_replace('-----', '/', $params)),true);
        $topSongs = fetch_rss("https://itunes.apple.com/jp/rss/topsongs/limit=100/xml")->items;

        $playlist_id = SearchPlaylist::where(array('name' => $params['name'], 'artist' => $params['artist']))->first();

        $items = null;

        if (!$playlist_id) {
            $playlist_id = new SearchPlaylist();
            $playlist_id->name = $params['name'];
            $playlist_id->artist = $params['artist'];
            $playlist_id->save();
        }

        if ($playlist_id->playlist_id) {
            $google_client = new Google_Client();
            $google_client->setDeveloperKey("AIzaSyD1nDPXUdeHURY3G3uVPVBRRLc99jyM84w");
            $youtube = new Google_Service_YouTube($google_client);

            $items = $youtube->playlistItems->listPlaylistItems('snippet', array('playlistId' => $playlist_id->playlist_id, 'maxResults' => 50))->getItems();
        }

        return View::make('Music.playlist', ['topSongs' => $topSongs, 'title' => $params['name']. ' ('.$params['artist'].')', 'items' => $items]);
    }
}