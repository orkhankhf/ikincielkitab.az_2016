<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Müraciət</title>
<?php
  include "includes/head.php";
?>
</head>
<body>
<?php
//eger inputlar bos deyilse
$muraciet_info = "Xəta";
if(isset($_POST['ad']) && !empty($_POST['ad']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['movzu']) && !empty($_POST['movzu']) && isset($_POST['muraciet']) && !empty($_POST['muraciet'])){

	$ad = $_POST['ad'];
	$email_telefon = $_POST['email'];
	$movzu = $_POST['movzu'];
	$muraciet = $_POST['muraciet'];
	$ip = trim($_SERVER['REMOTE_ADDR']);
	include "db/db.php";

	$to = 'orhandwk@code.edu.az,support@ikincielkitab.az';
	$email_subject = "ikincielkitab.az'a müraciət edən:  $ad";
	$email_body = "Məlumatlar:\n\nAd: $ad\n\nIP: $ip\n\nE-mail / Telefon: $email_telefon\n\nMüraciətin məzmunu:\n$muraciet";
  $headers = "From: ikincielkitab.az\n";
	$gonderildi = mail($to,$email_subject,$email_body,$headers);

	if($gonderildi){
		$muraciet_info = "<article class='title-holder'>
        	<h4><i class='icon-ok'></i> Müraciətiniz göndərildi!</h4>
        	</article><section class='reviews-section'>
        		<figure class='elan_gonderildi_content'>
        	    	<span class='green-t'>Təşəkkürlər!</span>
        	    	<p>Müraciətiniz uğurla göndərildi. Ən qısa zamanda müraciətinizə baxılacaq.</p>
        	        <a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
        	    </figure>
        	</section>";
	}else{
		$muraciet_info = "<article class='title-holder'>
            <h4><i class='icon-remove my_error_icon'></i> Müraciətiniz göndərilmədi.</h4>
            </article><section class='reviews-section'>
            	<figure class='elan_gonderildi_content'>
                	<span class='green-t'>Bağışlayın!</span>
                	<p>Xəta baş verdi! Xahiş edirik yenidən cəhd edəsiniz.</p>
                	<a href='index.php' class='more-btn'>Ana Səhifə'yə qayıt</a>
                </figure>
            </section>";
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
            		echo $muraciet_info;
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
