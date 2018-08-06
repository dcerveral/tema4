<? 

session_start();

include ('conex.php');

 

 
 $neto=$_POST['neto'];
 
foreach ($_POST['opciones'] as &$idopcion) {
     $consulta="SELECT * FROM opcionespro WHERE id='".$idopcion."';";
	 $query=mysql_query($consulta,$conex);
	 while ($opciones=mysql_fetch_array($query)){
		 
		 
		 echo "<input type='hidden' name='opciones[]' value='".$opciones[0]."'>";
		 echo "<p> * ".$opciones['tipo'].": ".$opciones['valor'];
			if ($neto>0) {echo " ".$opciones['neto'] * $_SESSION['cambio'] ." ".$_SESSION['moneda'];
						$neto=$neto + $opciones['neto'];} 
			echo "</p>";
		
	 }
	 
}
if ($neto>0) {
	echo "<p style='text-align:right;width:100%;font-weight:bold;'>PVP: "; echo $neto * $_SESSION['cambio']; echo "  ".$_SESSION['moneda']."</p>";
	if ($_POST['tipo']=="catalogo") {echo "<p style='text-align:right;width:100%;font-weight:light;'><sup> * No incluye IVA ni costes de envio y pago.</sup></p>";}
}
?>
 