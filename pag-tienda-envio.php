<?

$INCLUDE="include-form-envio.php";

if ($_POST['accion']=="envio"){
		 
				 
				 $_SESSION['enviara']['nombre']=$_POST['nombre'];
				 $_SESSION['enviara']['direccion']=$_POST['direccion'];
				 $_SESSION['enviara']['cp']=$_POST['cp'];
				 $_SESSION['enviara']['ciudad']=$_POST['ciudad'];
				 $_SESSION['enviara']['provincia']=$_POST['provincia'];
				 $_SESSION['enviara']['notas']=$_POST['provincia'];
				 
	$INCLUDE="include-pagar-pedido.php";
				 
}


INCLUDE ($INCLUDE); 


?>