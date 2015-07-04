<?php

class PlayController extends BaseController{

    public function play() {
        $params = json_decode(base64_decode(Input::get('params')), true);

        $google_client = new Google_Client();
        $google_client->setDeveloperKey("AIzaSyD1nDPXUdeHURY3G3uVPVBRRLc99jyM84w");
        $youtube = new Google_Service_YouTube($google_client);
        $video_info = array();
        if (array_key_exists('videoId', $params)) {
            //have video id and title
            $video = $youtube->videos->listVideos('snippet', array('id' => $params['videoId']))->getItems()[0];

            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'regionCode' => 'JP', 'maxResults' => 49, 'q' => $params['title']));
            $items = $search_response->getItems();

            $video_info['video_id'] = $video->getId();
            $video_info['video_title'] = $video->getSnippet()->title;
            $video_info['video_img'] = $video->getSnippet()->getThumbnails()->medium->url;

        } else {
            //have name and artist
            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'regionCode' => 'JP', 'maxResults' => 50, 'q' => $params['name'].' '.$params['artist']));
            $items = $search_response->getItems();

            $video_result = SearchVideosCaches::where(array('name' => $params['name'], 'artist' => $params['artist']))->first();
            if (!$video_result) {
                $play_video = array_shift($items);
                $video_result = new SearchVideosCaches();
                $video_result->name = $params['name'];
                $video_result->artist = $params['artist'];
                $video_result->video_id = $play_video->getId()->videoId;
                $video_result->video_title = $play_video->getSnippet()->title;
                $video_result->img_url = $play_video->getSnippet()->getThumbnails()->medium->url;
                $video_result->save();
            }

            $video_info['video_id'] = $video_result->video_id;
            $video_info['video_title'] = $video_result->video_title;
            $video_info['video_img'] = $video_result->img_url;
        }

        $playlist = Session::get('playlist');
        if ($playlist) {
            foreach ($playlist as $index => $info) {
                if ($info['video_id']) {
                    if ($info['video_id'] == $params['videoId']) {
                        Session::put('current_song_index', $index);
                        if ($index < (count($playlist) - 1)) {
                            Session::put('next_song', base64_encode(json_encode(array('videoId' => $playlist[$index + 1]['video_id'], 'title' => $playlist[$index + 1]['title']))));
                        } else {
                            Session::put('next_song', null);
                        }
                        break;
                    }
                } else {
                    if ($info['name'] == $params['name'] && $info['artist'] == $params['artist']) {
                        Session::put('current_song_index', $index);
                        if ($index < (count($playlist) - 1)) {
                            Session::put('next_song', base64_encode(json_encode(array('name' => $playlist[$index + 1]['name'], 'artist' => $playlist[$index + 1]['artist']))));
                        } else {
                            Session::put('next_song', null);
                        }
                        break;
                    }
                }
            }
        }

        return View::make('Music.play', ['items' => $items, 'video_info' => $video_info]);
    }
}