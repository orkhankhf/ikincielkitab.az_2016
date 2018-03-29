<!-- Start Main Header -->
  <!-- Start Top Nav Bar -->
  <section class="top-nav-bar">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span6">
          <ul class="top-nav">
            <li><a href="index.php">Ana Səhifə</a></li>
            <li><a href="haqqimizda.php">Haqqımızda</a></li>
            <li><a href="elaqe.php">Bizimlə Əlaqə</a></li>
          </ul>
        </section>
        <section class="span6 e-commerce-list">
          <ul>
            <li>Xoş Gəlmisiniz! Qeydiyyatdan keçmədən bir neçə saniyədə kitabınızı <a href="kitab_sat.php">burdan</a> əlavə edin!</li>
          </ul>
        </section>
      </section>
    </section>
  </section>
  <!-- End Top Nav Bar -->
  <header id="main-header">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span4">
          <a href="index.php"><img class="header_logo" src="images/logo.png" /></a>
        </section>
        <section class="span8">
          <p class="header_slogan">İlk dəfə yeni bir kitab oxumaqdansa, oxunmuş bir kitabı təkrar oxumaq daha yararlıdır. (Lord Dudley)</p>
          <div class="search-bar">
            <input type="text" placeholder="axtardığınız kitabın adını yazın..." onkeypress="onPress_ENTER()" class="axtar_input" />
            <input type="button" value="Axtar" onclick="axtar()" class="axtar_btn" />
            <script type="text/javascript">
              function axtar(){
                var axtar = document.getElementsByClassName("axtar_input")[0].value;
                slugify = function(text){
                    var trMap = {
                        'çÇ':'c',
                        'ğĞ':'g',
                        'şŞ':'s',
                        'üÜ':'u',
                        'ıİ':'i',
                        'öÖ':'o',
                        'əƏ':'e',
                    };
                    for(var key in trMap){
                        text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
                    }
                    return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') // remove non-alphanumeric chars
                                .replace(/\s/gi, "-") // convert spaces to dashes
                                .replace(/[-]+/gi, "-") // trim repeated dashes
                                .toLowerCase();
                }
                axtar = slugify(axtar);
                document.location="axtaris.php?axtar="+axtar;
              }
              function onPress_ENTER(){
                var keyPressed = event.keyCode || event.which;
                if(keyPressed==13){
                    return axtar();
                    keyPressed=null;
                }
              }
            </script>
          </div>
        </section>
      </section>
    </section>
    <!-- Start Main Nav Bar -->
    <nav id="nav">
      <div class="navbar navbar-inverse">
        <span class="kitab_janrlari_menu_md">KİTAB JANRLARI</span>
        <div class="navbar-inner">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="kateqoriya.php?janr=1">Elm</a></li>
              <li><a href="kateqoriya.php?janr=2">Fəlsəfə</a></li>
              <li><a href="kateqoriya.php?janr=3">Bədii Ədəbiyyat</a></li>
              <li><a href="kateqoriya.php?janr=4">Tarix</a></li>
              <li><a href="kateqoriya.php?janr=5">Siyasi</a></li>
              <li><a href="kateqoriya.php?janr=6">Psixologiya</a></li>
              <li><a href="kateqoriya.php?janr=7">Özünü İnkişaf</a></li>
              <li><a href="kateqoriya.php?janr=8">Dedektiv</a></li>
              <li><a href="kateqoriya.php?janr=9">Texnologiya</a></li>
              <li><a href="kateqoriya.php?janr=10">Roman</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">Dil<b class="caret"></b> </a>
                <ul class="dropdown-menu">
                  <li><a href="kateqoriya.php?dil=1">Azərbaycanca</a></li>
                  <li><a href="kateqoriya.php?dil=2">Rusca</a></li>
                  <li><a href="kateqoriya.php?dil=3">Türkcə</a></li>
                  <li><a href="kateqoriya.php?dil=4">İngiliscə</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">Digər <b class="caret"></b> </a>
                <ul class="dropdown-menu">
                  <li><a href="kateqoriya.php?janr=11">Dini Ədəbiyyat</a></li>
                  <li><a href="kateqoriya.php?janr=12">Uşaq Ədəbiyyatı</a></li>
                  <li><a href="kateqoriya.php?janr=13">Programlaşdırma</a></li>
                  <li><a href="kateqoriya.php?janr=14">Dərslik</a></li>
                  <li><a href="kateqoriya.php?janr=15">Digər</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </nav>
    <!-- End Main Nav Bar -->
  </header>
  <!-- End Main Header -->