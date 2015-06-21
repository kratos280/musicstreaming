<?php

class ImageGenerator extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	public function generateImage($type, $param) {
		$param = explode('-', base64_decode(str_replace('--', '/',$param)));
		if (count($param) != 5) {
			return null;
		}
		if ($type == Games::WORK) {
			$cal = strlen($param[4])+$param[1]+$param[2]+$param[3]+$param[0];
			$this->generateWorkImage($cal, $param[4]);
		} else if ($type == Games::MY_NUMBER) {
			$this->generateMyNumber($param[0], $param[1], $param[2], $param[4]);
		}
	}

	function generateMyNumber($day, $month, $year, $name) {
		$cal = $day+$month+$year[0]+$year[1]+$year[2]+$year[3];
		while (!in_array($cal, array(1,2,3,4,5,6,7,8,9,11,22))) {
			$cal = floor($cal/10)+$cal%10;
		}
		switch ($cal) {
			case 11:
				$explain = 'Giải mã bí ẩn của người mang con số 11 trong đời!
Nếu con số may mắn và hộ mệnh của bạn là Số 11, thì bạn là
một người rất quan tâm và chú ý đến các vấn đề tâm linh đó
nhé. Bạn là người có sự hiểu biết và có kiến thức hơn tất
cả những người khác, bạn rất uyên bác. Bạn đặt giá trị tâm
linh ở vị trí cao hơn tất cả trong cuộc sống của mình.';
				break;
			case 22:
				$explain = 'Giải mã ý nghĩa của con số may mắn 22 của bạn trong cuộc đời
Tìm hiểu Con số may mắn, ý nghĩa số 22 & con số may mắn của
bạn là gì?Nếu con số vận mệnh của bạn là số 22, bạn là người
vô cùng mạnh mẽ. Bạn là một trong những người khá hiếm hoi trong
cuộc sống và bạn luôn chọn những con đường khó khăn trong cuộc
đời này để đi. Bạn có thể là người cổ hủ & cố chấp trong cuộc sống!';
				break;
			case 1:
				$explain = 'Con số 1 may mắn mang ý nghĩa gì trong cuộc đời của bạn?
Tìm hiểu Con số may mắn, Ý nghĩa của số 1 & đó có phải là
con số may mắn của bạn không? Hãy cùng Bói Vui tìm hiểu nhé!
Nếu con số hộ mệnh của bạn là số Một, điều này cho thấy cuộc
sống của bạn được đặc trưng bởi chủ nghĩa cá nhân trên hết,
bạn độc lập, tiên phong và tham vọng cao. Từ khóa cho người
mang số Một là hành động, độc lập, quả cảm, dẫn đầu và chủ
nghĩa cá nhân.';
				break;
			case 2:
				$explain = 'Con số 2 may mắn mang ý nghĩa gì trong cuộc đời của bạn?
Tìm hiểu Con số may mắn, ý nghĩa của Số 1 & con số may mắn
của bạn là gì? Nếu con số hộ mệnh của bạn là số 2, điều này
cho thấy cuộc sống của bạn được đặc trưng bởi sự tương tác
hiệu quả với những người khác. Bạn sẽ có một ý thức mạnh mẽ
về sự công bằng và khả năng sâu sắc để giữ cho mọi thứ được
cân bằng với những người khác. Từ khóa cho người mang mệnh
số Hai là hợp tác, hòa bình, thân thiện và khả năng thích ứng tốt.';
				break;
			case 3:
				$explain = 'Con số 3 may mắn mang ý nghĩa gì trong cuộc đời của bạn?
Tìm hiểu Con số may mắn, ý nghĩa số 3 & con số may mắn
của bạn! Nếu con số hộ mệnh của bạn là số Ba, điều này cho
thấy cuộc sống của bạn được đặc trưng bởi sự bất diệt.
Điều này thể hiện trong tài năng nghệ thuật của bạn. Thông
thường, những người mang mệnh số Ba thường có một khả năng
trên mức trung bình trong một số loại hình nghệ thuật. Điều
này có thể bao gồm hội họa, trang trí nội thất, thủ công,
văn bản, âm nhạc, kịch hoặc tất cả các lĩnh vực trên.';
				break;
			case 4:
				$explain = 'Bạn có biết ý nghĩa của số 4 là gì không?
Tìm hiểu Con số may mắn, ý nghĩa số 4 & con số hộ mệnh của
bạn là gì nhé! Nếu con số hộ mệnh của bạn là số Bốn, điều
này cho thấy bạn là một người rất thực tế, có ý thức sâu
sắc về thực tại. Người mang mệnh số Bốn có thể được xem
như là nền tảng của xã hội, bạn có ý thức bẩm sinh về sự
cống hiến, đạo đức và sự chăm chỉ.';
				break;
			case 5:
				$explain = 'Bạn có biết ý nghĩa của số 5 là gì không?
Nếu con số hộ mệnh của bạn là số Bốn, điều này cho thấy
bạn là một người lãng mạn, thích phiêu lưu và có cá tính.
Người mang mệnh số Năm là những người có tính cách hòa
đồng, nhẹ nhàng và vui vẻ, thường đơn giản hóa mọi chuyện
hơn là nghiêm trọng hóa nó lên.Những người mang mệnh số
Năm thường không quá lo lắng về ngày mai sẽ như thế nào,
nói chung là con người vô tư lự.Tuy nhiên, một trong số
họ vẫn dành thời gian tìm kiếm câu trả lời cho câu hỏi
về cuộc sống.';
				break;
			case 6:
				$explain = 'Số 6 có ý nghĩa gì với bạn?
Tìm hiểu Con số may mắn, ý nghĩa số 7 và con số may mắn
vận mệnh của bạn! Nếu con số hộ mệnh của bạn là số Sáu,
điều này cho thấy bạn là một người có ý thức trách nhiệm
rất cao. Con đường sự nghiệp của những người mang mệnh số
Sáu đều liên quan đến việc lãnh đạo. Là người có trách
nhiệm, bạn sẽ luôn có mặt để giúp đỡ người khác trong bất
kỳ hoàn cảnh nào. Điều này khiến bạn cảm thấy mình thực
sự hữu ích và hạnh phúc.';
				break;
			case 7:
				$explain = 'Bạn có biết ý nghĩa số 7 nói lên điều gì không?
Tìm hiểu Con số may mắn, ý nghĩa số 7 trong cuộc đời và
 con số may mắn của bạn nhé! Nếu con số hộ mệnh của bạn
 là số Sáu, điều này cho thấy bạn là một người có chiều
 sâu tư duy và khả năng tiếp thu kiến thức rất tốt. Những
 người mang con số hộ mệnh là số Bảy thường thiêng về tâm
 linh và có trực giác nhạy bén.';
				break;
			case 8:
				$explain = 'Bạn có biết ý nghĩa số 8 nói lên điều gì không?
Tìm hiểu Con số may mắn, ý nghĩa số 8 và con số may mắn
của bạn! Nếu con số may mắn trong cuộc đời của bạn là Số 8,
thì nó sẽ đại diện cho việc theo đuổi tiền bạc và sự nghiệp
của bạn đó. Những người có con số hộ mệnh là Số 8 là những
người mạnh mẽ nhất, tự tin và thành công về vật chất. Họ đa
số là những người giàu có trong đời. Trong tử vi phương đông
cũng vậy, số 8 đại diện cho sự phát đạt và vượng quý!';
				break;
			case 9:
				$explain = 'Ý nghĩa của số 9 mang lại điều gì cho bạn?
Tìm hiểu Con số may mắn, ý nghĩa số 9 & con số may mắn của
bạn! Nếu con số may mắn và vận mệnh của bạn là số 9, thì đó
là điều vô cùng tuyệt vời dành cho bạn. Số 9 mang đến ý nghĩa
đó là bạn có khả năng để giữ một vị trí cao trong bất cứ công
việc nào mà bạn tham gia. Bạn là người vô cùng từ bi và từ bỏ
của cải vật chất để hướng đến những gì đỉnh cao trong cuộc sống..
giống như kiểu bạn là một người giống chúa vậy!';
				break;
		}

		//Set the Content Type
		header('Content-type: image/jpeg');

		// Create Image From Existing File
		//yum install php55-gd
		$jpg_image = $this->imageCreateFromAny('img/mynumber-khung.jpg');

		// Allocate A Color For The Text
		$black = imagecolorallocate($jpg_image, 0, 0, 0);
		$red = imagecolorallocate($jpg_image, 201, 35, 35);
		$blue = imagecolorallocate($jpg_image, 35, 57, 201);

		// Set Path to Font File
		$font_path = 'fonts/UVNThuTu.TTF';

		// Print Text On Image
		imagettftext($jpg_image, 30, 0, 270, 50, $black, $font_path, 'Bạn:  ');
		imagettftext($jpg_image, 30, 0, 360, 50, $blue, $font_path, $name);
		imagettftext($jpg_image, 30, 0, 270, 100, $red, $font_path, 'Con Số May Mắn: Số '.$cal);
		imagettftext($jpg_image, 18, 0, 220, 130, $blue, $font_path, $explain);

		// Send Image to Browser
		imagejpeg($jpg_image);

		// Clear Memory
		imagedestroy($jpg_image);
		exit();
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
