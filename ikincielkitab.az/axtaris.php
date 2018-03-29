<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Axtarış Nəticələri</title>
<?php
  include "includes/head.php";
?>
  <link rel="alternate" hreflang="az" href="http://ikincielkitab.az/axtaris.php" />
  <meta name="keywords" content="kitab,kitablar,ikinci el kitab,ikinci əl kitab,kitab satisi,kitab satışı,bakıda kitab satışı,bakida kitab satisi,azerice kitab,azəricə kitab,rusca kitab,ingiliscə kitab,ingilisce kitab" />
  <meta name="description" content="İkinci Əl Kitabların Alışı Və Satışı." />
  <meta name="abstract" content="İkinci Əl Kitabların Alışı Və Satışı" />
  <meta property="og:url" content="http://ikincielkitab.az/axtaris.php" />
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
<!-- Start Main Wrapper -->
<div class="wrapper">
  <?php
    include "includes/header.php";
  ?>
  <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
    	<div class="heading-bar">
        	<h2 class="kitabin_janri_basliq">Axtarış Nəticələri</h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
            <section class="grid-holder features-books">

            <?php
                //db faylini qosur
                include "db/db.php";

                $sehife_basi_goster = 9;
                $true = true;

                if(isset($_GET['sehife']) && !empty($_GET['sehife']) && is_numeric($_GET['sehife'])){
                    $sehife = $_GET['sehife'];
                }else{
                    $sehife = 1;
                }
                $hardan_al = ($sehife-1) * $sehife_basi_goster;

                if(isset($_GET['axtar']) && !empty($_GET['axtar'])){
                    $axtar = $_GET['axtar'];

                    $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE ";
                    $select_all_for_page = "SELECT id FROM kitablar WHERE ";

                    //eger birden cox soz axtarilibsa bosluqlara ( - isaresine) gore sozleri arraya atir
                    if(strpos($axtar,'-') == true){
                        $axtarilan_array = explode('-',$axtar);
                        for($a=0;$a<count($axtarilan_array);$a++){
                            $select .= " aktiv='1' AND axtaris LIKE '%$axtarilan_array[$a]%' OR";
                            $select_all_for_page .= " aktiv='1' AND axtaris LIKE '%$axtarilan_array[$a]%' OR";
                        }
                        $select = substr($select, 0, -3);
                        $select_all_for_page = substr($select_all_for_page, 0, -3);
                    }else{
                        $select .= " aktiv='1' AND axtaris LIKE '%$axtar%' ";
                        $select_all_for_page .= " aktiv='1' AND axtaris LIKE '%$axtar%'";
                    }
                    $select .= " ORDER BY id DESC LIMIT $hardan_al,$sehife_basi_goster";
                }else{
                    $true=false;
                    echo "Axtarmaq istədiyiniz sözü daxil edin.";
                }

                if($conn && $true == true){

                    $netice = mysqli_query($conn,$select);

                    $hr_count = 1;
                    $axtaris_neticesi_var = false;
                    while($row = mysqli_fetch_assoc($netice)){
                        $axtaris_neticesi_var = true;
                        echo "<figure class='span4 slide first books_pagination_grid'>
                                <a href='book.php?id=".$row['id']."'><img src='book_images/".$row['foto'].".jpg' class='pro-img kateqoriya_imgs'/></a>
                                <span class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></span>
                                <span class='r-by'>".$row['yazar']."</span>
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
                    if($axtaris_neticesi_var == false){
                        echo "Axtarışa uyğun nəticə tapılmadı.";
                    }
                }
            ?>
            </section>
            <div class="blog-footer">
            	<div class="pagination my_pagination_ul">
                  <ul> 
                    <?php
                        if($true == true){
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
                                    echo "<li class='active'><a href='axtaris.php?sehife=".$bir."&axtar=".$axtar."'>".$bir."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$iki."&axtar=".$axtar."'>".$iki."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$uc."&axtar=".$axtar."'>".$uc."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$dord."&axtar=".$axtar."'>".$dord."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bes."&axtar=".$axtar."'>".$bes."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$next."&axtar=".$axtar."'>></a></li>";
                                }else if($sehife == 2){
                                    echo "<li><a href='axtaris.php?sehife=".$prev."&axtar=".$axtar."'><</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bir."&axtar=".$axtar."'>".$bir."</a></li>";
                                    echo "<li class='active'><a href='axtaris.php?sehife=".$iki."&axtar=".$axtar."'>".$iki."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$uc."&axtar=".$axtar."'>".$uc."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$dord."&axtar=".$axtar."'>".$dord."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bes."&axtar=".$axtar."'>".$bes."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$next."&axtar=".$axtar."'>></a></li>";
                                }else if($sehife >= 3 && $sehife <= $cemi_sehife_sayi-2){
                                    $bir = $sehife-2;
                                    $iki = $sehife-1;
                                    $uc = $sehife;
                                    $dord = $sehife+1;
                                    $bes = $sehife+2;
                                    echo "<li><a href='axtaris.php?sehife=".$prev."&axtar=".$axtar."'><</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bir."&axtar=".$axtar."'>".$bir."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$iki."&axtar=".$axtar."'>".$iki."</a></li>";
                                    echo "<li class='active'><a href='axtaris.php?sehife=".$uc."&axtar=".$axtar."'>".$uc."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$dord."&axtar=".$axtar."'>".$dord."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bes."&axtar=".$axtar."'>".$bes."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$next."&axtar=".$axtar."'>></a></li>";
                                }else if($sehife == $cemi_sehife_sayi-1){
                                    $bir = $sehife-3;
                                    $iki = $sehife-2;
                                    $uc = $sehife-1;
                                    $dord = $sehife;
                                    $bes = $sehife+1;

                                    echo "<li><a href='axtaris.php?sehife=".$prev."&axtar=".$axtar."'><</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bir."&axtar=".$axtar."'>".$bir."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$iki."&axtar=".$axtar."'>".$iki."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$uc."&axtar=".$axtar."'>".$uc."</a></li>";
                                    echo "<li class='active'><a href='axtaris.php?sehife=".$dord."&axtar=".$axtar."'>".$dord."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bes."&axtar=".$axtar."'>".$bes."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$next."&axtar=".$axtar."'>></a></li>";
                                }else if($sehife == $cemi_sehife_sayi){
                                    $bir = $sehife-4;
                                    $iki = $sehife-3;
                                    $uc = $sehife-2;
                                    $dord = $sehife-1;
                                    $bes = $sehife;

                                    echo "<li><a href='axtaris.php?sehife=".$prev."&axtar=".$axtar."'><</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$bir."&axtar=".$axtar."'>".$bir."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$iki."&axtar=".$axtar."'>".$iki."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$uc."&axtar=".$axtar."'>".$uc."</a></li>";
                                    echo "<li><a href='axtaris.php?sehife=".$dord."&axtar=".$axtar."'>".$dord."</a></li>";
                                    echo "<li class='active'><a href='axtaris.php?sehife=".$bes."&axtar=".$axtar."'>".$bes."</a></li>";
                                }

                            }else{
                                for($a=1; $a<=$cemi_sehife_sayi; $a++){ 
                                    echo "<li id='sehife".$a."'><a href='axtaris.php?sehife=".$a."&axtar=".$axtar."'>".$a."</a></li>"; 
                                };
                            }
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
