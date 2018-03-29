<!-- Start Footer Top 2 -->
  <section class="container-fluid footer-top2">
    <section class="social-ico-bar">
      <section class="container">
        <section class="row-fluid">
          <div id="socialicons" class="hidden-phone">
            <ul class="footer2-link">
              <li><a href="haqqimizda.php">Haqqımızda</a></li>
              <li><a href="elaqe.php">Əlaqə</a></li>
            </ul>
            <a id="social_facebook" class="social_active" href="https://www.facebook.com/ikincielkitab.az" target="_blank" title="Facebook Səhifəmiz"><span></span></a>
          </div>
        </section>
      </section>
    </section>
    <section class="container">
      <section class="row-fluid">
        <figure class="span4 footer_headers">
          <h4>Ən Yenilər</h4>
          <ul class="f2-img-list footer_little_books">
            <?php
              if(!isset($conn)){
                include "db/db.php";
              }
              if($conn){
                $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY id DESC LIMIT 6";
                $netice = mysqli_query($conn,$select);

                while($row = mysqli_fetch_assoc($netice)){
                echo "<li>
                        <div class='left'><a href='book.php?id=".$row['id']."'><img class='footer_imgs' src='book_images/".$row['foto'].".jpg' /></a></div>
                        <div class='right'> <strong class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></strong> <span class='by-author'>".$row['yazar']."</span> <span class='f-price'>".$row['qiymet']." AZN</span> </div>
                      </li>";
                }
              }
            ?>
          </ul>
        </figure>
        <figure class="span4 footer_headers">
          <h4>Ən Çox Oxunanlar</h4>
          <ul class="f2-img-list footer_little_books">
            <?php
              if($conn){
                $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY oxunma_sayi DESC LIMIT 6";
                $netice = mysqli_query($conn,$select);

                while($row = mysqli_fetch_assoc($netice)){
                echo "<li>
                        <div class='left'><a href='book.php?id=".$row['id']."'><img class='footer_imgs' src='book_images/".$row['foto'].".jpg' /></a></div>
                        <div class='right'> <strong class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></strong> <span class='by-author'>".$row['yazar']."</span> <span class='f-price'>".$row['qiymet']." AZN</span> </div>
                      </li>";
                }
              }
            ?>
          </ul>
        </figure>
        <figure class="span4 footer_headers">
          <h4>Müxtəlif</h4>
          <ul class="f2-img-list footer_little_books">
            <?php
              if($conn){
                $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE aktiv='1' ORDER BY RAND() LIMIT 6";
                $netice = mysqli_query($conn,$select);

                while($row = mysqli_fetch_assoc($netice)){
                echo "<li>
                        <div class='left'><a href='book.php?id=".$row['id']."'><img class='footer_imgs' src='book_images/".$row['foto'].".jpg' /></a></div>
                        <div class='right'> <strong class='title'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></strong> <span class='by-author'>".$row['yazar']."</span> <span class='f-price'>".$row['qiymet']." AZN</span> </div>
                      </li>";
                }
              }
            ?>
          </ul>
        </figure>
      </section>
    </section>
  </section>
  <!-- End Footer Top 2 -->
  <!-- Start Main Footer -->
  <footer id="main-footer">
    <section class="social-ico-bar">
      <section class="container">
        <section class="row-fluid">
          <article class="span6">
            <p>© 2017  ikincielkitab.az</p>
          </article>
          <article class="span6 copy-right">
            <p>Designed by <a href="http://www.bakuweb.az/">Bakuweb.az</a></p>
          </article>
        </section>
      </section>
    </section>
  </footer>
  <!-- End Main Footer -->