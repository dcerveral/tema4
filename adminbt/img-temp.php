<?php

 include ('conex2.php');

# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT * FROM `tmp` WHERE id='1'");
$row=$result->fetch_array(MYSQLI_ASSOC);

# Mostramos la imagen
header("Content-type: image/jpeg");
echo $row["foto"];
?>