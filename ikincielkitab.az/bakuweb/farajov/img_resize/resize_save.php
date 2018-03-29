<?php
$hedef_x = 0;   // X-coordinate of destination point
$hedef_y = 0;   // Y-coordinate of destination point

$menbe_x = $_POST['x']; // Crop Start X position in original image
$menbe_y = $_POST['y']; // Crop Srart Y position in original image

$hedef_w = $_POST['w']; // Thumb width
$hedef_h = $_POST['h']; // Thumb height

$menbe_w = $_POST['w']; // Crop end X position in original image
$menbe_h = $_POST['h']; // Crop end Y position in original image

$foto = $_POST['foto'];
// Creating an image with true colors having thumb dimensions (to merge with the original image)
$hedef_foto = imagecreatetruecolor($hedef_w, $hedef_h);
// Get original image
$menbe_foto = imagecreatefromjpeg('../../../book_images/'.$foto.'.jpg');
// Cropping
imagecopyresampled($hedef_foto,$menbe_foto,$hedef_x,$hedef_y,$menbe_x,$menbe_y, $menbe_w, $menbe_h,$hedef_w, $hedef_h);
// Saving
$done = imagejpeg($hedef_foto, '../../../book_images/'.$foto.'.jpg');
?>