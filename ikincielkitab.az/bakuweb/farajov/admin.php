<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Adminpanel</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<style type="text/css">
		.slidere_foto_elave_et{
			margin-top: 25px;
		}
		.slidere_foto_elave_et input{
			width: 270px;
			display: inline-block;
		}
		.slidere_foto_elave_et button{
			width: 81px;
		}
		.sekili_kes_btn{
			width: 216px;
			float: right;
			border-radius: 0 !important;
		}
		.exit_adminpanel_btn_li{
			float: right !important;
			line-height: 40px;
		}
		.exit_adminpanel_btn{
			height: 33px;
		}
	</style>
</head>
<body>
<div class="container">
	<?php
		if(isset($_SESSION['login']) && isset($_SESSION['password'])){
			include "../../db/db.php";
		}else{
			echo "<script>window.location.href='../farajov';</script>";
		}
	?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#yeni_elanlar">Yeni Elanlar</a></li>
			  <li><a data-toggle="tab" href="#elan_sil">Elan Sil</a></li>
			  <li><a data-toggle="tab" href="#slider">Slider</a></li>
			  <li class="exit_adminpanel_btn_li"><button class='btn btn-danger exit_adminpanel_btn' onclick="exit_adminpanel()">Çıx</button></li>
			</ul>
			<script type="text/javascript">
				function exit_adminpanel(){
					var exit = "exit";
					$.ajax({
						url:"exit_adminpanel.php",
						type:"POST",
						data:{exit:exit},
						success:function(gelen){
							if(gelen == "admin_exit"){
								window.location = "index.php";
							}
						},
						error:function(){
							alert("Xəta baş verdi!");
						}
					});
				}
			</script>
			<div class="tab-content">
				<div id="yeni_elanlar" class="tab-pane fade in active">
					<table class="table table-hover table-responsive">
					    <thead>
					      <tr>
					        <th>Foto</th>
					        <th>Ad</th>
					        <th>Yazar</th>
					        <th></th>
					      </tr>
					    </thead>
					    <tbody>
					      <?php
						    if($conn){
					    		$select_slider = "SELECT id,ad,yazar,foto FROM kitablar WHERE aktiv = 0";
					    		$netice_slider = mysqli_query($conn,$select_slider);
					    		while($row = mysqli_fetch_assoc($netice_slider)){
					    			echo "<tr>
										    <td><img width='75' height='90' src='../../book_images/".$row['foto'].".jpg' /> </td>
										    <td>".$row['ad']."</td>
										    <td>".$row['yazar']."</td>
										    <td><button class='btn btn-danger' id='".$row['id']."' onclick='elana_bax(this.id)' data-toggle='modal' data-target='#myModal'>Bax</button></td>
										  </tr>";
					    		}
					    	}
					      ?>
						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        
						      </div>
						      
						    </div>
						  </div>

					      <script type="text/javascript">
					      	function elana_bax(id){
					      		$.ajax({
						      		url:"functions/elana_bax.php",
						      		method:"POST",
						      		data:{id:id},
						      		success:function(gelen){
						      			$(".modal-content").html(gelen);
						      		}
						      	});
					      	}
					      	function update_elan(id){
					      		var ad = $(".kitabin_adi").val();
					      		var yazar = $(".kitabin_yazari").val();
					      		var aciqlama = $(".kitabin_aciqlamasi").val();
					      		var tel_fb_link = $(".kitabin_elaqesi").val();
					      		var seher = $(".kitabin_seheri").val();
					      		var foto = $(".push_src_to_save_elan").attr('src')
					      		$.ajax({
						      		url:"functions/save_elan.php",
						      		method:"POST",
						      		data:{id:id,ad:ad,yazar:yazar,aciqlama:aciqlama,tel_fb_link:tel_fb_link,seher:seher,foto:foto},
						      		success:function(gelen){
						      			if(gelen == "ok"){
											alert("Elan redaktə edildi!");
											location.reload();
										}else{
											alert("Xəta baş verdi! Xəta: "+gelen);
											location.reload();
										}
						      		}
						      	});
					      	}
					      	function delete_elan(id){
					      		$.ajax({
						      		url:"functions/delete_elan.php",
						      		method:"POST",
						      		data:{id:id},
						      		success:function(gelen){
						      			if(gelen == "ok"){
											alert("Elan silindi!");
											location.reload();
										}else{
											alert("Xəta baş verdi! Xəta: "+gelen);
											location.reload();
										}
						      		}
						      	});
					      	}
					      </script>
					    </tbody>
					</table>
				</div>

				<div id="elan_sil" class="tab-pane fade">
					<table class="table table-hover table-responsive">
					    <thead>
					      <tr>
					        <th>Foto</th>
					        <th>Ad</th>
					        <th>Yazar</th>
					        <th>Yerləşdirmə tarixi</th>
					        <th></th>
					      </tr>
					    </thead>
					    <tbody>
					      <?php
						    if($conn){
					    		$select_slider = "SELECT id,ad,yazar,foto,tarix FROM kitablar WHERE aktiv = 1 ORDER BY tarix DESC";
					    		$netice_slider = mysqli_query($conn,$select_slider);
					    		while($row = mysqli_fetch_assoc($netice_slider)){
					    			echo "<tr>
										    <td><img width='75' height='90' src='../../book_images/".$row['foto'].".jpg' /> </td>
										    <td>".$row['ad']."</td>
										    <td>".$row['yazar']."</td>
										    <td>".$row['tarix']."</td>
										    <td><button class='btn btn-danger' id='".$row['id']."' onclick='movcud_elani_sil(this.id)' data-toggle='modal' data-target='#myModal'>Sil</button></td>
										  </tr>";
					    		}
					    	}
					      ?>
					      <script type="text/javascript">
					      	function movcud_elani_sil(id){
					      		$.ajax({
						      		url:"functions/delete_elan.php",
						      		method:"POST",
						      		data:{id:id},
						      		success:function(gelen){
						      			if(gelen == "ok"){
											alert("Elan silindi!");
											location.reload();
										}else{
											alert("Xəta baş verdi! Xəta: "+gelen);
											location.reload();
										}
						      		}
						      	});
					      	}
					      </script>
					    </tbody>
					</table>
				</div>

				<div id="slider" class="tab-pane fade">
					<table class="table table-hover table-responsive">
						<div class="form-group slidere_foto_elave_et">
							<input type="text" class="form-control" placeholder="Əlavə ediləcək kitabın id adresini yaz">
							<button class="btn btn-success" onclick="slidere_foto_add()">Əlavə Et</button>
						</div>
						<script type="text/javascript">
							function slidere_foto_add(){
								var id = $(".slidere_foto_elave_et input").val();
								$.ajax({
									url:"functions/slidere_foto_elave_et.php",
									data:{id:id},
									method:"POST",
									success:function(gelen){
										if(gelen == "ok"){
											$(".slidere_foto_elave_et input").val('');
											alert("Kitab sliderə əlavə edildi.");
											location.reload();
										}else{
											alert("Xəta baş verdi! Xəta: "+gelen);
											location.reload();
										}
									}
								});
							}
							$(".slidere_foto_elave_et input").keypress(function(e) {
							    if(e.which == 13) {
							        return slidere_foto_add();
							    }
							});
						</script>
					    <thead>
					      <tr>
					      	<th>Foto</th>
					        <th>Ad</th>
					        <th>Yazar</th>
					        <th>Sil</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php
					    		if($conn){
					    			$select_slider = "SELECT id,ad,yazar,foto FROM kitablar WHERE slider = 1";
					    			$netice_slider = mysqli_query($conn,$select_slider);
					    			while($row = mysqli_fetch_assoc($netice_slider)){
					    				echo "<tr>
										        <td><img width='75' height='90' src='../../book_images/".$row['foto'].".jpg' /> </td>
										        <td>".$row['ad']."</td>
										        <td>".$row['yazar']."</td>
										        <td><button class='btn btn-danger' id='".$row['id']."' onclick='slider_foto_sil(this.id)'>SİL</button></td>
										      </tr>";
					    			}
					    		}
					    	?>
					    	<script type="text/javascript">
					    		function slider_foto_sil(id){
									$.ajax({
										url:"functions/sliderden_foto_sil.php",
										data:{id:id},
										method:"POST",
										success:function(gelen){
											if(gelen == "ok"){
												alert("Kitab sliderdən silindi.");
												location.reload();
											}else{
												alert("Xəta baş verdi! Xəta: "+gelen);
												location.reload();
											}
										}
									});
								}
					    	</script>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
  if(isset($conn)){
    mysqli_close($conn);
  }
?>
</body>
</html>