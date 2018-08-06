<?

//PROCESAMOS SI HAY Productos

if ($_SESSION["carrito"]["articulos_total"])   {

	$consulta="SELECT * FROM pagos WHERE id='".$_SESSION['idpago']."' LIMIT 1";
	$sql=mysql_query($consulta,$conex);
	$pago=mysql_fetch_array($sql);
	 
	$moneda=strtoupper($_SESSION['moneda']);
	if ($_SESSION['moneda']=="€" || $_SESSION['moneda']=="&euro;" || $_SESSION['moneda']=="â‚¬") {$moneda="EUR";}
	if ($_SESSION['moneda']=="$") {$moneda="USD";}			
	
	
	//$nota="Se realizara el pago por un importe de  ".number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, '.', '')."  ".$moneda;
	
	//Ahora vamos a guardar los detalles del pedido, siempre y cuando existan productos en la caja
	
	$consulta="INSERT INTO  `pedidos` (`id`, `idcliente`, `enviara`, `estado`, `fecha`, `envio`,
	`enviopvp`, `pago`, `pagopvp`, `neto`, `iva`, `total`, `notacliente`, `notaproveedor`, `nombre`,
	`direccion`, `cp`, `ciudad`, `provincia`, `pais`, `zona`, `divisapago`, `importepago`, `idpago`)
	
	VALUES (NULL, '". $_SESSION['cliente']['id']."', '', 'Pendiente', CURRENT_DATE(), '".$_SESSION["pedido"]["formaenvio"]."',
	'".$_SESSION['pedido']['envio']."', '".$_SESSION['pedido']['formapago']."', '".$_SESSION['pedido']['pago']."', '". $_SESSION['pedido']['neto']."', '". $_SESSION['pedido']['iva']."', '". $_SESSION['pedido']['total']."', '".$_SESSION['enviara']['notas']."', '".$nota."', '".$_SESSION['enviara']['nombre']."',
	'".$_SESSION['enviara']['direccion']."', '".$_SESSION['enviara']['cp']."', '".$_SESSION['enviara']['ciudad']."', '".$_SESSION['enviara']['provincia']."', '', '".$_SESSION['zona'] ."' ,'".$moneda."','".$_SESSION["pedido"]["total"] * $_SESSION['cambio']."', '".$_SESSION['idpago'] ."');";
	
	mysql_query($consulta,$conex);
	
	//Obtenemos el id del pedido
	$IDPEDIDO=mysql_insert_id();
	
	//Ahora vamos a guardar el pedido
	
	include ('carrito.class.php');
		$carrito = new Carrito();
		$carro = $carrito->get_content();
	 
			foreach($carro as $producto)
	{
		
		if ($producto['cantidad']>0){   
				$neto=$producto["precio"];
				$iva=$_SESSION[$producto['impuesto']];
				$cantidad=$producto["cantidad"];
				$ref=$producto['id'];
				$producto=$producto['nombre'];
				 
				 $listado.=" - ".$producto." <p>";
				 
				$consulta="INSERT INTO  `lineas` (`id`, `idpedido`, `cantidad`, `ref`, `producto`, `neto`, `iva`, `idproducto`, `principal`)
						VALUES (NULL, '".$IDPEDIDO."', '".$cantidad."', '', '".strip_tags(str_replace('<br>',' -', $producto))."', '".$neto."', '".$iva."', '".$ref."', 'Producto');";
			
				mysql_query($consulta,$conex);
		}
	}
		
	//mostramos mensaje de pago (despúes borraremos session).

?>

<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda/cliente" class="sc_hover">Cliente</a> <span class="color_dark">/</span>
		 	<span class="color_light">Pagar</span>
		
		 
		</div>
	</div>
</div>

	 

