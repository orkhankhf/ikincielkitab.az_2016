<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Elanın Nəticəsi</title>
<?php
  include "includes/head.php";
?>
</head>
<body>
<?php
//eger inputlar bos deyilse
$elan_info = "Xəta";
if(isset($_POST['a']) && !empty($_POST['a']) && isset($_POST['b']) && !empty($_POST['b']) && isset($_POST['c']) && !empty($_POST['c']) && isset($_POST['d']) && !empty($_POST['d']) && isset($_POST['e']) && !empty($_POST['e']) && isset($_FILES['f']) && !empty($_FILES['f']) && isset($_POST['g']) && !empty($_POST['g']) && isset($_POST['h']) && !empty($_POST['h']) && isset($_POST['i']) && !empty($_POST['i']) && isset($_POST['j']) && !empty($_POST['j']) && isset($_POST['k']) && !empty($_POST['k'])){

	include "db/db.php";

	//PHP filterleri
	$ad = trim($_POST['a']);
	$yazar = trim($_POST['b']);
	$janr = trim($_POST['c']);
	$dil = trim($_POST['d']);
	$veziyyeti = trim($_POST['e']);
	$qiymet_AZN = trim($_POST['g']);
	$qiymet_qepik = trim($_POST['h']);
	$sehife_sayi = trim($_POST['i']);
	$tel_fb_link = trim($_POST['j']);
	$seher = trim($_POST['k']);
	$ip = trim($_SERVER['REMOTE_ADDR']);

	$ad = filter_var($ad, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$yazar = filter_var($yazar, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$janr = filter_var($janr, FILTER_VALIDATE_INT);
	$dil = filter_var($dil, FILTER_VALIDATE_INT);
	$veziyyeti = filter_var($veziyyeti, FILTER_VALIDATE_INT);
	$qiymet_AZN = filter_var($qiymet_AZN, FILTER_VALIDATE_INT);
	$qiymet_qepik = filter_var($qiymet_qepik, FILTER_VALIDATE_INT);
	$sehife_sayi = filter_var($sehife_sayi, FILTER_VALIDATE_INT);
	$seher = filter_var($seher, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	$ip = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

	//eger qepik deyeri 00 deyilse, o zaman reqem olub olmadigini ve tek reqem olub olmadigini yoxlayir eger tek reqemdirse yeni 1,4,6 o zaman onune 0 artirib 01,04,06 edir.
	if($qiymet_qepik != 00){
		if(!filter_var($qiymet_qepik, FILTER_VALIDATE_INT) === false){
			if(strlen($qiymet_qepik) == 1){
				if($qiymet_qepik >= 1 && $qiymet_qepik <= 9){
					$qiymet_qepik = "0".$qiymet_qepik;
				}
			}
		}
	}else{
		//eger reqem 00-dirsa o zaman ele 00 olaraq qalir.
		$qiymet_qepik = "00";
	}
	//deyisenler filter olunur
	if(!filter_var($ad, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW) === false && !filter_var($yazar, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW) === false && !filter_var($janr, FILTER_VALIDATE_INT) === false && !filter_var($dil, FILTER_VALIDATE_INT) === false && !filter_var($veziyyeti, FILTER_VALIDATE_INT) === false && !filter_var($qiymet_AZN, FILTER_VALIDATE_INT) === false && !filter_var($sehife_sayi, FILTER_VALIDATE_INT) === false && !filter_var($seher, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW) === false && !filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false){

		//2 azn ve 30 qepik birlesdirilerek bele bir cixdi alinir 2.30 
		$qiymet = $qiymet_AZN.".".$qiymet_qepik;
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

		//kitabin sekli upload edilir
		$target_dir = "book_images/";
		$random_name = rand(1111111111,9999999999);
		$target_file = $target_dir . basename($_FILES["f"]["name"]);
		$if_isset_foto = $target_dir.$random_name.".jpg";
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if(isset($_FILES["f"])){
			if (file_exists($if_isset_foto)) {
			    $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-remove my_error_icon'></i> Elanınız göndərilmədi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Bağışlayın!</span>
                    	<p>Xəta baş verdi! Xahiş edirik təkrar cəhd edin.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			    $uploadOk = 0;
			}
			if ($_FILES["f"]["size"] > 500000) {
			    $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-remove my_error_icon'></i> Elanınız göndərilmədi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Bağışlayın!</span>
                    	<p>Yükləmək istədiyiniz şəklin həcmi çox böyükdür.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-remove my_error_icon'></i> Elanınız göndərilmədi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Bağışlayın!</span>
                    	<p>Sadəcə JPG və JPEG formatında şəkil yükləyə bilərsiniz.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			    $uploadOk = 0;
			}
			if ($uploadOk == 0) {
			    $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-remove my_error_icon'></i> Elanınız göndərilmədi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Bağışlayın!</span>
                    	<p>Xəta baş verdi! Xahiş edirik bizimlə əlaqə saxlayın.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			} else {
				$target_file = $target_dir.$random_name.".jpg";
			    if (move_uploaded_file($_FILES["f"]["tmp_name"], $target_file)) {
			    	
			    	//DB-ya insert edilir
					$insert = "INSERT INTO kitablar (ad,yazar,janr,dil,veziyyet,foto,qiymet,sehife_sayi,tel_fb_link,seher,ip,axtaris) VALUES ('$ad','$yazar','$janr','$dil','$veziyyeti','$random_name','$qiymet','$sehife_sayi','$tel_fb_link','$seher','$ip','$axtaris')";
					$netice = mysqli_query($conn,$insert);
			        $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-ok'></i> Sizin elanınız göndərildi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Təşəkkürlər!</span>
                    	<p>Elanınız ADMİNSTRATOR tərəfindən yoxlanıldıqdan sonra yayımlanacaq.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			    } else {
			        $elan_info = "<article class='title-holder'>
                   <h4><i class='icon-remove my_error_icon'></i> Elanınız göndərilmədi.</h4>
                </article><section class='reviews-section'>
                	<figure class='elan_gonderildi_content'>
                     <span class='green-t'>Bağışlayın!</span>
                    	<p>Xəta baş verdi! Xahiş edirik bizimlə əlaqə saxlayın.</p>
                        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                    </figure>
                </section>";
			    }
			}
		}else{
			echo "Şəkil seçilməyib!";
		}
	}
}
?>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <!-- Start Main Content -->
        <section class="span12">
            <!-- Strat Book Detail Section -->
            <section class="b-detail-holder">
            	<?php
            		echo $elan_info;
            	?>
            <!-- End order recieved Section -->
            </section>
            <!-- Strat Book Detail Section -->
        </section>
        <!-- End Main Content -->
       
    </section>
  </section>
  <!-- End Main Content Holder -->
  <?php
    include "includes/footer.php";
  ?>
</div>
<!-- End Main Wrapper -->

<!-- JS Files Start -->
<script type="text/javascript" src="js/lib.js"></script><!-- lib Js -->
<script type="text/javascript" src="js/modernizr.js"></script><!-- Modernizr -->
<script type="text/javascript" src="js/easing.js"></script><!-- Easing js -->
<script type="text/javascript" src="js/bs.js"></script><!-- Bootstrap -->
<script type="text/javascript" src="js/bxslider.js"></script><!-- BX Slider -->
<script type="text/javascript" src="js/input-clear.js"></script><!-- Input Clear -->
<script src="js/range-slider.js"></script><!-- Range Slider -->
<script src="js/jquery.zoom.js"></script><!-- Zoom Effect -->
<script type="text/javascript" src="js/bookblock.js"></script><!-- Flip Slider -->
<script type="text/javascript" src="js/custom.js"></script><!-- Custom js -->
<script type="text/javascript" src="js/social.js"></script><!-- Social Icons -->
<!-- JS Files End -->
<noscript>
	<style>
	#socialicons>a span { top: 0px; left: -100%; -webkit-transition: all 0.3s ease; -moz-transition: all 0.3s ease-in-out; -o-transition: all 0.3s ease-in-out; -ms-transition: all 0.3s ease-in-out; transition: all 0.3s 	ease-in-out;}
	#socialicons>ahover div{left: 0px;}
	</style>
</noscript>
<script type="text/javascript">
  /* <![CDATA[ */
  $(document).ready(function() {
  $('.social_active').hoverdir( {} );
})
/* ]]> */
</script>
<?php
  if(isset($conn)){
    mysqli_close($conn);
  }
?>
</body>
</html>
