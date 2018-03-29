<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  include "includes/head.php";
?>
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/kateqoriya.php" />
  <meta name="keywords" content="kitab,kitablar,ikinci el kitab,ikinci əl kitab,kitab satisi,kitab satışı,bakıda kitab satışı,bakida kitab satisi,azerice kitab,azəricə kitab,rusca kitab,ingiliscə kitab,ingilisce kitab" />
  <meta name="description" content="İkinci Əl Kitabların Alışı Və Satışı." />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="http://ikincielkitab.az/kateqoriya.php" />
  <meta property="og:type" content="website" />
  <meta property="og:title" class="og_title" /><!-- asagida setAttribude ile verilib content-->
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
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <h1 class="seo_h1">ikincielkitab.az əlaqə elaqe.İkinci əl kitabların satışı.Ikinci el kitablarin satisi. Kitab sat, kitab al və ya onlayn kitab almaq kitablar.muxtelif janrlarda kitablar </h1>
    	<div class="heading-bar">
        	<h2 class="kitabin_janri_basliq"></h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
            <section class="grid-holder features-books">

            <?php
                //db faylini qosur
                include "db/db.php";

                $sehife_basi_goster = 9;

                if(isset($_GET['sehife']) && !empty($_GET['sehife']) && is_numeric($_GET['sehife'])){
                    $sehife = $_GET['sehife'];
                }else{
                    $sehife = 1;
                }
                $hardan_al = ($sehife-1) * $sehife_basi_goster;

                //sehifeleri deyisende sehife=4 ile beraber janr ve dil de lazim ola biler
                $janr_or_dil = "";
                if(isset($_GET['janr']) && !empty($_GET['janr']) && is_numeric($_GET['janr']) && $_GET['janr'] >= 1 && $_GET['janr'] <= 15){
                    //linkdeki janri alir
                    $janr = $_GET['janr'];
                    $janr_or_dil = "&janr=".$janr;

                    $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE janr = '$janr' AND aktiv='1' ORDER BY id DESC LIMIT $hardan_al,$sehife_basi_goster";
                    $select_all_for_page = "SELECT id from kitablar WHERE janr = '$janr' AND aktiv='1'";

                    //page title teyin etmek ucun janri teyin edir
                    if($janr == 1){
                        $page_title = "Elm";
                    }else if($janr == 2){
                        $page_title = "Fəlsəfə";
                    }else if($janr == 3){
                        $page_title = "Bədii Ədəbiyyat";
                    }else if($janr == 4){
                        $page_title = "Tarix";
                    }else if($janr == 5){
                        $page_title = "Siyasi";
                    }else if($janr == 6){
                        $page_title = "Psixologiya";
                    }else if($janr == 7){
                        $page_title = "Özünü İnkişaf";
                    }else if($janr == 8){
                        $page_title = "Dedektiv";
                    }else if($janr == 9){
                        $page_title = "Texnologiya";
                    }else if($janr == 10){
                        $page_title = "Roman";
                    }else if($janr == 11){
                        $page_title = "Dini Ədəbiyyat";
                    }else if($janr == 12){
                        $page_title = "Uşaq Ədəbiyyatı";
                    }else if($janr == 13){
                        $page_title = "Programlaşdırma";
                    }else if($janr == 14){
                        $page_title = "Dərslik";
                    }else if($janr == 15){
                        $page_title = "Digər";
                    }else{
                        $page_title = "Kitablar";
                    }

                }else if(isset($_GET['dil']) && !empty($_GET['dil']) && is_numeric($_GET['dil']) && $_GET['dil'] >= 1 && $_GET['dil'] <= 4){
                    //linkdeki dili alir
                    $dil = $_GET['dil'];
                    $janr_or_dil = "&dil=".$dil;

                    $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE dil = '$dil' AND aktiv='1' ORDER BY id DESC LIMIT $hardan_al,$sehife_basi_goster";
                    $select_all_for_page = "SELECT id from kitablar WHERE dil = '$dil' AND aktiv='1'";

                    //page title teyin etmek ucun dil teyin edir
                    if($dil == 1){
                        $page_title = "Azərbaycanca";
                    }else if($dil == 2){
                        $page_title = "Rusca";
                    }else if($dil == 3){
                        $page_title = "Türkcə";
                    }else if($dil == 4){
                        $page_title = "İngiliscə";
                    }else{
                        $page_title = "Kitablar";
                    }
                }else{
                    $page_title = "Kitablar";
                    $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY id DESC LIMIT $hardan_al,$sehife_basi_goster";
                    $select_all_for_page = "SELECT id from kitablar WHERE aktiv='1'";
                }

                if($conn){

                    $netice = mysqli_query($conn,$select);

                    $hr_count = 1;
                    while($row = mysqli_fetch_assoc($netice)){
                        echo "<figure class='span4 slide first books_pagination_grid'>
                                <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img kateqoriya_imgs'/></a>
                                <h2 class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></h2>
                                <h3 class='r-by kateqoriya_yazar_item'>".$row['yazar']."</h3>
                                <div class='cart-price'>
                                    <a class='cart-btn2' href='book.php?id=".$row['id']."'></a>
                                    <span class='price'>".$row['qiymet']." AZN</span>
                                </div>
                            </figure>";
                        if($hr_count == 3 || $hr_count == 6){
                            echo "<hr>";
                        }
                        $hr_count++;
                    }
                }else{
                    echo "Xəta baş verdi! Xahiş edirik bunu bizə bildirin.";
                }
            ?>
            <script type="text/javascript">
                function setTitle(){
                    var page_title = "<?php echo $page_title;?>";
                    document.title = page_title;
                    document.getElementsByClassName("kitabin_janri_basliq")[0].innerHTML = "<?php echo $page_title;?>";
                    document.getElementsByClassName("seo_h1")[0].innerHTML += "<?php echo $page_title;?>";
                    if(page_title=="Kitablar"){
                        document.getElementsByClassName("og_title")[0].setAttribute("content","İkinci Əl Kitabların Alışı Və Satışı");
                    }else if(page_title=="Azərbaycanca" || page_title=="Rusca" || page_title=="Türkcə" || page_title=="İngiliscə"){
                        document.getElementsByClassName("og_title")[0].setAttribute("content",page_title+" Kitablar");
                    }else{
                        document.getElementsByClassName("og_title")[0].setAttribute("content",page_title+" Kitabları");
                    }
                }
                setTitle();
            </script>
            </section>
            <div class="blog-footer">
            	<div class="pagination my_pagination_ul">
                  <ul> 
                    <?php
                        $netice_for_page = mysqli_query($conn,$select_all_for_page);
                        $cemi_kitab_sayisi = mysqli_num_rows($netice_for_page);
                        $cemi_sehife_sayi = ceil($cemi_kitab_sayisi/$sehife_basi_goster);
                        //eger sehife sayi 5 dan coxdursa hamisini gosterme birden, eger 5 veya azdirsa hamisini goster
                        if($cemi_sehife_sayi > 5){
                            $bir = 1;
                            $iki = 2;
                            $uc = 3;
                            $dord = 4;
                            $bes = 5;

                            $prev = $sehife-1;
                            $next = $sehife+1;
                            if($sehife == 1){
                                echo "<li class='active'><a href='kateqoriya.php?sehife=".$bir.$janr_or_dil."'>".$bir."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$iki.$janr_or_dil."'>".$iki."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$uc.$janr_or_dil."'>".$uc."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$dord.$janr_or_dil."'>".$dord."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bes.$janr_or_dil."'>".$bes."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$next.$janr_or_dil."'>></a></li>";
                            }else if($sehife == 2){
                                echo "<li><a href='kateqoriya.php?sehife=".$prev.$janr_or_dil."'><</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bir.$janr_or_dil."'>".$bir."</a></li>";
                                echo "<li class='active'><a href='kateqoriya.php?sehife=".$iki.$janr_or_dil."'>".$iki."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$uc.$janr_or_dil."'>".$uc."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$dord.$janr_or_dil."'>".$dord."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bes.$janr_or_dil."'>".$bes."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$next.$janr_or_dil."'>></a></li>";
                            }else if($sehife >= 3 && $sehife <= $cemi_sehife_sayi-2){
                                $bir = $sehife-2;
                                $iki = $sehife-1;
                                $uc = $sehife;
                                $dord = $sehife+1;
                                $bes = $sehife+2;
                                echo "<li><a href='kateqoriya.php?sehife=".$prev.$janr_or_dil."'><</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bir.$janr_or_dil."'>".$bir."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$iki.$janr_or_dil."'>".$iki."</a></li>";
                                echo "<li class='active'><a href='kateqoriya.php?sehife=".$uc.$janr_or_dil."'>".$uc."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$dord.$janr_or_dil."'>".$dord."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bes.$janr_or_dil."'>".$bes."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$next.$janr_or_dil."'>></a></li>";
                            }else if($sehife == $cemi_sehife_sayi-1){
                                $bir = $sehife-3;
                                $iki = $sehife-2;
                                $uc = $sehife-1;
                                $dord = $sehife;
                                $bes = $sehife+1;

                                echo "<li><a href='kateqoriya.php?sehife=".$prev.$janr_or_dil."'><</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bir.$janr_or_dil."'>".$bir."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$iki.$janr_or_dil."'>".$iki."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$uc.$janr_or_dil."'>".$uc."</a></li>";
                                echo "<li class='active'><a href='kateqoriya.php?sehife=".$dord.$janr_or_dil."'>".$dord."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bes.$janr_or_dil."'>".$bes."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$next.$janr_or_dil."'>></a></li>";
                            }else if($sehife == $cemi_sehife_sayi){
                                $bir = $sehife-4;
                                $iki = $sehife-3;
                                $uc = $sehife-2;
                                $dord = $sehife-1;
                                $bes = $sehife;

                                echo "<li><a href='kateqoriya.php?sehife=".$prev.$janr_or_dil."'><</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$bir.$janr_or_dil."'>".$bir."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$iki.$janr_or_dil."'>".$iki."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$uc.$janr_or_dil."'>".$uc."</a></li>";
                                echo "<li><a href='kateqoriya.php?sehife=".$dord.$janr_or_dil."'>".$dord."</a></li>";
                                echo "<li class='active'><a href='kateqoriya.php?sehife=".$bes.$janr_or_dil."'>".$bes."</a></li>";
                            }

                        }else{
                            for($a=1; $a<=$cemi_sehife_sayi; $a++){ 
                                echo "<li id='sehife".$a."'><a href='kateqoriya.php?sehife=".$a.$janr_or_dil."'>".$a."</a></li>"; 
                            };
                        }
                    ?>

                    <script type="text/javascript">
                        //hansi sehifededirse o sehifenin li sini active edir
                        document.getElementById("sehife"+"<?php echo $sehife;?>").setAttribute("class","active");
                    </script>
                  </ul>  
                </div>
            </div>
            <!-- End Grid View Section -->
            
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
<?php
  if(isset($conn)){
    mysqli_close($conn);
  }
?>
</body>
</html>
