<?php
	if(isset($_POST['id']) && is_numeric($_POST['id']) && !empty($_POST['id'])){
		include "../../../db/db.php";
		$id = $_POST['id'];

		if($conn){

			$select_img_for_unlink = "SELECT foto FROM kitablar WHERE id='$id'";
			$netice_select_img = mysqli_query($conn,$select_img_for_unlink);
			while($row = mysqli_fetch_assoc($netice_select_img)){
				$img_unlink = $row['foto'];
			}

			$delete = "DELETE FROM kitablar WHERE id='$id'";
			$netice = mysqli_query($conn,$delete);

			if($netice){
				unlink("../../../book_images/".$img_unlink.".jpg");
				echo "ok";
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