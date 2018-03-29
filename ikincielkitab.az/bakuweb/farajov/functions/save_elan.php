<?php
	if(isset($_POST['id']) && is_numeric($_POST['id']) && !empty($_POST['id'])){
		include "../../../db/db.php";
		$id = $_POST['id'];
		$ad = $_POST['ad'];
		$yazar = $_POST['yazar'];
		$aciqlama = $_POST['aciqlama'];
		$tel_fb_link = $_POST['tel_fb_link'];
		$seher = $_POST['seher'];
		$foto = $_POST['foto'];

		//PHP filterleri
		$ad = trim($ad);
		$yazar = trim($yazar);
		$aciqlama = trim($aciqlama);
		$tel_fb_link = trim($tel_fb_link);
		$seher = trim($seher);

		$ad = filter_var($ad, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$yazar = filter_var($yazar, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$aciqlama = filter_var($aciqlama, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$seher = filter_var($seher, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

		if($conn){
			//axtaris sistemi ucun ad ve yazar birlesdirilir
			$axtaris = $ad."-".$yazar;
			function replace_az($text){
				$text = trim($text);
				$search = array('Ç','ç','Ğ','ğ','ı','I','İ','Ö','ö','Ş','ş','Ü','ü','Ə','ə',' ');
				$replace = array('c','c','g','g','i','i','i','o','o','s','s','u','u','e','e','-');
				$new_text = str_replace($search,$replace,$text);
				$new_text = preg_replace('/-+/', '-', $new_text);
				return $new_text;
			}
			$axtaris = replace_az($axtaris);

			$update = "UPDATE kitablar SET ad='$ad',yazar='$yazar',aciqlama='$aciqlama',tel_fb_link='$tel_fb_link',seher='$seher',aktiv='1',axtaris='$axtaris',tarix= CURDATE() WHERE id='$id'";
			$netice = mysqli_query($conn,$update);
			//Set the Content Type
			header('Content-type: image/jpeg');

			// Create Image From Existing File
			$jpg_image = imagecreatefromjpeg('../'.$foto);

			// Allocate A Color For The Text
			$white = imagecolorallocatealpha($jpg_image, 126, 166, 29,20);
			$font = "../../../font/sekile_sayt_adini_yazmaq_ucun.ttf";
			$img_size = getimagesize('../'.$foto);
			imagettftext($jpg_image, 20, 0, 20, round($img_size[1])-round($img_size[1] / 17), $white, $font, "i k i n c i e l k i t a b . a z");
													  
			//Send Image to Browser
			imagejpeg($jpg_image,'../'.$foto, 100);

			//Clear Memory
			imagedestroy($jpg_image);
			if($netice){
				echo "ok";
			}
		}else{
			echo "Bağlantı qurulmadı";
		}
	}else{
		echo "ID adresi düzgün deyil";
	}
	if(isset($conn)){
	    mysqli_close($conn);
	}
?>