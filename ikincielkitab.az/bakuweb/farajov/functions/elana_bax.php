<?php
	if(isset($_POST['id']) && is_numeric($_POST['id']) && !empty($_POST['id'])){
		include "../../../db/db.php";
		$id = $_POST['id'];

		if($conn){
			$select = "SELECT id,ad,yazar,janr,dil,veziyyet,foto,qiymet,sehife_sayi,tel_fb_link,seher,ip FROM kitablar WHERE id='$id'";
			$netice = mysqli_query($conn,$select);

			while($row = mysqli_fetch_assoc($netice)){
				echo "<div class='modal-header'>
				        <button type='button' class='close' data-dismiss='modal'>&times;</button>
				        <h4 class='modal-title'>ID : ".$row['id']." / IP : ".$row['ip']."</h4>
				      </div>
				      <div class='modal-body'>
				        <form>
						    <div class='form-group'>
						      <label>Kitabın Adı:</label>
						      <input type='text' maxlength='100' class='form-control kitabin_adi' value='".$row['ad']."' >
						    </div>
						    <div class='form-group'>
						      <label>Kitabın Yazarı:</label>
						      <input type='text' maxlength='70' class='form-control kitabin_yazari' value='".$row['yazar']."' >
						    </div>
						    <div class='form-group'>
						      <label>Açıqlama:</label>
						      <textarea class='form-control kitabin_aciqlamasi' ></textarea>
						    </div>
						    <div class='col-xs-5'>
							    <div class='form-group'>
							      <p>Janr: <strong>".$row['janr']."</strong></p>
							    </div>
							    <div class='form-group'>
							      <p>Dil: <strong>".$row['dil']."</strong></p>
							    </div>
							    <div class='form-group'>
							      <p>Vəziyyəti : <strong>".$row['veziyyet']."</strong></p>
							    </div>
							    <div class='form-group'>
							      <p>Qiymət : <strong>".$row['qiymet']." AZN</strong></p>
							    </div>
							    <div class='form-group'>
							      <p>Səhifə Sayı : <strong>".$row['sehife_sayi']."</strong></p>
							      <p>1. Lazımdırsa Şəkili yeni açılan pəncərədə kəs və pəncərəni bağla.</p>
							      <p>2. Bu səhifəni yenilə.</p>
							      <p>2. Buradakı dəyişiklikləri et və yaddaşa yaz.</p>
							    </div>
							</div>
							<div class='col-xs-7'>
								<img align='right' src='../../book_images/".$row['foto'].".jpg' width='216' height='316' class='push_src_to_save_elan'/>
								<a class='btn btn-primary sekili_kes_btn' href='img_resize/resize.php?foto=".$row['foto']."' target='_blank'>Şəkili Kəs</a>
							</div>
						    <div class='form-group'>
						      <label>Əlaqə Telefonu və ya Facebook Profil Linki:</label>
						      <input type='text' maxlength='100' class='form-control kitabin_elaqesi' value='".$row['tel_fb_link']."' >
						    </div>
						    <div class='form-group'>
						      <label>Şəhər:</label>
						      <input type='text' maxlength='50' class='form-control kitabin_seheri' value='".$row['seher']."' >
						    </div>
						</form>
				      </div>
				      <div class='modal-footer'>
				      	<button type='button' class='btn btn-danger' data-dismiss='modal' id='".$row['id']."' onclick='delete_elan(this.id)'>Elanı Sil</button>
				        <button type='button' class='btn btn-success' data-dismiss='modal' id='".$row['id']."' onclick='update_elan(this.id)'>Yaddaşa Yaz</button>
				      </div>";
			}
		}else{
			echo "Bağlantı qurulmadı";
		}
	}else{
		echo "ID adresi düzgün deyil";
	}
	if(isset($conn)){
	    mysqli_close($conn);
	}
?>
