<? session_start();

include ('conex.php');

include ('carrito.class.php');

 
  
 if (!$_POST['cantidad']) {$_POST['cantidad']=1;}
  
//producto

   $consulta="SELECT * FROM productos WHERE id='".$_POST['idpro']."';";
	 $query=mysql_query($consulta,$conex);
	  $producto=mysql_fetch_array($query);
 
	$unique_id=$producto[0];
 
//opciones

foreach ($_POST['opciones'] as &$idopcion) {
     $consulta="SELECT * FROM opcionespro WHERE id='".$idopcion."';";
	 $query=mysql_query($consulta,$conex);
	 while ($opciones=mysql_fetch_array($query)){
		
		$opcion.="<br><span style='font-size:10px;'>".$opciones['tipo'].":".$opciones['valor']."</span>" ;
		 $neto=$neto + $opciones['neto'];
		 $unique_id.=$opciones[0];
		 
	 }
}

$producto['titulo'].=$opcion;
$producto['neto']=$neto + $producto['neto'];
$mensaje="<b>Solicitud de presupuesto</B>
			  <p>Nombre: ".$_POST['nombre']
			."<p>Tel: ".$_POST['tel']
			."<p>Email: ".$_POST['email']
			."<p>Zona: ".$_POST['zona']
			."<p>Producto: ".$producto['ref']." ".$producto['titulo']
			."<p>Opciones:<p>".$opcion;
			
 
 
 

$carrito = new Carrito();
$articulo = array(
		"id"			=>		$producto[0],
		"cantidad"		=>		$_POST['cantidad'],
		"precio"		=>		$producto['neto'],
		"unique_id"		=>		$unique_id,
		 
		"nombre"		=>		$producto['titulo']
	);
	$carrito->add($articulo);
// echo  $carrito->precio_total();
 
// echo "....".$carrito->articulos_total();
 $carro = $carrito->get_content();
if($carro)
{
	
	echo "<p>&nbsp;</p><table style='font-size:12px;'><tr><td>Cant.</td><td>Producto</td><td>Neto</td></tr>";
	foreach($carro as $producto)
	{
		//echo $producto["id"];
		//echo  " ";
		//echo $producto["unique_id"];
		//echo " ";
		echo "<tr><td>".$producto["cantidad"]."</td>";
	 
		echo " <td>".$producto["nombre"]."</td>"; 
		
		echo " <td style='text-align:right;'>".$producto["precio"]."</td>"; 
		 
	}
	echo  "<tr> <td colspan='2' style='text-align:right;'> TOTAL</td><td style='text-align:right;'>".$carrito->precio_total()."</td></tr>"; 
	echo "</table>";
	
}
 ?>
 <div style="overflow:hidden;">
 <a href="/tienda/carro"  class="button_type_2 d_block  t_align_c lbrown bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Finalizar Compra</a>
 </div>
 <?
 //$carrito->destroy();
 
 
 
 //clase
 
 
?>end