<div class="page_section_offset">
	<div class="container">
		<div class="row">
			<main class="col-lg-8 col-md-8 col-sm-8 m_bottom_30 m_xs_bottom_10">
				<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Finalizar y pagar</h1>
				<hr class='divider_bg m_bottom_23'>
				
				Su pedido est&aacute; pendiente de pago, le hemos enviado un mail a su correo con los detalles
				de su pedido.
				<p>&nbsp;</p>
				
				<? 
				
				if ($pago['tipo']=="transferencia"){ 
				
				
				$comopagar='Puede realizar el pago mediante un ingreso/transferencia,
						con los siguientes datos:
						<p>&nbsp;</p>
						<ul class="m_bottom_14">
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Cuenta:</span> <span class="fw_light">'.$pago['configura'].'</span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Importe:</span> <span class="fw_light">'.number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, ',', ' ').' '.$moneda.'</span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Concepto:</span> <span class="fw_light">Pedido #'.$_IDPEDIDO.'</span></li>
						 
						
						
					</ul>';
				
				?>

					<div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_xs_bottom_10" style="background-color:#ffdfbf; padding:20px;"><p>&nbsp;</p>
                
						<h4> <i class="fa fa-university" aria-hidden="true"></i> Instrucciones de pago</h4>  
							<p>&nbsp;</p>
						Para completar el pedido, debe de realizar un ingreso/transferencia,
						con los siguientes datos:
						<p>&nbsp;</p>
						<ul class="m_bottom_14">
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">N&ordm; Cuenta:</span> <span class="fw_light"><? echo $pago['configura']; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Importe:</span> <span class="fw_light"><? echo number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, ',', ' '); ?> <? echo $_SESSION['moneda']; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Concepto:</span> <span class="fw_light">Pedido #<? echo $IDPEDIDO; ?></span></li>
						 
						
						
					</ul>
						
					
					</div>
				<p> 

						Puede ver el estado de su pedido desde el <a href="/clientes"><u>area de clientes</u></A>
					</p>	
				<? } ?>
				
				<? if ($pago['tipo']=="paypal"){

				
				$botonpaypal='https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$pago['configura'].'&item_name=Pedido_'.$IDPEDIDO.'&item_number='.$_IDPEDIDO.'&currency_code='.$moneda.'&no_note=0&no_shipping=1&amount='.number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, '.', '').'&return='.urlencode('https://'.$dominio.'/paypal/return').'&cancel_return='. urlencode('https://'.$dominio.'/paypal/cancel').'&notify_url='.urlencode ('https://'.$dominio.'/PayPal.php').'';
					
				  
					
					$comopagar='Puede pagar ahora mediante Paypal/tarjeta, haciendo clic en el siguiente enlace<p>
					
					<center><b><a style="font-size:16px;" href="'.$botonpaypal.'">Pagar Ahora</a><b></center>
					
					<p>
					<hr>
					Recuerda: Nosotros no guardamos datos de su tarjeta de credito.
					
					';
 
			 
				?>
				
				<p>&nbsp;</p>
				
				Para completar el pedido, por favor acceda a nuestra plataforma de pago:
				<p>&nbsp;</p>
				
				 <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					
					 
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="<? echo $pago['configura']; ?>">
					<input type="hidden" name="item_name" value="Pedido_<? echo $IDPEDIDO; ?>">
					<input type="hidden" name="item_number" value="<? echo $_SESSION['idpedido']; ?>">
					<input type="hidden" name="currency_code" value="<? echo $moneda; ?>">
					<input type="hidden" value="0" name="no_note"/>
					<input type="hidden" value="1" name="no_shipping"/>
					<input type="hidden" name="amount" value="<? echo number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, '.', ''); ?>">
					<input type="hidden" name="return" value="https://<? echo $dominio; ?>/paypal/return">
					<input type="hidden" name="cancel_return" value="https://<? echo $dominio; ?>/paypal/cancel">
					<input type="hidden" name="notify_url" value="https://<? echo $dominio; ?>/PayPal.php">
					<button type="submit" class="button_type_2 d_block  t_align_c   bg_green tr_all second_font fs_medium tt_uppercase" style="float:right;background-color: purple; margin:5px;">Pagar y finalizar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				</form>
				 
				<? } ?>
		 
				<div style="clear:both"></div>
				
				
				
			</main>
			
			 <aside class="col-lg-4 col-md-4 col-sm-4 m_bottom_40 m_xs_bottom_0 p_top_4">
				 
				<section class="m_bottom_30">
				
					 <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Su Pedido</h5>
					<hr class="divider_bg m_bottom_23">
						 
  
					<ul class="m_bottom_14">
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Cesta:</span> <span class="fw_light"><? echo $_SESSION["carrito"]["articulos_total"]; ?> articulos</span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Total:</span> <span class="fw_light"><? echo number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, ',', ' '); ?> <? echo $_SESSION['moneda']; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">F. Pago:</span> <span class="fw_light"><? echo $_SESSION["pedido"]["formapago"]; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">F. Envio:</span> <span class="fw_light"><? echo $_SESSION["pedido"]["formaenvio"]; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Zona:</span> <span class="fw_light"><? echo $_SESSION['nombrezona']; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Cliente:</span> <span class="fw_light"><? echo $_SESSION["cliente"]["nombre"]; ?></span></li>
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Enviar a:</span> <span class="fw_light"><? echo $_SESSION["enviara"]["nombre"]; ?></span></li>
						
						
						
					</ul>
		
		
				


				
					
				</section>
			</aside>
		</div>
	</div>
