<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookThrottleException;
use Facebook\FacebookServerException;
use Facebook\FacebookClientException;
use Facebook\FacebookPermissionException;
use Facebook\FacebookOtherException;
use Facebook\FacebookSDKException;

class AuthController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('auth.login', ['app_id' => Config::get('app.facebook.app_id')]);
	}

    public function connect() {
        session_start();

        FacebookSession::setDefaultApplication(Config::get('app.facebook.app_id'), Config::get('app.facebook.app_secret'));
        $login_helper = new FacebookRedirectLoginHelper(url('/auth/connect'));

        if( !Input::get('code') ) {
            return Redirect::to($login_helper->getLoginUrl(array('public_profile')));
        }

        try {
            $session = $login_helper->getSessionFromRedirect();
            if( !$session ) {
                return Redirect::to($login_helper->getLoginUrl(array('public_profile')));
            }
            //logged in
            $fb_user_id = $session->getSessionInfo()->asArray()['user_id'];
            $user = User::find($fb_user_id);

            if (!$user) {
                $user = new User();
                $user->user_id = $fb_user_id;
            }
            $me = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject()->asArray();
            $user->fb_access_token = $session->getToken();
            $user->username = $me['name'];
            $user->profile_image = "http://graph.facebook.com/".$user->user_id."/picture?width=70&height=70";
            $user->save();

            Auth::login($user);
        } catch(Exception $e) {
            dd($e);
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
