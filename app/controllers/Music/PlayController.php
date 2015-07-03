<?php

class PlayController extends BaseController{

    public function play() {
        $params = json_decode(base64_decode(Input::get('params')), true);

        $google_client = new Google_Client();
        $google_client->setDeveloperKey("AIzaSyD1nDPXUdeHURY3G3uVPVBRRLc99jyM84w");
        $youtube = new Google_Service_YouTube($google_client);

        if (array_key_exists('videoId', $params)) {
            //have video id and title
            $video = $youtube->videos->listVideos('snippet', array('id' => $params['videoId']))->getItems()[0];
            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'regionCode' => 'JP', 'maxResults' => 49, 'q' => $params['title']));
            $items = $search_response->getItems();
            array_unshift($items, $video);
        } else {
            //have name and artist
            $top_songs = Session::get('top_songs');
            foreach ($top_songs as $index => $info) {
                if ($info['name'] == $params['name'] && $info['artist'] == $params['artist']) {
                    if ($index < (count($top_songs) - 1)) {
                        Session::put('next_song', base64_encode(json_encode(array('name' => $top_songs[$index+1]['name'], 'artist' => $top_songs[$index+1]['artist']))));
                    } else {
                        Session::put('next_song', null);
                    }
                }
            }
            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'regionCode' => 'JP', 'maxResults' => 50, 'q' => $params['name'].' '.$params['artist']));
            $items = $search_response->getItems();
        }

        return View::make('Music.play', ['items' => $items]);
    }
}