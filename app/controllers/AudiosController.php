<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 9:34
 */

class AudiosController extends BaseController
{

    public function getItem($audio_id)
    {
        $key = Input::get('key', '');
        // Call to SoundClound API
        $soundCloudService = new \Soundcloud\Service(Config::get('app.soundcloud.client_id'), Config::get('app.soundcloud.client_secret'));
        $items_json = $soundCloudService->get('tracks', ['q' => $key, 'limit' => Config::get('parameters.searchLimit')]);
        $items = json_decode($items_json);
        $relateItems = array_filter($items, function($item) use($audio_id) {
            return $item->id != $audio_id;
        });

        $playlists = Playlist::all();
        $bookmarkedPlaylistIds = AudioPlaylist::where('audio_id', '=', $audio_id)->lists('playlist_id');

        return View::make('audios.item', [
            'audio_id' => $audio_id,
            'relateItems' => $relateItems,
            'playlists' => $playlists,
            'bookmarkedPlaylistIds' => $bookmarkedPlaylistIds,
        ]);
    }

    public function playPlaylist($audio_id, $playlist_id) {
        $playlist_audios = AudioPlaylist::with('audio')->where('playlist_id', '=', $playlist_id)->get();
        $match = 0;
        $relateItems = array();
        foreach($playlist_audios as $playlist_audio) {
            if ($playlist_audio->audio->audio_id == $audio_id) {
                $match = 1;
            }
            if (!$match || $playlist_audio->audio->audio_id == $audio_id) {
                continue;
            }
            $relateItems[] = $playlist_audio->audio;

        }
        $playlist = Playlist::all();
        $bookmarkedPlaylistIds = AudioPlaylist::where('audio_id', '=', $audio_id)->lists('playlist_id');

        return View::make('audios.item', [
            'audio_id' => $audio_id,
            'relateItems' => $relateItems,
            'playlists' => $playlist,
            'bookmarkedPlaylistIds' => $bookmarkedPlaylistIds,
        ]);
    }

    public function getPlaylists($audio_id)
    {
        View::make('bookmarks.playlist_popup', [

        ]);
    }
} 