<?php

class ImageGenerator extends \BaseController {

	const WORK = "congviec";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	public function generateImage($path, $param, $name) {
		if ($path == self::WORK) {
			$this->generateWorkImage($param, $name);
		}
	}

	function generateWorkImage($param, $name) {
		$random = $param % 10;
		if ($random <= 3) {
			$image_name = 'khung1.jpg';
		} else if ($random <= 6) {
			$image_name = 'khung2.jpg';
		} else {
			$image_name = 'khung3.jpg';
		}

		switch ($random) {
			case 0:
				$nghe1 = 'Tỉ Phú';
				$nghe2 = 'Buôn Ve Chai';
				break;
			case 1:
				$nghe1 = 'Tỉ Phú';
				$nghe2 = 'Chăn Gà';
				break;
			case 2:
				$nghe1 = 'Tỉ Phú';
				$nghe2 = 'Trồng Lúa';
				break;
			case 3:
				$nghe1 = 'Đại Gia';
				$nghe2 = 'Xiên Thịt Lợn';
				break;
			case 4:
				$nghe1 = 'Đại Gia';
				$nghe2 = 'Buôn Ve Chai';
				break;
			case 5:
				$nghe1 = 'Đại Gia';
				$nghe2 = 'Bán Vé Số';
				break;
			case 6:
				$nghe1 = 'Đại Ca';
				$nghe2 = 'Xã Hội Đen';
				break;
			case 7:
				$nghe1 = 'Tiểu Nhị';
				$nghe2 = 'Bán Trà Đá';
				break;
			case 8:
				$nghe1 = 'Ca Sĩ';
				$nghe2 = 'Hát Rong';
				break;
			case 9:
				$nghe1 = 'Ngôi Sao';
				$nghe2 = 'Múa Thoát Y';
				break;
		}

		//Set the Content Type
		header('Content-type: image/jpeg');

		// Create Image From Existing File
		$jpg_image = $this->imageCreateFromAny('img/'.$image_name);

		// Allocate A Color For The Text
		$black = imagecolorallocate($jpg_image, 0, 0, 0);
		$red = imagecolorallocate($jpg_image, 201, 35, 35);
		$blue = imagecolorallocate($jpg_image, 35, 57, 201);

		// Set Path to Font File
		$font_path = 'fonts/UVNThuTu.TTF';

		// Print Text On Image
		imagettftext($jpg_image, 30, 0, 60, 100, $black, $font_path, 'Bạn ');
		imagettftext($jpg_image, 30, 0, 130, 100, $blue, $font_path, $name);
		imagettftext($jpg_image, 30, 0, 90, 150, $black, $font_path, 'Sẽ trở thành ');
		imagettftext($jpg_image, 30, 0, 280, 150, $red, $font_path, $nghe1);
		imagettftext($jpg_image, 30, 0, 90, 200, $black, $font_path, 'Nghề ');
		imagettftext($jpg_image, 30, 0, 200, 200, $red, $font_path, $nghe2);

		// Send Image to Browser
		imagejpeg($jpg_image);

		// Clear Memory
		imagedestroy($jpg_image);
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
}
