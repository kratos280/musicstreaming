<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface {

	use UserTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public    $incrementing = false;
    protected $fillable = ['*'];

    public function playlists()
    {
        return $this->hasMany('Playlist', 'user_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('Comment', 'user_id', 'user_id');
    }

}
