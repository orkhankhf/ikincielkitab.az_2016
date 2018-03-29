<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ana Səhifə</title>
<?php
  include "includes/head.php";
?>
  <meta name="propeller" content="775edaed40b02a30420858517dcc7f17" />
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/index.php" />
  <meta name="keywords" content="kitab,kitablar,ikinci el kitab,ikinci əl kitab,kitab satisi,kitab satışı,bakıda kitab satışı,bakida kitab satisi,azerice kitab,azəricə kitab,rusca kitab,ingiliscə kitab,ingilisce kitab" />
  <meta name="description" content="İkinci Əl Kitabların Alışı Və Satışı." />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="http://ikincielkitab.az/index.php" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="İkinci Əl Kitabların Alışı Və Satışı" />
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
<!-- <script>
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
</script> -->
<!-- <div class="facebook_pop_up" onclick="close_fb_pop_up()"></div>
<span class="remove_facebook_pop_up" onclick="close_fb_pop_up()">Bağla</span>
<div class="fb-page" data-href="https://www.facebook.com/ikincielkitab.az"  data-width="300" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ikincielkitab.az"><a href="https://www.facebook.com/ikincielkitab.az">ikincielkitab.az</a></blockquote></div></div> -->
<!-- <script type="text/javascript">
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
</script> -->
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <script type="text/javascript">
    document.querySelector(".top-nav li:nth-child(1) a").className="active";
    function pop(url) {
        n=window.open(url,'_blank');
        if(n==null) {
            return true;
        }
        return false;
    }
    pop('https://go.ad2upapp.com/afu.php?id=898054','100%','100%');
  </script>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <h1 class="seo_h1">ikincielkitab.az ana səhifə, kitab satışı, kitab al, ikinci el kitab satisi, ikinci əl kitab satışı, bakıda kitab satışı, bakida kitab satisi, onlayn kitab satışı, kitab,kitab,book </h1>
      <section class="span12 slider">
        <section class="main-slider">
          <div class="bb-custom-wrapper">
            <div id="bb-bookblock" class="bb-bookblock">
            <?php
              $left_right = false;
              if(!isset($conn)){
                include "db/db.php";
              }
              if($conn){
                $select = "SELECT id,ad,yazar,foto,qiymet,aciqlama FROM kitablar WHERE slider='1' AND aktiv='1'";
                $netice = mysqli_query($conn,$select);

                while($row = mysqli_fetch_assoc($netice)){
                if($left_right == false){
                  echo "<div class='bb-item'>
                        <div class='bb-custom-content'>
                          <div class='slide-inner'>
                            <div class='span4 book-holder slider-book-right'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' /></a>
                              <div class='cart-price'><span class='price'>".$row['qiymet']." AZN</span> </div>
                            </div>
                            <div class='span8 book-detail'>
                              <h2>".$row['ad']."</h2>
                              <strong class='title'>".$row['yazar']."</strong><a href='book.php?id=".$row['id']."' class='shop-btn'>KİTABA BAX</a>
                              <div class='cart-price price_xs'><span class='price'>".$row['qiymet']." AZN</span> </div>
                              <div class='cap-holder'>
                                <p class='slider_book_right_desctription'>".$row['aciqlama']."</p>
                                <a href='book.php?id=".$row['id']."'>Davamı...</a> </div>
                            </div>
                          </div>
                        </div>
                      </div>";
                    $left_right = true;
                }else{
                  echo "<div class='bb-item'>
                        <div class='bb-custom-content'>
                          <div class='slide-inner'>
                            <div class='span8 book-detail'>
                              <h2>".$row['ad']."</h2>
                              <strong class='title'>".$row['yazar']."</strong><a href='book.php?id=".$row['id']."' class='shop-btn'>KİTABA BAX</a>
                              <div class='cart-price price_xs'><span class='price'>".$row['qiymet']." AZN</span> </div>
                              <div class='cap-holder'>
                                <p class='slider_book_left_desctription'>".$row['aciqlama']."</p>
                                <a href='book.php?id=".$row['id']."'>Davamı...</a> </div>
                            </div>
                            <div class='span4 book-holder slider-book-left'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg'/></a>
                              <div class='cart-price'><span class='price'>".$row['qiymet']." AZN</span> </div>
                            </div>
                          </div>
                        </div>
                      </div>";
                  $left_right = false;
                }
                }
              }
            ?>
            </div>
          </div>
          <nav class="bb-custom-nav"> <a href="#" id="bb-nav-prev" class="left-arrow">Previous</a> <a href="#" id="bb-nav-next" class="right-arrow">Next</a> </nav>
        </section>
        <span class="slider-bottom"><img src="images/slider-bg.png" alt="Shadow"/></span> </section>
      <section class="span12 wellcome-msg m-bottom first">
        <h1>İkinci əl kitab satışı saytına xoş gəlmisiniz.</h1>
        <p>Uyğun qiymətlərlə müxtəlif janrlardakı maraqlı kitablara sahib ola bilərsiniz!</p>
      </section>
    </section>
    <section class="row-fluid ">
      <?php
        $select = "SELECT id,ad,foto,qiymet,aciqlama FROM kitablar WHERE aktiv='1' ORDER BY RAND() LIMIT 3";
        $netice = mysqli_query($conn,$select);

        while($row = mysqli_fetch_assoc($netice)){
          echo "<figure class='span4 s-product my_s_procduct'>
                  <div class='s-product-img'><a href='book.php?id=".$row['id']."'><img class='my_s_product_foto' src='book_images/".$row['foto'].".jpg' /></a></div>
                  <article class='s-product-det my_s_procduct_det'>
                    <h3 class='my_s_product_basliq'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></h3>
                    <p class='my_s_product_aciqlama'>".$row['aciqlama']."</p>
                    <div class='cart-price'> <a href='book.php?id=".$row['id']."' class='cart-btn2'></a> <span class='price'>".$row['qiymet']." AZN</span> </div>
                  </article>
                </figure>";
        }
      ?>
    </section>
    <!-- Start BX Slider holder -->
    <section class="row-fluid features-books">
      <section class="span12 m-bottom">
        <div class="heading-bar">
          <h2>Son əlavə olunanlar</h2>
          <span class="h-line"></span> </div>
        <div class="slider1 son_elave_olunanlar_slider">
          <?php
            $select = "SELECT id,ad,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY id DESC LIMIT 18";
            $netice = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($netice)){
              echo "<div class='slide kitab_sliderleri_ana_sehife'>
                      <a href='book.php?id=".$row['id']."'>
                        <img src='book_images/".$row['foto'].".jpg' class='pro-img'/>
                      </a>
                      <h2 class='title'>
                        <a href='book.php?id=".$row['id']."'>".$row['ad']."</a>
                      </h2>
                      <div class='cart-price'>
                        <a class='cart-btn2' href='book.php?id=".$row['id']."'></a>
                        <span class='price'>".$row['qiymet']." AZN</span>
                      </div>
                    </div>";
            }
          ?>
        </div>
      </section>
    </section>
    <!-- End BX Slider holder -->
    <!-- Start Featured Author -->
    <section class="row-fluid m-bottom">
      <section class="span9">
        <div class="ayin_yazari_header"> <span class="title">Təklif Edilən Yazıçı Və Əsərləri</span></div>
        <div class="featured-author">
          <div class="left"> <span class="author-img-holder"><img src="ayin_yazari/yazar.jpg" alt="Ayın Yazıçısı" class="ayin_yazicisi_img" /></span>
            <div class="author-det-box">
              <div class="author-det weekly_author"><span class="title2">Paulo Coelho</span>
                <ul class="books-list">
                  <li><img src="ayin_yazari/1.jpg" width="60" alt="Yazıçının Kitabları"/></li>
                  <li><img src="ayin_yazari/2.jpg" width="60" alt="Yazıçının Kitabları"/></li>
                  <li><img src="ayin_yazari/3.jpg" width="60" alt="Yazıçının Kitabları"/></li>
                  <li><img src="ayin_yazari/4.jpg" width="60" alt="Yazıçının Kitabları"/></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="right heftenin_kitabi_right">
            <div class="current-book my_current_book"> <strong class="title">Kimyagər</strong>
              <div class="c-b-img"><img src="ayin_yazari/kimyager.jpg" alt="Yazıçının Kitabları" /></div>
              <p class="teklif_edilen_p">Əsərdə, Şərq fəlsəfi fikrində qırmızı xətlə keçən “vəhdəti-vücud” dünyagörüşünün bədii təcəssümü kimi, insanın təbiətin bir parçası olduğu canlı boyalarla işlənilib. Heç nəyin təsadüf olmaması, hər hadisənin, sözün, uğur və uğursuzluğun bir əlamət olması romanın qayəsini təşkil edir. İnsan bu əlamətləri anlayarsa və öz yolunu davam etdirərsə kainatın ona məqsədinə çatmaqda yardım etməsi əminliyi İslam fəlsəfəsinin “nə baş verirsə, insanın xeyrinədir” tezisi ilə üst-üstə düşür.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="span3 best-sellers">
        <div class="heading-bar">
          <h2>Son Baxılanlar</h2>
          <span class="h-line"></span> </div>
        <div class="slider2">
          <?php
            $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY son_baxilma DESC LIMIT 5";
            $netice = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($netice)){
              echo "<div class='slide green_slider_right_index'><a href='book.php?id=".$row['id']."'><img class='my_book_wrapper' src='book_images/".$row['foto'].".jpg'/></a>
                      <div class='slide2-caption'>
                        <div class='left'> <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span> <span class='author-name'>".$row['yazar']."</span> </div>
                        <div class='right'> <span class='price'>".$row['qiymet']." AZN</span></div>
                      </div>
                    </div>";
            }
          ?>
        </div>
      </section>
    </section>
    <!-- End Featured Author -->
    <section class="row-fluid m-bottom">
      <section class="span12 m-bottom">
        <div class="heading-bar">
          <h2>Bədii Ədəbiyyat Kitabları</h2>
          <span class="h-line"></span> </div>
        <div class="slider1">
          <?php
            $select = "SELECT id,ad,foto,qiymet FROM kitablar WHERE janr = 3 AND aktiv='1' ORDER BY RAND() LIMIT 18";
            $netice = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($netice)){
              echo "<div class='slide kitab_sliderleri_ana_sehife'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img'/></a> <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span>
                  <div class='cart-price'> <a class='cart-btn2' href='book.php?id=".$row['id']."'></a> <span class='price'>".$row['qiymet']." AZN</span> </div>
                  </div>";
            }
          ?>

        </div>
      </section>
      <section class="span12 m-bottom">
        <div class="heading-bar">
          <h2>Müxtəlif Janrlarda Kitablar</h2>
          <span class="h-line"></span> </div>
        <div class="slider1">
          <?php
            $select = "SELECT id,ad,foto,qiymet FROM kitablar WHERE dil = 1 AND aktiv='1' ORDER BY RAND() LIMIT 18";
            $netice = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($netice)){
              echo "<div class='slide kitab_sliderleri_ana_sehife'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img'/></a> <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span>
                  <div class='cart-price'> <a class='cart-btn2' href='book.php?id=".$row['id']."'></a> <span class='price'>".$row['qiymet']." AZN</span> </div>
                  </div>";
            }
          ?>
        </div>
      </section>
      <section class="span12 m-bottom">
        <div class="heading-bar">
          <h2>Xarici Dildə Kitablar</h2>
          <span class="h-line"></span> </div>
        <div class="slider1">
          <?php
            $select = "SELECT id,ad,foto,qiymet FROM kitablar WHERE dil != 1 AND aktiv='1' ORDER BY RAND() LIMIT 18";
            $netice = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($netice)){
              echo "<div class='slide kitab_sliderleri_ana_sehife'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img'/></a> <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span>
                  <div class='cart-price'> <a class='cart-btn2' href='book.php?id=".$row['id']."'></a> <span class='price'>".$row['qiymet']." AZN</span> </div>
                  </div>";
            }
          ?>
        </div>
      </section>
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
