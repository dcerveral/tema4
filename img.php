<?php
 
if (!$_GET['tabla']) {$_GET['tabla']="noticias";}
if ($_GET['foto']==0 || !$_GET['foto']) {$foto="foto";}else{$foto="foto".$_GET['foto'];}
	
 include ('conex2.php');

 
# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT `foto".$_GET['foto']."` FROM `".$_GET['tabla']."` WHERE id=".$_GET["id"]);
$row=$result->fetch_array(MYSQLI_ASSOC);

if ( $_GET['ratio']=="1:1"){
		$filename=$row["foto".$_GET['foto']];
		list($w, $h, $type, $attr) = getimagesizefromstring($filename);
		$src_im = imagecreatefromstring($filename);
		$src_x = '0';   // comienza x
		$src_y = '0';   // comienza y
		
		$dst_x = '0';   // termina x
		$dst_y = '0';   // termina y

		 
			if ($h>$w){
				$src_w = $w; // ancho
				$src_h = $w;; // alto
			} else {
				$src_w = $h; // ancho
				$src_h = $h; // alto
			}
			
		 
		
		
		
		$dst_im = imagecreatetruecolor($src_w, $src_h);
		$white = imagecolorallocate($dst_im, 255, 255, 255);
		imagefill($dst_im, 0, 0, $white);

		imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);

		header("Content-type: image/png");
		imagepng($dst_im);
		imagedestroy($dst_im);
} 


if ( $_GET['ratio']=="16:9"){
		$filename=$row["foto".$_GET['foto']];
		list($w, $h, $type, $attr) = getimagesizefromstring($filename);
		$src_im = imagecreatefromstring($filename);
		$src_x = '0';   // comienza x
		$src_y = '0';   // comienza y
		
		$dst_x = '0';   // termina x
		$dst_y = '0';   // termina y
 
 
			if ($h>$w){
				$src_w = $w; // ancho
				$src_h = (9 * $w) / 16; // alto
			} else {
				$src_w = $w ; // ancho
				$src_h = (9 * $w) / 16; // alto
			}
			
		 
		
		
		
		$dst_im = imagecreatetruecolor($src_w, $src_h);
		$white = imagecolorallocate($dst_im, 255, 255, 255);
		imagefill($dst_im, 0, 0, $white);

		imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);

		header("Content-type: image/png");
		imagepng($dst_im);
		imagedestroy($dst_im);
} 

if ( $_GET['ratio']=="16:5"){
		$filename=$row["foto".$_GET['foto']];
		list($w, $h, $type, $attr) = getimagesizefromstring($filename);
		$src_im = imagecreatefromstring($filename);
		$src_x = '0';   // comienza x
		$src_y = '0';   // comienza y
		
		$dst_x = '0';   // termina x
		$dst_y = '0';   // termina y
 
 
			if ($h>$w){
				$src_w = $w; // ancho
				$src_h = (5 * $w) / 16; // alto
			} else {
				$src_w = $w ; // ancho
				$src_h = (5 * $w) / 16; // alto
			}
			
		 
		
		
		
		$dst_im = imagecreatetruecolor($src_w, $src_h);
		$white = imagecolorallocate($dst_im, 255, 255, 255);
		imagefill($dst_im, 0, 0, $white);

		imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);

		header("Content-type: image/png");
		imagepng($dst_im);
		imagedestroy($dst_im);
} 

if (!$_GET['ratio']){








# Mostramos la imagen
 header("Content-type: image/jpeg");
 echo $row["foto".$_GET['foto']];
 
}
 ?>
