<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Clientes" href="/clientes" class="sc_hover">Clientes</a> 
		  <span class="color_dark">/</span>
			<span class="color_light"><? echo $_SESSION['cliente']['nombre']; ?></span>
		
		 
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

<aside class="col-lg-2 col-md-3 col-sm-12 m_bottom_40 m_xs_bottom_0 p_top_4">
<!--categories widget-->
<section class="m_bottom_30">

<p>&nbsp;</p>
 

<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Men&uacute;</h5>
<hr class="divider_bg m_bottom_23">
 
	 	<ol>
			<li><a  href="#pedidos" > <i class="fa fa-circle-o" aria-hidden="true"></i> Pedidos</a></li>
			<li><a  href="#cliente" ><i class="fa fa-circle-o" aria-hidden="true"></i> Datos Cliente</a></li>
			<li><a  href="#usuario" > <i class="fa fa-circle-o" aria-hidden="true"></i> Datos Acceso</a></li>
			<li><a  href="/clientes/salir" > <i class="fa fa-circle-o" style="color:red" aria-hidden="true"></i> Salir</a></li>
		</ol>
		 
</section>

</aside>


<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10" >
<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">&Aacute;rea de Cliente</h1>
<hr class='divider_bg m_bottom_23'>



<!--tabs-->
<div class="tabs styled_tabs m_bottom_18">
	<nav class="second_font">
		<ul class="hr_list">
			<li class="m_right_3"><a title="Pedidos" href="#pedidos" class="color_light border_light_3 d_block">Pedidos</a></li>
			
			<li class="m_right_3"><a title="Clientes" href="#cliente" class="color_light border_light_3 d_block">Cliente</a></li>
			<li class="m_right_3"><a title="Usuario" href="#usuario" class="color_light border_light_3 d_block">Usuario</a></li>
	
		</ul>
	</nav>
	<hr class="d_xs_none">
	<div id="pedidos" class="fw_light tab_content">
	
		 
	<div style="overflow-x:scroll;width:100%"> 
		<div class="tabla">
		
			<div class="tabla-tr">
				<div class="tabla-td bold">Pedido</div>
				<div class="tabla-td bold" >Fecha</div>
				<div class="tabla-td bold">Pago</div>
				<div class="tabla-td bold">Envio</div>
				<div class="tabla-td bold">Importe</div>
				<div class="tabla-td bold">Estado</div>
				 
			</div>
			
			
			<? 
			
			$consulta="SELECT * FROM pedidos WHERE idcliente='".$_SESSION['cliente']['id']."' order by id DESC LIMIT 20; ";
			$sql=mysql_query($consulta,$conex);
			while ($pedido=mysql_fetch_array($sql)){
				
				echo '<div class="tabla-tr">';
					echo '<div class="tabla-td align-center">'.$pedido[0].'</div>';
					echo '<div class="tabla-td align-center">'.$pedido['fecha'].'</div>';
					echo '<div class="tabla-td align-center">'.$pedido['pago'].'</div>';
					echo '<div class="tabla-td align-center">'.$pedido['envio'].'</div>';
					echo '<div class="tabla-td align-center">'.$pedido['importepago'].' '.$pedido['divisapago'].'</div>';
					echo '<div class="tabla-td   bold">'.$pedido['estado'].'</div>';
					
				
				echo '</div>';
				
			}
			
			
	
			?>
	
		</div>
		
	</div>
	
