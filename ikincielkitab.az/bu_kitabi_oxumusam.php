<?php
	if(isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])){
		$id = $_POST['id'];
		include "db/db.php";

		if($conn){		
			$kitabi_sec = "SELECT oxunma_sayi FROM kitablar WHERE id='$id'";
	        $netice_kitabi_sec = mysqli_query($conn,$kitabi_sec);
	        while($row = mysqli_fetch_assoc($netice_kitabi_sec)){
	        	$yeni_oxunma_sayi = $row['oxunma_sayi']+1;
	            $update_son_baxilma = "UPDATE kitablar SET oxunma_sayi='$yeni_oxunma_sayi' WHERE id='$id'";
	            $netice_son_baxilma = mysqli_query($conn,$update_son_baxilma);
	        }
		}
	}
	if(isset($conn)){
	    mysqli_close($conn);
	}
?>