<?php
 
if (!$_GET['tabla']) {$_GET['tabla']="noticias";}
if ($_GET['foto']==0 || !$_GET['foto']) {$foto="foto";}else{$foto="foto".$_GET['foto'];}
	include ('conf.php');
 include ('conex2.php');

 
# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT `foto".$_GET['foto']."` FROM `".$_GET['tabla']."` WHERE id=".$_GET["id"]);
$row=$result->fetch_array(MYSQLI_ASSOC);

# Mostramos la imagen
header("Content-type: image/jpeg");
echo $row["foto".$_GET['foto']];
 ?>