</div>

<? //enviamos mensaje a la tienda como que tiene un nuevo pedido pendiente de procesar

		 
	// Varios destinatarios
	$para  = $_SESSION['cliente']['email']; 
	 

	// título
	$titulo = 'Pedido #'.$IDPEDIDO." en ".$dominio;

	// mensaje
	$mensaje = '
	<html>
	<head>
	  <title>Datos de su pedido</title>
	</head>
	<body>
	   
	   Hemos recibido su pedido #'.$IDPEDIDO.' en '.$dominio.'.
	   
	   <p>
	   Estos son los datos de pedido:<p>
	   
	   Productos en su cesta:
	   <p>
	   '.$listado.'
	   
	   <p>
	   Importe total: '.number_format(($_SESSION["pedido"]["total"] * $_SESSION['cambio']), 2, '.', '').' '.$moneda.'<p>
	   
	   <p>
	   Si usted no ha realizado el pago de su pedido, puede pagarlo ahora:
	   <p>
	   '.$comopagar.'
	   
	   <p>&nbsp;</p>
	   </b>Gracias por su compra</b>
	</body>
	</html>
	';

	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Cabeceras adicionales
	$cabeceras .= 'To: '. $_SESSION['cliente']['nombre'].' <'. $_SESSION['cliente']['email'].'>' . "\r\n";
	$cabeceras .= 'From: ' . $emailDef . "\r\n";
	$cabeceras .= 'Bcc: '.$emailDef.''. "\r\n";

	// Enviarlo
 mail($para, $titulo, $mensaje, $cabeceras);
 
 $carro = $carrito->destroy();
}


else {
	//AQUI NO HAY NADA MOSTRAMOS ERROR
	?>
	
	<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> <span class="color_dark">/</span>
		 	<span class="color_light">Pedido procesado</span>
		
		 
		</div>
	</div>
	
	<div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_xs_bottom_10" style="background-color:#ffdfbf; padding:20px;"><p>&nbsp;</p>
                
						<h4> <i class="fa fa-ban" aria-hidden="true"></i> Pedido completado</h4>  
							<p>&nbsp;</p>
						Su pedido ya ha sido procesado, usted puede ver el estado de su pedido
						desde su <a href='/clientes'><u>area de cliente</u></a>
						
						
					
					</div>
</div>

	<?
}

?>