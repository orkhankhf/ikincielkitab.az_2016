<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bizimlə Əlaqə</title>
<?php
  include "includes/head.php";
?>
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/elaqe.php" />
  <meta name="keywords" content="ikincielkitab.az elaqe,kitab satisi,kitab satışı,bakıda kitab satışı,bakida kitab satisi,ikincielkitab.az müraciət" />
  <meta name="description" content="Bizimlə Əlaqə." />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="http://ikincielkitab.az/elaqe.php" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Ikincielkitab.az Əlaqə Formu" />
  <meta property="og:description" content="Sizdə kitablarınızı ikincielkitab.az'da sata bilərsiniz!" />
  <meta property="og:image" content="http://ikincielkitab.az/images/og_image.jpg" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="fb:app_id" content="311677012534364" />
  <meta property="fb:admins" content="OrxanDWK" />
  <meta property="og:site_name" content="ikincielkitab" />
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '311677012534364',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="facebook_pop_up" onclick="close_fb_pop_up()"></div>
<span class="remove_facebook_pop_up" onclick="close_fb_pop_up()">Bağla</span>
<div class="fb-page" data-href="https://www.facebook.com/ikincielkitab.az"  data-width="300" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ikincielkitab.az"><a href="https://www.facebook.com/ikincielkitab.az">ikincielkitab.az</a></blockquote></div></div>
<script type="text/javascript">
  function new_margin_left_value(){
    var w = window.innerWidth;
    if(w>300){
      var margin_left = w-300;
      margin_left = margin_left / 2;
      document.getElementsByClassName('fb-page')[0].style.marginLeft = margin_left+"px";
      document.getElementsByClassName('remove_facebook_pop_up')[0].style.marginLeft = margin_left+"px";
    }else{
      document.getElementsByClassName('fb-page')[0].style.marginLeft = "0px";
    }
  }
  new_margin_left_value();
  window.onresize = function(event) {
    return new_margin_left_value();
  };
  function close_fb_pop_up(){
    document.getElementsByClassName('facebook_pop_up')[0].style.display = "none";
    document.getElementsByClassName('fb-page')[0].style.display = "none";
    document.getElementsByClassName('remove_facebook_pop_up')[0].style.display = "none";
  }
  window.onkeydown = function( event ) {
    if ( event.keyCode == 27 ) {
        return close_fb_pop_up();
    }
  };
</script>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <script type="text/javascript">
    document.querySelector(".top-nav li:nth-child(3) a").className="active";
  </script>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <h1 class="seo_h1">İkinci əl kitabların satışı.Ikinci el kitablarin satisi. Kitab sat, kitab al və ya onlayn kitab almaq kitablar.muxtelif janrlarda kitablar</h1>
      <div class="heading-bar">
        <h2>Bizimlə Əlaqə</h2>
        <span class="h-line"></span> </div>
      <!-- Start Main Content -->
      <section class="span12 first">
        
        <div class="span6 c-form-holder first">
        	<!-- Start Contact form Section -->
        <form class="form-horizontal" method="post" action="mail.php">
          <div class="control-group">
            <label class="control-label" for="inputEmail">Ad <sup>*</sup></label>
            <div class="controls">
              <input type="text" id="inputEmail" name="ad">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Email və ya telefon <sup>*</sup></label>
            <div class="controls">
              <input type="text" id="inputPassword" name="email">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Mövzu <sup>*</sup></label>
            <div class="controls">
              <input type="text" id="inputPassword" name="movzu">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Müraciət <sup>*</sup></label>
            <div class="controls">
              <textarea name="muraciet" cols="2" rows="20"></textarea>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="more-btn2">Göndər</button>
            </div>
          </div>
        </form>
        <!-- End Contact form Section -->
        </div>
        <div class="span6">
        	<strong>Əlaqə Məlumatları</strong>
            <p>Mobil: 055 581 08 72 <br/>Email: support@ikincielkitab.az <br />Web: <a href="http://ikincielkitab.az">ikincielkitab.az</a></p>
        </div>
        
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
