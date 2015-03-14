<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 12:19
 */
class AccountController extends BaseController
{

    public function getIndex()
    {
        $user = Auth::user();
        if( empty($user) ) {
            App::abort(404);
        }

        $playlists = new \Illuminate\Database\Eloquent\Collection();
        $playlists = Playlist::with('user')->where('user_id', '=', $user->user_id)->get();

        return View::make('account.index', [
            'user' => $user,
            'playlist' => $playlists
        ]);
    }
}