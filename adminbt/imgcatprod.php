<?php

 include ('conex2.php');

# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT * FROM `categoriasproductos` WHERE id=".$_GET["id"]);
$row=$result->fetch_array(MYSQLI_ASSOC);

# Mostramos la imagen
header("Content-type: image/jpeg");
echo $row["foto"];
?>