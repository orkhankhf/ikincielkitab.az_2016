<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kitab Sat</title>
<?php
  include "includes/head.php";
?>
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/kitab_sat.php" />
  <meta name="keywords" content="kitab sat,kitablar,ikinci el kitab sat,ikinci əl kitab sat,kitab satisi,kitab satışı,bakıda ikinci əl kitab satışı,bakida kitab satisi,azerice kitab,azəricə kitab,rusca kitab,ingiliscə kitab,ingilisce kitab" />
  <meta name="description" content="Kitablarını burada sat!" />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="http://ikincielkitab.az/kitab_sat.php" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Kitablarını burada sat!" />
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
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <h1 class="seo_h1">ikincielkitab.az da kitab sat, kitab satmaq bakida kitab satisi, kitab almaq, ikinci el kitablar. </h1>
      <div class="heading-bar">
        <h2>Kitab Sat</h2>
        <span class="h-line"></span> </div>
      <!-- Start Main Content -->
      <section class="checkout-holder">
        <section class="span6 first">
          <!-- Start Accordian Section -->
          <div class="kitab_sat_main_div">
            <strong class="green-t">Məlumatları doldurun</strong>
                    <form onsubmit="qepik()" action="save_book.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <ul class="billing-form">
                            <li>   
                              <div class="control-group">
                                <label class="control-label" for="inputFirstname">Kitabın Adı <sup>*</sup></label>
                                <div class="controls">
                                  <input type="text" id="inputFirstname" maxlength="100" name="a" required="required">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="inputLastname">Kitabın Yazarı <sup>*</sup></label>
                                <div class="controls">
                                  <input type="text" id="inputLastname" maxlength="70" name="b" required="required">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="inputState/Province">Janr <sup>*</sup></label>
                                <div class="controls">
                                  <select name="c" size="1">
                                    <option selected value="1">Elm</option>
                                    <option value="2">Fəlsəfə</option>
                                    <option value="3">Bədii Ədəbiyyat</option>
                                    <option value="4">Tarix</option>
                                    <option value="5">Siyasi</option>
                                    <option value="6">Psixologiya</option>
                                    <option value="7">Özünü İnkişaf</option>
                                    <option value="8">Dedektiv</option>
                                    <option value="9">Texnologiya</option>
                                    <option value="10">Roman</option>
                                    <option value="11">Dini Ədəbiyyat</option>
                                    <option value="12">Uşaq Ədəbiyyatı</option>
                                    <option value="13">Programlaşdırma</option>
                                    <option value="14">Dərslik</option>
                                    <option value="15">Digər</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="inputState/Province">Dil <sup>*</sup></label>
                                <div class="controls">
                                  <select name="d" size="1">
                                    <option selected value="1">Azərbaycanca</option>
                                    <option value="2">Rusca</option>
                                    <option value="3">Türkcə</option>
                                    <option value="4">İngiliscə</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="inputState/Province">Vəziyyəti <sup>*</sup></label>
                                <div class="controls">
                                  <select name="e" size="1">
                                    <option selected value="1">Yaxşı</option>
                                    <option value="2">Orta</option>
                                    <option value="3">Pis</option>
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="inputState/Province">Şəkil <sup>*</sup></label>
                                <div class="controls">
                                  <input type="file" name="f" class="add_book_photo" onchange="book_photo_added()" required="required">
                                </div>
                              </div>
                              <script type="text/javascript">
                                function book_photo_added(){
                                 document.getElementsByClassName("add_book_photo")[0].style.color="black";
                                }
                              </script>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="book_ad_inputPrice">Qiymət <sup>*</sup></label>
                                <div class="controls">
                                  <input  type="number" name="g" id="book_ad_inputPrice" min="1" max="200" required="required"> AZN
                                  <input  type="number" name="h" id="book_ad_inputPrice2" max="99" value="00" required="required"> Qəpik
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="control-group">
                                <label class="control-label" for="book_page_selling">Səhifə Sayı <sup>*</sup></label>
                                <div class="controls">
                                  <input  type="number" name="i" max="5000" min="1" id="book_page_selling" required="required">
                                </div>
                              </div>
                            </li>
                            <li>   
                              <div class="control-group">
                                <label class="control-label" for="inputAddress">Əlaqə Telefonu və ya Facebook Profil Linki <sup>*</sup></label>
                                <div class="controls">
                                  <input type="text" name="j" id="inputAddress" placeholder="Nüm: https://www.facebook.com/bakuweb" maxlength="100" required="required">
                                </div>
                              </div>
                            </li>
                            <li>   
                              <div class="control-group">
                                <label class="control-label" for="inputCity">Şəhər <sup>*</sup></label>
                                <div class="controls">
                                  <input type="text" name="k" id="inputCity" maxlength="50" required="required">
                                </div>
                              </div>
                            </li>
                        </ul>
                        <input type="submit" class="btn btn-success">
                    </form>
                    <script type="text/javascript">
                      function qepik(){
                        var qepik = document.getElementById("book_ad_inputPrice2").value;
                        if(qepik == 0){
                          document.getElementById("book_ad_inputPrice2").value = "00";
                        }
                      }
                    </script>
          </div>
          <!-- End Accordian Section -->
        </section>
        <section class="span5 second">
          <div class="kitab_elave_et_qaydalar">
            <strong>Qaydalar</strong>
            <br><br>
            <p>1. Yüklədiyiniz şəkil satdığınız kitabın öz şəkli olmalıdır.</p>
            <p>2. Şəkil stolda, ön tərəfdən və sadəcə kitabın görünəcəyi vəziyyətdə çəkilməlidir.</p>
            <p>3. Şəklin ölçüsü 720x960-dan böyük olmamalıdır.</p>
            <p>4. Qəpik yazıldığında, ən az 10 qəpik yazılmalıdır.</p>
            <p>5. Nömrə arasında boşluq qoyulmalıdır. Məsələn: 055 581 08 72</p>
            <p>6. Bütün * ilə işarələnmiş bölmələr doldurulmalıdır.</p>
            <p>7. Elanınız ADMİNSTRATOR tərəfindən təsdiqləndikdən sonra yayımlanacaq.</p>
            <p>8. Elan ADMİNSTRATOR tərəfindən istənilən zaman silinə və redaktə oluna bilər.</p>
          </div>
        </section>
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
