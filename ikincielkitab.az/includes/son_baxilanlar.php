<!-- Start Latest Reviews Section -->
            <div class="side-holder">
            	<article class="l-reviews">
                	<h2>Son Baxılanlar</h2>
                    <div class="side-inner-holder">
                        <?php
                          if($conn){
                            $select = "SELECT id,ad,yazar,foto,qiymet FROM kitablar WHERE son_baxilma='1' AND aktiv='1' ";
                            $netice = mysqli_query($conn,$select);

                            while($row = mysqli_fetch_assoc($netice)){
                              echo "<article class='r-post'>
                                      <a href='book.php?id=".$row['id']."' >
                                        <div class='r-img-title'>
                                          <img class='son_baxilanlar_imgs' src='book_images/".$row['foto'].".jpg' />
                                          <div class='r-det-holder'>
                                              <strong class='r-author'><a href='book.php?id=".$row['id']."'>".$row['ad']."</a></strong>
                                              <span class='r-by'>".$row['yazar']."</span>
                                              <span class='f-price'>".$row['qiymet']." AZN</span>
                                            </div>
                                        </div>
                                      </a>
                                    </article>";
                            }
                          }
                        ?>
                    </div>
                </article>
            </div>
            <!-- End Latest Reviews Section -->