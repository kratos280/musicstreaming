<?php

class PlaylistController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if( Auth::check() ) {
            App::abort(404);
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if( Auth::check() ) {
            App::abort(404);
        }
        return View::make('playlists.create', [

        ]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user = Auth::user();
        if( empty($user) ) {
            App::abort(404);
        }

        $input = Input::all();
        // TODO check validate

        $playlist = new Playlist();
        $playlist->user_id = $user->user_id;
        $playlist->name = $input['name'];
        $playlist->description = $input['description'];
        $playlist->save();

        return Redirect::to('playlists');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
