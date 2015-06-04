<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 0:14
 */
class AudioPlaylist extends BaseModel
{

    protected $table = 'audio_playlists';
    protected $primaryKey = 'audio_playlist_id';
    protected $fillable = ['*'];

    public function audio()
    {
        return $this->belongsTo('Audio', "audio_id", "audio_id");
    }

    public function playlist()
    {
        return $this->belongsTo('Playlist', "playlist_id", "playlist_id");
    }

}