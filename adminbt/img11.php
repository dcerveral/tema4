<?php
 

 include ('conex2.php');

# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT `foto11` FROM `noticias` WHERE id=".$_GET["id"]);
$row=$result->fetch_array(MYSQLI_ASSOC);

# Mostramos la imagen
header("Content-type: image/jpeg");
echo $row["foto"];
 ?>