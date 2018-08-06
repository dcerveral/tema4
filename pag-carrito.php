<?
//CARRITO


//CARRITO
include ('carrito.class.php');
$carrito = new Carrito();


//ACTUALIZAR Producto
if ($_POST['unique_id']){
$articulo = array(
				"id"			=>		$_POST['id'],
				"cantidad"		=>		$_POST['cantidad'],
				"nombre"		=>		$_POST['nombre'],
				"precio"		=>		$_POST['precio'],
				"impuesto"		=>		$_POST['impuesto'],
				"peso"			=>		$_POST['peso'],
				"unique_id"		=>		$_POST['unique_id']
				 
				
			);
			
		$carrito->add($articulo);
}

//NUEVO PRODUCTO AL CARRO
if ($_POST['idpro']){
			
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
		
		 
		 

		
		$articulo = array(
				"id"			=>		$producto[0],
				"cantidad"		=>		$_POST['cantidad'],
				"nombre"		=>		$producto['titulo'],
				"precio"		=>		$producto['neto'],
				"impuesto"		=>		$producto['impuesto'],
				"peso"			=>		$producto['peso'],
				"unique_id"		=>		$unique_id
				 
				
			);
			
		$carrito->add($articulo);
		 
}
 
 $carro = $carrito->get_content();

 
//PONEMOS UN PAGO POR DEFECTO

if (!$_SESSION['idpago']){
		
		$consulta="SELECT id FROM pagos WHERE activo='1' LIMIT 1";
		$sql=mysql_query($consulta,$conex);
		$pagos=mysql_fetch_array($sql);
		$_SESSION['idpago']=$pagos[0];
		
}

//PONEMOS UN ENVIO POR DEFECTO

if (!$_SESSION['idenvios']){
		
		$consulta="SELECT id FROM envios WHERE activo='1' AND zona='".$_SESSION['zona']."' LIMIT 1";
		$sql=mysql_query($consulta,$conex);
		$envios=mysql_fetch_array($sql);
		$_SESSION['idenvios']=$envios[0];
		
}


//CAMBIAMOS PAGO Y ENVIO
	if ($_POST['idpago']){
		
		$_SESSION['idpago']=$_POST['idpago'];
	}
	
	 if ($_POST['idenvios']){
		
		$_SESSION['idenvios']=$_POST['idenvios'];
	}
	
	//Si el carrito esta vacio ponemos un error
	if ($_SESSION["carrito"]["articulos_total"]<1) {
		
		$error="Su carro esta vacio. Visite nuestra <a href='/tienda'><u>tienda</u>.</a>";
	}
?>

<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> 
		  <span class="color_dark">/</span>
			<span class="color_light">Su cesta</span>
		
		 
		</div>
	</div>
</div>


<? if ($error) { ?>
		<div class="container">
			<div style="background-color:#ffdfbf; padding:10px;"><p>&nbsp;</p>
                
                <h5>  &nbsp;  <i class=" fa fa-exclamation-triangle" style="color:red;"></i> &nbsp; <? echo $error; ?></h5> 
				<p>&nbsp;</p>
              </div>
		</div>
	<? } ?>
	
	
<div class="page_section_offset">
<div class="container">
<div class="row">
<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Su cesta</h1>
<hr class='divider_bg m_bottom_23'>

