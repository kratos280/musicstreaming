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

        return View::make('audios.item', [
            'audio_id' => $audio_id,
            'relateItems' => $relateItems
        ]);
    }
} 