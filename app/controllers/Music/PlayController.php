<?php
require_once(__DIR__ . '/../../../vendor/magpierss-0.72/rss_fetch.inc');

class PlayController extends BaseController{

    public function play($params) {
        $decoded_params = json_decode(base64_decode(str_replace('-----', '/',$params)), true);

        $google_client = new Google_Client();
        $google_client->setDeveloperKey("AIzaSyD1nDPXUdeHURY3G3uVPVBRRLc99jyM84w");
        $youtube = new Google_Service_YouTube($google_client);
        $video_info = array();
        if (array_key_exists('videoId', $decoded_params)) {
            //have video id and title
            if ($decoded_params['videoId'] == "LA7xcXOCAxU") {
                $decoded_params['videoId'] = "iRI2dNtVPis";
            }
            $video = $youtube->videos->listVideos('snippet', array('id' => $decoded_params['videoId']))->getItems()[0];

            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'maxResults' => 49, 'q' => $decoded_params['title']));
            $items = $search_response->getItems();
            if (!$video || !$items) {
                $error_link = new ErrorLinks();
                $error_link->link = "play/".$params;
                $error_link->save();
                return Redirect::to('/');
            }
            $video_info['video_id'] = $video->getId();
            $video_info['video_title'] = $video->getSnippet()->title;
            $video_info['video_img'] = $video->getSnippet()->getThumbnails()->medium->url;

        } else {
            //have name and artist
            $search_response = $youtube->search->listSearch("snippet", array('order' => 'relevance', 'type' => 'video', 'regionCode' => 'JP', 'maxResults' => 50, 'q' => $decoded_params['name'].' '.$decoded_params['artist']));
            $items = $search_response->getItems();
            if (!$items) {
                $error_link = new ErrorLinks();
                $error_link->link = "play/".$params;
                $error_link->save();
                return Redirect::to('/');
            }
            $video_result = SearchVideosCaches::where(array('name' => $decoded_params['name'], 'artist' => $decoded_params['artist']))->first();
            if (!$video_result) {
                $play_video = array_shift($items);
                if (!$items) {
                    $error_link = new ErrorLinks();
                    $error_link->link = "play/".$params;
                    $error_link->save();
                    return Redirect::to('/');
                }
                if ($decoded_params['artist'] && $decoded_params['name']) {
                    $video_result = new SearchVideosCaches();
                    $video_result->name = $decoded_params['name'];
                    $video_result->artist = $decoded_params['artist'];
                    $video_result->video_id = $play_video->getId()->videoId;
                    $video_result->video_title = $play_video->getSnippet()->title;
                    $video_result->img_url = $play_video->getSnippet()->getThumbnails()->medium->url;
                    $video_result->save();
                } else {
                    Session::put('playlist', null);
                }
                $video_info['video_id'] = $play_video->getId()->videoId;
                $video_info['video_title'] = $play_video->getSnippet()->title;
                $video_info['video_img'] = $play_video->getSnippet()->getThumbnails()->medium->url;

            } else {
                $video_info['video_id'] = $video_result->video_id;
                $video_info['video_title'] = $video_result->video_title;
                $video_info['video_img'] = $video_result->img_url;
            }
        }

        $playlist = Session::get('playlist');
        if ($playlist) {
            foreach ($playlist as $index => $info) {
                if ($info['video_id']) {
                    if ($info['video_id'] == $decoded_params['videoId']) {
                        Session::put('current_song_index', $index);
                        if ($index < (count($playlist) - 1)) {
                            Session::put('next_song', str_replace('/', '-----',base64_encode(json_encode(array('videoId' => $playlist[$index + 1]['video_id'], 'title' => $playlist[$index + 1]['title'])))));
                        } else {
                            Session::put('next_song', null);
                        }
                        break;
                    }
                } else {
                    if ($info['name'] == $decoded_params['name'] && $info['artist'] == $decoded_params['artist']) {
                        Session::put('current_song_index', $index);
                        if ($index < (count($playlist) - 1)) {
                            Session::put('next_song', str_replace('/', '-----',base64_encode(json_encode(array('name' => $playlist[$index + 1]['name'], 'artist' => $playlist[$index + 1]['artist'])))));
                        } else {
                            Session::put('next_song', null);
                        }
                        break;
                    }
                }
            }
            if (!Session::get('next_song')) {
                if ($info['video_id']) {
                    Session::put('next_song', str_replace('/', '-----',base64_encode(json_encode(array('videoId' => $playlist[0]["videoId"], 'title' => $playlist[0]["title"])))));
                } else {
                    Session::put('next_song', str_replace('/', '-----',base64_encode(json_encode(array('name' => $playlist[0]["name"], 'artist' => $playlist[0]["artist"])))));
                }
            }
        }

        if (!$playlist) {
            $topSongs = fetch_rss("https://itunes.apple.com/jp/rss/topsongs/limit=100/xml")->items;
            Session::put('current_song_index', -1);
            Session::put('next_song', str_replace('/', '-----',base64_encode(json_encode(array('name' => $topSongs[0]["im"]["name"], 'artist' => $topSongs[0]["im"]["artist"])))));
            $playlist = array();
            foreach ($topSongs as $topSong) {
                $playlist[] = array('name' => $topSong["im"]["name"], 'artist' => $topSong["im"]["artist"], 'img' => $topSong["im"]["image"]);
            }
            Session::put('playlist', $playlist);
        }

        return View::make('Music.play', ['items' => $items, 'video_info' => $video_info]);
    }
}