<?

	
	
	
	echo "<p>&nbsp;</p><div style='overflow-x:scroll;width:100%'> <div class='tabla' >
		<div class='tabla-tr'>
			<div class='tabla-td bold  align-center'>Cant.</div>
			<div class='tabla-td bold align-center'>Concepto</div>
			
			<div class='tabla-td bold align-center'>Imp.</div>
			<div class='tabla-td bold align-center'>Neto</div>
			
			<div class='tabla-td bold align-center'>Subtotal</div>
		</div>";
	foreach($carro as $producto)
	{
		
		if ($producto['cantidad']>0){   
				$neto=($producto["precio"] * $_SESSION['cambio']);
				$iva=$_SESSION[$producto['impuesto']];
				
				 
				
				$subtotal= $neto * $producto["cantidad"];
				$totalneto+=$subtotal;
				
				$eliva=($subtotal * $iva) /100;
				$sumaiva+=$eliva;
				$peso+=($producto["peso"] * $producto["cantidad"]);
				echo "<div class='tabla-tr'><div class='tabla-td'>
				
				
			 
				<form    method='POST' >
			 
					<input type='hidden' name='id' value='".$producto['id']."'>
					<input type='hidden' name='nombre' value=\"".$producto['nombre']."\">
					<input type='hidden' name='precio' value='".$producto['precio']."'>
					<input type='hidden' name='impuesto' value='".$producto['impuesto']."'>
					<input type='hidden' name='unique_id' value='".$producto['unique_id']."'>
					<input type='hidden' name='peso' value='".$producto['peso']."'> 
					<input type='number' name='cantidad' onchange='this.form.submit();'  style='width:60px;' value='".$producto["cantidad"]."'>
				
				</form>
				
				
				</div>";
				echo " <div class='tabla-td'>".$producto["nombre"]."</div>"; 
				 
				echo "<div class='tabla-td'>".$iva."%</div>";
				echo "<div class='tabla-td align-right'>".number_format($neto, 2, ',', ' ')." ".$_SESSION['moneda']."</div>"; 
				
				echo "<div class='tabla-td align-right'>".number_format($subtotal, 2, ',', ' ')." ".$_SESSION['moneda']."</div>
				</div>";
		}
	}
	
	
	
	
	echo  "<div class='tabla-tr'> <div class='tabla-td'></div><div class='tabla-td align-right'> Subtotal</div><div class='tabla-td'> </div><div class='tabla-td'> </div><div class='tabla-td align-right'>".number_format($totalneto, 2, ',', ' ')." ".$_SESSION['moneda']."</div></div>";
	echo  "<div class='tabla-tr'> <div class='tabla-td'></div><div class='tabla-td align-right'> Impuestos</div><div class='tabla-td'> </div><div class='tabla-td'> </div><div class='tabla-td align-right'>".number_format($sumaiva, 2, ',', ' ')." ".$_SESSION['moneda']."</div></div>";
	 
	 
	//TOTAL
	$totalfactura=$totalneto+$sumaiva;	
	 
	// Pago
	if ($_SESSION['idpago']){
		
		$consulta="SELECT * FROM pagos WHERE id=".$_SESSION['idpago'];
		$sql=mysql_query($consulta,$conex);
		$pagos=mysql_fetch_array($sql);
		$formapago=$pagos['forma'];
		$totalpago= ($pagos['pvp'] * $_SESSION['cambio']) +  (($totalfactura * $pagos['variable']) /100);
		
		 
	echo  "<div class='tabla-tr'> <div class='tabla-td'></div><div class='tabla-td align-right'> ".$pagos['forma']."</div><div class='tabla-td'> </div><div class='tabla-td'> </div><div class='tabla-td align-right'>".number_format($totalpago, 2, ',', ' ')." ".$_SESSION['moneda']."</div></div>";
	
	
	}
	
	
	// Envio
	if ($_SESSION['idenvios']){
		
		$consulta="SELECT * FROM envios WHERE id=".$_SESSION['idenvios'];
		$sql=mysql_query($consulta,$conex);
		$envios=mysql_fetch_array($sql);
		
				$formaenvio=$envios['forma'];
				
				$totalenvio= $envios['pvp']  * $_SESSION['cambio'];
		 
		 if ($envios['configura']){
				
			//CONFIGURACION AVANZADA--
				
				
				
			$configura=explode('|',$envios['configura']);
				
			foreach ($configura as $array){
				
				$array1=explode('-',$array);
				
				//echo $array1[0].'a'.$array1[1].'es'.$array1[2];
				
				//PESO
				if ($envios['tipo']=='peso'){
					
					if ($peso>=$array1[0] && $peso<=$array1[1]){$totalenvio=$array1[2] * $_SESSION['cambio'];}
					
					
				}
				//precio
				if ($envios['tipo']=='precio'){
					
					if ($totalfactura>=$array1[0] && $totalfactura<=$array1[1]){$totalenvio=$array1[2] * $_SESSION['cambio'];}
					
					
				}
				
				
				
			}
			 	
				
				 
		 }
		
	echo  "<div class='tabla-tr'> <div class='tabla-td'></div><div class='tabla-td align-right'> ".$envios['forma']."</div><div class='tabla-td'> </div><div class='tabla-td'> </div><div class='tabla-td align-right'>".number_format($totalenvio, 2, ',', ' ')." ".$_SESSION['moneda']."</div></div>";
	 
	 	}	
	 
	//pago total
	 $totalfactura2=$totalfactura + $totalpago + $totalenvio;
	 
	 //GUARDAMOS VARIABLES PARA PROCESAR PEDIDO
	 $_SESSION['pedido']['total']=$totalfactura2 / $_SESSION['cambio'];
	 $_SESSION['pedido']['neto']=$totalneto / $_SESSION['cambio'];
	 $_SESSION['pedido']['iva']=$sumaiva / $_SESSION['cambio'];
	 $_SESSION['pedido']['envio']=$totalenvio / $_SESSION['cambio'];
	 $_SESSION['pedido']['formaenvio']=$formaenvio;
	 
	 $_SESSION['pedido']['pago']=$totalpago / $_SESSION['cambio'];
	 $_SESSION['pedido']['formapago']=$formapago;
	 
	 
	  
	 
	 
	 
	 
	 echo  "<div class='tabla-tr'> <div class='tabla-td'></div><div class='tabla-td bold align-right'>TOTAL</div><div class='tabla-td'> </div><div class='tabla-td'> </div><div class='tabla-td bold align-right'>".number_format($totalfactura2, 2, ',', ' ')." ".$_SESSION['moneda']."</div></div>";
	
 
 
	echo "</div></div>";
	

 ?>
 

 
 
 <p>&nbsp;</p><p>&nbsp;</p><h5>FORMAS DE PAGO Y ENVIO</h5><hr class='divider_bg m_bottom_23'>

	 
	<? if ($pagos['forma']){ echo '<u>'.$pagos['forma'].'</u>: '.$pagos['mail'].'<p>&nbsp;</p>'; } ?>
	<? if ($envios['forma']){ echo '<u>'.$envios['forma'].'</u>: '.$envios['mail'].'<p>&nbsp;</p>'; } ?>
	
	Puede cambiar su forma de pago y envio antes de continuar.
 
 
 
 
 
 <? if ($_SESSION['zona'] && $_SESSION['idpago'] && $_SESSION['idenvios']) { ?>
   
 <div style="overflow:hidden;">
 <a href="/tienda/cliente"  class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Continuar</a>
 </div>

 <? } ?>
 
 </main>
 
 <aside class="col-lg-3 col-md-3 col-sm-3 m_bottom_40 m_xs_bottom_0 p_top_4">
