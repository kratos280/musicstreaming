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
        return View::make('audios.item', [
            'audio_id' => $audio_id,
        ]);
    }
} 