<?php
  if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
                    $id = $_GET['id'];
                    $og_url = "http://ikincielkitab.az/book.php?id=".$id;

                    include "db/db.php";

                    if($conn){
                      $select = "SELECT ad,yazar,janr,dil,foto,qiymet,sehife_sayi FROM kitablar WHERE id='$id' AND aktiv='1'";
                      $netice = mysqli_query($conn,$select);

                      while($row = mysqli_fetch_assoc($netice)){
                        $oxsar_kitablar = $row['janr'];
                        if($row['janr'] == 1){
                          $janr = "Elm";
                        }else if($row['janr'] == 2){
                          $janr = "Fəlsəfə";
                        }else if($row['janr'] == 3){
                          $janr = "Bədii Ədəbiyyat";
                        }else if($row['janr'] == 4){
                          $janr = "Tarix";
                        }else if($row['janr'] == 5){
                          $janr = "Siyasi";
                        }else if($row['janr'] == 6){
                          $janr = "Psixologiya";
                        }else if($row['janr'] == 7){
                          $janr = "Özünü İnkişaf";
                        }else if($row['janr'] == 8){
                          $janr = "Dedektiv";
                        }else if($row['janr'] == 9){
                          $janr = "Texnologiya";
                        }else if($row['janr'] == 10){
                          $janr = "Roman";
                        }else if($row['janr'] == 11){
                          $janr = "Dini Ədəbiyyat";
                        }else if($row['janr'] == 12){
                          $janr = "Uşaq Ədəbiyyatı";
                        }else if($row['janr'] == 13){
                          $janr = "Programlaşdırma";
                        }else if($row['janr'] == 14){
                          $janr = "Dərslik";
                        }else if($row['janr'] == 15){
                          $janr = "Digər";
                        }
                        if($row['dil'] == 1){
                          $dil = "Azərbaycanca";
                        }else if($row['dil'] == 2){
                          $dil = "Rusca";
                        }else if($row['dil'] == 3){
                          $dil = "Türkcə";
                        }else if($row['dil'] == 4){
                          $dil = "İngiliscə";
                        }
                        $og_img = $row['foto'];
                        $og_title = $row['yazar']." - ".$row['ad'];
                        $og_description = "Qiymət: ".$row['qiymet']." AZN | Səhifə: ".$row['sehife_sayi']." | Janr: ".$janr." | Dil: ".$dil;
                      }
                    }else{
                      echo "Xəta baş verdi. Xahiş edirik bunu bizə bildirin";
                    }
                  }else{
                    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  include "includes/head.php";
?>
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/book.php" />
  <meta name="keywords" content="kitab,kitablar,ikinci el kitab,ikinci əl kitab,bakida kitab satisi,azerice kitab,azəricə kitab,rusca kitab,ingiliscə kitab,ingilisce kitab" />
  <meta name="description" content="İkinci Əl Kitabların Alışı Və Satışı." />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="<?php echo $og_url; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo $og_title; ?>" /><!-- asagida setAttribude ile verilib content-->
  <meta property="og:description" content="<?php echo $og_description; ?>" /><!-- asagida setAttribude ile verilib content-->
  <meta property="og:image" content="<?php echo 'http://ikincielkitab.az/book_images/'.$og_img.'.jpg'; ?>" /><!-- asagida setAttribude ile verilib content-->
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="fb:app_id" content="311677012534364" />
  <meta property="fb:admins" content="OrxanDWK" />
  <meta property="og:site_name" content="ikincielkitab" />
<style>
/* styles unrelated to zoom */
.zoom { display:inline-block; position: relative; }
.zoom:after { content:''; display:block; width:33px; height:33px; position:absolute; top:0; right:0; background:url(icon.png); }
.zoom img { display: block; }
.zoom img::selection {background-color: transparent;}
#ex2 img:hover { cursor: url(grab.cur), default; }
#ex2 img:active { cursor: url(grabbed.cur), default; }
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v2.7&appId=311677012534364";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
<script data-cfasync='false' type='text/javascript' src='//p181252.clksite.com/adServe/banners?tid=181252_327668_0&type=shadowbox&size=800x440&autoClose=enable'></script>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
    	  <div class="heading-bar">
        	<h2>Kitab Haqqında</h2>
            <span class="h-line"></span>
        </div>
        <script type="text/javascript">
          var kitab_oxunub = false;
          function bu_kitabi_oxumusam(id){
            if(kitab_oxunub == false){
              $.ajax({
                url:"bu_kitabi_oxumusam.php",
                method:"POST",
                data:{id:id},
                success:function(gelen){
                  $(".bu_kitabi_oxumusam_btn").fadeTo("slow",0.1);
                  setTimeout(function(){
                    $(".bu_kitabi_oxumusam_btn").html("<i class='icon-ok'></i>").fadeTo("slow",1);
                  },700)
                  kitab_oxunub = true;
                }
              });
            }
          }
        </script>
        <!-- Start Main Content -->
        <section class="span9 first">            
            <!-- Strat Book Detail Section -->
            <section class="b-detail-holder">
                <?php
                  if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
                    $id = $_GET['id'];
                    $bu_kitabdan_basqa_oxsar_sec = $_GET['id'];

                    include "db/db.php";

                    if($conn){
                      //kitabin sehifesine daxil olduqda id adresine gore son_baxilma sutununu sec, eger sutun 0 olsa o zaman diger 5 son baxilanlardan birinin 1 reqemini sil 0 yaz ve hal hazirda baxilan kitabin son_baxilma sutununa 0 update ederek 1 yaz
                      $kitabi_sec = "SELECT son_baxilma FROM kitablar WHERE id='$id' AND aktiv='1'";
                      $netice_kitabi_sec = mysqli_query($conn,$kitabi_sec);
                      while($row = mysqli_fetch_assoc($netice_kitabi_sec)){
                        if($row['son_baxilma'] == 0){
                          //rastgele hansisa son_baxilma sutunundan 1 olani 0 et
                          $update_random_1 = "UPDATE kitablar SET son_baxilma='0' WHERE son_baxilma='1' AND aktiv='1' ORDER BY RAND() LIMIT 1";
                          $netice_random_1 = mysqli_query($conn,$update_random_1);

                          //indi baxilan kitabin son_baxilma columnuna 1 yaz
                          $update_son_baxilma = "UPDATE kitablar SET son_baxilma='1' WHERE id='$id' AND aktiv='1'";
                          $netice_son_baxilma = mysqli_query($conn,$update_son_baxilma);
                        }
                      }

                      $select = "SELECT ad,yazar,veziyyet,foto,qiymet,sehife_sayi,tel_fb_link,seher,aciqlama FROM kitablar WHERE id='$id' AND aktiv='1'";
                      $netice = mysqli_query($conn,$select);

                      while($row = mysqli_fetch_assoc($netice)){
                        $oxsar_kitablar = $row['janr'];
                        
                        if($row['veziyyet'] == 1){
                          $veziyyeti = "Yaxşı";
                        }else if($row['veziyyet'] == 2){
                          $veziyyeti = "Orta";
                        }else if($row['veziyyet'] == 3){
                          $veziyyeti = "Pis";
                        }
                        if(strstr($row['tel_fb_link'],"com")){
                          $tel_fb_link = "<li>Satıcının Facebook Linki: <a href='".$row['tel_fb_link']."' target='_blank'>".$row['tel_fb_link']."</a></li>";
                        }else{
                          $tel_fb_link = "<li>Satıcının Telefon Nömrəsi: <span>".$row['tel_fb_link']."</span></li>";
                        }
                        $og_img = $row['foto'];
                        $og_title = $row['yazar']." - ".$row['ad'];
                        $og_description = "Qiymət: ".$row['qiymet']." AZN | Səhifə: ".$row['sehife_sayi']." | Janr: ".$janr." | Dil: ".$dil;
                        echo "<script type='text/javascript'>document.title = '".$row['ad']." - ".$row['yazar']."';</script>";
                        echo "<article class='title-holder'>
                                <div class='span12'>
                                    <h1 class='book_name_h1'><strong>".$row['ad']."</strong> - ".$row['yazar']."</h1>
                                  </div>
                              </article>
                              <div class='book-i-caption'>
                              <!-- Strat Book Image Section -->
                                <div class='span6 b-img-holder'>
                                      <span class='zoom' id='ex1'> <img src='book_images/".$row['foto'].".jpg' height='219' width='300' id='jack'/></span>
                                  </div>
                              <!-- Strat Book Image Section -->
                              
                              <!-- Strat Book Overview Section -->    
                                  <div class='span6'>
                                      <div class='comm-nav kitab_info_span'>
                                          <ul>
                                              <li>Yazıçı: <span>".$row['yazar']."</span></li>
                                              <li>Janr: <span>".$janr."</span></li>
                                              <li>Dil: <span>".$dil."</span></li>
                                              <li>Vəziyyəti: <span>".$veziyyeti."</span></li>
                                              <li>Səhifələrin Sayı: <span>".$row['sehife_sayi']."</span></li>
                                              <li>Şəhər: <span>".$row['seher']."</span></li>
                                              ".$tel_fb_link."
                                              <li class='kitabin_qiymeti_li'>Qiymət: <span>".$row['qiymet']." AZN</span></li>
                                              <li>Qısa Məlumat:</li>
                                              <p>".$row['aciqlama']."</p>
                                          </ul>
                                      </div>
                                      <button id='".$id."' class='bu_kitabi_oxumusam_btn grey-btn left-btn' onclick='bu_kitabi_oxumusam(this.id)'>Bu kitabı oxumuşam</button>
                                      <div class='fb-share-button' data-href='http://ikincielkitab.az/book.php?id=".$id."' data-layout='button' data-size='large' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fikincielkitab.az%2Fbook.php%3Fid%3D469&amp;src=sdkpreparse'>Paylaş</a></div>
                                 </div>
                              <!-- End Book Overview Section -->
                              </div>";
                      }
                    }else{
                      echo "Xəta baş verdi. Xahiş edirik bunu bizə bildirin";
                    }
                  }else{
                    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                  }
                ?>
            <!-- Start BX Slider holder -->  
               <section class="span12 m-bottom">
                <div class="heading-bar">
                  <h2>Digər Kitablar</h2>
                  <span class="h-line"></span>
                </div>
                <div class="slider1">
                  <?php
                    $select = "SELECT id,ad,foto,qiymet FROM kitablar WHERE janr = '$oxsar_kitablar' AND aktiv='1' AND id != '$bu_kitabdan_basqa_oxsar_sec' ORDER BY RAND() LIMIT 18";
                    $netice = mysqli_query($conn,$select);

                    while($row = mysqli_fetch_assoc($netice)){
                      echo "<div class='slide kitab_sliderleri_ana_sehife'> <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img'/></a> <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span>
                          <div class='cart-price'> <a class='cart-btn2' href='book.php?id=".$row['id']."'></a> <span class='price'>".$row['qiymet']." AZN</span> </div>
                          </div>";
                    }
                  ?>
                </div>
              </section>
            <!-- End BX Slider holder -->
            </section>
            <!-- Strat Book Detail Section -->
        </section>
        <!-- End Main Content -->
        
        <!-- Start Main Side Bar -->
        <section class="span3">
        	<div class="side-holder">
            	<article class="banner-ad"><img src="images/image20.jpg" alt="Banner Ad" /></article>
            </div>
            
            <?php
              include "includes/kateqoriyalar_right_section.php";
            ?>
            
            <?php
              include "includes/son_baxilanlar.php";
            ?>
        </section>
        <!-- End Main Side Bar -->
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
<script>
$(document).ready(function(){
	$('#ex1').zoom();		 
});
</script>
<?php
  if(isset($conn)){
    mysqli_close($conn);
  }
?>
</body>
</html>