</div>
	<div id="cliente" class="fw_light tab_content">
		Los cambios de datos de facturaci&oacute;n solo afectar&aacute; a los  pedidos en curso y nuevos pedidos.
		<p>&nbsp;</p>
		<form action="/clientes#cliente" method="post" class="m_bottom_15">
				<input type="hidden" name="accion" value="actualizarcliente">
					<ul>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="cif" class="second_font m_bottom_4 d_inline_b fs_medium">CIF/DNI</label>
							<input type="text" id="cif" name="cif" value="<? echo $_SESSION['cliente']['cif']; ?>" class="w_full tr_all" placeholder="CIF/DNI" required>
						</li>
						<li class="m_bottom_15 col-lg-8 col-md-8 col-sm-12">
							<label for="nombre" class="second_font m_bottom_4 d_inline_b fs_medium">Nombre/Empresa</label>
							<input type="text" id="nombre" name="nombre" value="<? echo $_SESSION['cliente']['nombre']; ?>" class="w_full tr_all" placeholder="Nombre/Empresa" required>
						</li>
						<li class="m_bottom_15 col-lg-12 col-md-12 col-sm-12">
							<label for="direccion" class="second_font m_bottom_4 d_inline_b fs_medium">Direcci&oacute;n</label>
							<input type="text" id="direccion" name="direccion" value="<? echo $_SESSION['cliente']['direccion']; ?>" class="w_full tr_all" placeholder="Direcci&oacute;n" required>
						</li>
						 
						<li class="m_bottom_15 col-lg-3 col-md-3 col-sm-12">
							<label for="cp" class="second_font m_bottom_4 d_inline_b fs_medium">C&oacute;digo Postal</label>
							<input type="text" id="cp" name="cp" value="<? echo $_SESSION['cliente']['cp']; ?>" class="w_full tr_all" placeholder="C&oacute;digo Postal" required>
						</li>
						<li class="m_bottom_15 col-lg-3 col-md-3 col-sm-12">
							<label for="ciudad" class="second_font m_bottom_4 d_inline_b fs_medium">Ciudad</label>
							<input type="text" id="ciudad" name="ciudad" value="<? echo $_SESSION['cliente']['ciudad']; ?>" class="w_full tr_all" placeholder="Poblaci&oacute;n" required>
						</li>
						<li class="m_bottom_15 col-lg-3 col-md-3 col-sm-12">
							<label for="provincia" class="second_font m_bottom_4 d_inline_b fs_medium">Provincia</label>
							<input type="text" id="provincia" name="provincia" value="<? echo $_SESSION['cliente']['provincia']; ?>" class="w_full tr_all" placeholder="Provincia" required>
						</li>
						<li class="m_bottom_15 col-lg-3 col-md-3 col-sm-12">
							<label for="telefono" class="second_font m_bottom_4 d_inline_b fs_medium">Tel&eacute;fono</label>
							<input type="text" id="telefono" name="telefono" value="<? echo $_SESSION['cliente']['telefono']; ?>" class="w_full tr_all" placeholder="Tel&eacute;fono fijo y/o m&oacute;vil" required>
						</li>
						 
						<li>
						<button onclick="this.form.submit();" type="submit" class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;">  Actualizar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>

						</li>
						
					</ul>
				
				</form>
	
	</div>
	<div id="usuario" class="fw_light tab_content">
	
		Usted puede cambiar los datos de acceso a cliente. Los cambios ser&aacute;n efectivos en el siguiente inicio de sesi&oacute;n.
		 Se le enviar&aacute; nuevas instrucciones para confirmar que usted es el propietario del nuevo correo:
		 <p>&nbsp;</p>
		 <form action="/clientes#usuario" method="post" class="m_bottom_15">
				 
					<ul>
						 
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">Correo</label>
							<input type="email" id="email" name="cambiaremail" value="<? echo $_SESSION['cliente']['email']; ?>" class="w_full tr_all" placeholder="Correo" required>
						</li>
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="clave" class="second_font m_bottom_4 d_inline_b fs_medium">Clave</label>
							<input type="password" id="clave" name="cambiarclave" value="" class="w_full tr_all" placeholder="Clave" required>
						</li>
						
						
						<li><button onclick="this.form.submit();" type="submit"   class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: purple; margin:5px;">  Cambiar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
						</li>
					</ul>
				
				</form>
	
	</div>
	
</div>













 </main>
 
 
</div>
</div>
</div>