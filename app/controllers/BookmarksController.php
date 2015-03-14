<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 9:34
 */

class BookmarksController extends BaseController
{

    public function postItem()
    {
        $user = Auth::user();
        if( empty($user) ) {
            App:abort(404);
        }
        $audio_id = Input::get('audio_id');
        if( !isset($audio_id) ) {
            App::abort(404);
        }
        $selectedPlaylistIds = Input::get('bookmarks');
        if( $selectedPlaylistIds ) {
            $firstAudio = Audio::find($audio_id);
            // Add to application Audio table
            if( !isset($firstAudio) ) {
                // Call to SoundClound API to get audio Infos
                $soundCloudService = new \Soundcloud\Service(Config::get('app.soundcloud.client_id'), Config::get('app.soundcloud.client_secret'));
                $item_json = $soundCloudService->get("tracks/$audio_id");
                $item = json_decode($item_json);
                if( !isset($item) ) {
                    App::abort(404);
                }
                $new_audio = new Audio();
                $new_audio->audio_id = $audio_id;
                $new_audio->title = $item->title;
                $new_audio->description = $item->description;
                $new_audio->artwork_url = $item->artwork_url;
                $new_audio->format = $item->original_format;
                $new_audio->uri = $item->uri;
                $new_audio->stream_url = $item->stream_url;
                $new_audio->downloadable= 1;
                $new_audio->status = 1;
                $new_audio->save();
            }

            // Delete audio playlist record
            AudioPlaylist::where('audio_id', '=', $audio_id)->delete();

            foreach( $selectedPlaylistIds as $selectedPlaylistId ) {
                $audioPlaylist = new AudioPlaylist();
                $audioPlaylist->playlist_id = $selectedPlaylistId;
                $audioPlaylist->audio_id = $audio_id;
                $audioPlaylist->save();
            }
        }
    }
} 