<? include ('conex.php');


if ($_POST['email']){
 
 ?>



<?
//producto

   $consulta="SELECT * FROM productos WHERE id='".$_POST['idpro']."';";
	 $query=mysql_query($consulta,$conex);
	  $producto=mysql_fetch_array($query);
 
//opciones

foreach ($_POST['opciones'] as &$idopcion) {
     $consulta="SELECT * FROM opcionespro WHERE id='".$idopcion."';";
	 $query=mysql_query($consulta,$conex);
	 while ($opciones=mysql_fetch_array($query)){
		 
		$opcion.=$opciones['tipo'].":".$opciones['valor']."<p>" ;
		 
	 }
}

$mensaje="<b>Solicitud de presupuesto</B>
			  <p>Nombre: ".$_POST['nombre']
			."<p>Tel: ".$_POST['tel']
			."<p>Email: ".$_POST['email']
			."<p>Zona: ".$_POST['zona']
			."<p>Producto: ".$producto['ref']." ".$producto['titulo']
			."<p>Opciones:<p>".$opcion;
			
 

include ('conf.php');
 

$para      = $emailDef;
$titulo    = 'Prespuesto '.$producto['ref'];
 $cabeceras = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
	 'Content-type: text/html; charset=iso-8859-1' . "\r\n".
    'X-Mailer: PHP/' . phpversion();

	
	
	
 if (mail($para, $titulo, $mensaje, $cabeceras)) {echo '<div class="alert_box r_corners color_green success">Presupuesto enviado</div>';} else
	{echo '<div class="alert_box r_corners color_green success">ERROR no enviado.</div>';}

	
	
	$para      = $_POST['email'];
	$titulo    = 'Solicitud de Prespuesto ref:'.$producto['ref'];
	$cabeceras = 'From: ' . $emailDef . "\r\n" .
		'Reply-To: ' . $emailDef . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n".
		'X-Mailer: PHP/' . phpversion();
	mail($para, $titulo, $mensaje, $cabeceras);
}
else
{echo '<div class="alert_box r_corners color_green success"><a href="">ERROR Obligatorio su email.</A></div>';}
	?>
	
	
<p>&nbsp;</p>