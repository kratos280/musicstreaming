<?php

class BoiVui extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('BoiVui.index');
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

	public function userInfoForm() {
		return View::make('BoiVui.user_info_form');
	}

	public function submit() {
		$param = str_replace(' ','-', trim(Input::get('name'))).'-'.Input::get('day').'-'.Input::get('month').'-'.Input::get('year').'-'.Input::get('sex');
		return Redirect::to('ketqua/'.$param);
	}

	public function imageGenerator() {
		//yum install php55-gd
		$img = @$this->imageCreateFromAny('http://luyengame.vn/img/'.Input::get('param').'.png');

		imagetruecolortopalette($img,false, 255);
		$index = imagecolorclosest ( $img,  0,0,0 ); // GET BLACK COLOR
		imagecolorset($img,$index,0,150,255); // SET COLOR TO BLUE

		Header( "Content-Type: image/jpeg");
		imagejpeg($img);
		exit();
	}

	function imageCreateFromAny($filepath) {
		$type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
		$allowedTypes = array(
			1,  // [] gif
			2,  // [] jpg
			3,  // [] png
			6   // [] bmp
		);
		if (!in_array($type, $allowedTypes)) {
			return false;
		}
		switch ($type) {
			case 1 :
				$im = imageCreateFromGif($filepath);
				break;
			case 2 :
				$im = imageCreateFromJpeg($filepath);
				break;
			case 3 :
				$im = imageCreateFromPng($filepath);
				break;
			case 6 :
				$im = imageCreateFromBmp($filepath);
				break;
		}
		return $im;
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
