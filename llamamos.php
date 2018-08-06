<?php

include ('conf.php');
 

$para      = $emailDef;
$titulo    = 'Formulario de contacto';
$mensaje   = 'Datos de contacto: '.$_POST['name'].$_POST['nombre']." ".$_POST['email']." ".$_POST['telefono'].$_POST['telephone']." ".$_POST['consulta'];
$cabeceras = 'From: ' . $emailDef . "\r\n" .
    'Reply-To: ' . $emailDef . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($para, $titulo, $mensaje, $cabeceras)) {echo "1";} else {echo "0";}
?>