<!--categories widget-->
<section class="m_bottom_30">




 <? if ($_SESSION['zona'] && $_SESSION['idpago'] && $_SESSION['idenvios']) { ?>
   
  

 <? } ELSE { ?>
 
 <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Procesar Pedido</h5>
<hr class="divider_bg m_bottom_23">
Antes de continuar, seleccione su zona de envio, forma de pago y m&eacute;todo de envio.
 <? } ?>

<p>&nbsp;</p>


<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Su Zona</h5>
<hr class="divider_bg m_bottom_23">

 Indique su zona de compra.
<p>
<form method="POST">
	<select name="zona" style="width:100%;" onchange="this.form.submit();">
	 
	<? $consulta="SELECT id,zona FROM zonas WHERE activo=1;";
		$sql=mysql_query($consulta,$conex);
		while ($zona=mysql_fetch_array($sql)){
			
			echo '<option value="'.$zona[0].'"';
			if ($_SESSION['zona']==$zona[0]) {echo ' selected';}
			echo '>'.$zona[1].'</option>';
			
		}
	?>
</select>
 </form>
 
<p>&nbsp;</p>

<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Envio</h5>
<hr class="divider_bg m_bottom_23">

 Indique forma de envio.
<p>
 
  <?
	//Seleccionamos forma de envio
	
	$consulta="SELECT * FROM envios WHERE activo='1' AND zona='".$_SESSION['zona']."';";
	
	 
	$sql=mysql_query($consulta,$conex);
	
	
	echo '<form  method="POST">
		<select name="idenvios" style="width:100%" onchange="this.form.submit();">
			 ';
	while ($envios=mysql_fetch_array($sql)){
		
		echo '<option value="'.$envios[0].'"';
		if ($_SESSION['idenvios']==$envios[0]) {echo " selected";}
		echo '>'.$envios ['forma'].'</option>'; 
	}
	echo '</select></form>';

	
 ?> 
 
 
 
<p>&nbsp;</p>

<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Pago</h5>
<hr class="divider_bg m_bottom_23">

 Selecione la forma de pago
<p> 
 
 
 <?
	//Seleccionamos forma de pago
	 
	$consulta="SELECT * FROM pagos WHERE activo='1';";
	$sql=mysql_query($consulta,$conex);
	
	
	echo '<form action="#pago" method="POST">
		<select name="idpago" style="width:100%" onchange="this.form.submit();">
			 ';
	while ($pagos=mysql_fetch_array($sql)){
		
		echo '<option value="'.$pagos[0].'"';
		if ($_SESSION['idpago']==$pagos[0]) {echo " selected";}
		echo '>'.$pagos ['forma'].'</option>'; 
	}
	 echo '</select>';
	
	
	
	
	
 ?> 
  
<p>&nbsp;</p>

 <? if ($_SESSION['zona'] && $_SESSION['idpago'] && $_SESSION['idenvios']) { ?>
   
 <div style="overflow:hidden;">
 <a href="/tienda/cliente"  class="button_type_2 d_block  t_align_c   bg_green tr_all second_font fs_medium tt_uppercase " style="background-color: green; margin:5px;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Continuar</a>
 </div>

 <? } ?>
 


	
 
	 	 
		 
</section>

</aside>
</div>
</div>
</div>
