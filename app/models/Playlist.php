<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 0:14
 */
class Playlist extends BaseModel
{

    use SoftDeletingTrait;

    protected $table = 'playlists';
    protected $primaryKey = 'playlist_id';
    protected $fillable = ['*'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User', "user_id", "user_id");
    }

}