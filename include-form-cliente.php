
<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> <span class="color_dark">/</span>
		<a title="Inicio" href="/tienda/carrito" class="sc_hover">Cesta</a> <span class="color_dark">/</span>
			<span class="color_light">Datos Cliente</span>
		
		 
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
			<main class="col-lg-8 col-md-8 col-sm-8 m_bottom_30 m_xs_bottom_10">
				<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Datos Cliente</h1>
				<hr class='divider_bg m_bottom_23'>
				Indique los datos necesarios para la emisi&oacute;n de la factura, si usted ya es cliente,
				puede <a href="#logincli"><u>iniciar sesi&oacute;n</u></a> para evitar introducir los datos nuevamente.
				<p>&nbsp;</p>
				<form action="/tienda/cliente" method="post" class="m_bottom_15">
				<input type="hidden" name="accion" value="nuevo">
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
						<li class="m_bottom_15 col-lg-5 col-md-5 col-sm-12">
							<label for="ciudad" class="second_font m_bottom_4 d_inline_b fs_medium">Ciudad</label>
							<input type="text" id="ciudad" name="ciudad" value="<? echo $_SESSION['cliente']['ciudad']; ?>" class="w_full tr_all" placeholder="Poblaci&oacute;n" required>
						</li>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="provincia" class="second_font m_bottom_4 d_inline_b fs_medium">Provincia</label>
							<input type="text" id="provincia" name="provincia" value="<? echo $_SESSION['cliente']['provincia']; ?>" class="w_full tr_all" placeholder="Provincia" required>
						</li>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="telefono" class="second_font m_bottom_4 d_inline_b fs_medium">Tel&eacute;fono</label>
							<input type="text" id="telefono" name="telefono" value="<? echo $_SESSION['cliente']['telefono']; ?>" class="w_full tr_all" placeholder="Tel&eacute;fono fijo y/o m&oacute;vil" required>
						</li>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">E-mail</label>
							<input type="email" id="email" name="email" value="<? echo $_SESSION['cliente']['email']; ?>" class="w_full tr_all" placeholder="Correo electr&oacute;nico" required>
						</li>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="clave" class="second_font m_bottom_4 d_inline_b fs_medium">Clave <sup>Para nuevos pedidos</sup></label>
							<input type="password" id="clave" name="clave" value="<? echo $_SESSION['cliente']['clave']; ?>" class="w_full tr_all" placeholder="Clave de acceso" required>
						</li>
						<li>
						<button onclick="this.form.submit();" type="submit" class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;">  Continuar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>

						</li>
						
					</ul>
				
				</form>
				
				
				
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
						
						
						
					</ul>
			<a name="logincli"></a>
					<p>&nbsp;</p>
					
					 <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Login</h5>
					<hr class="divider_bg m_bottom_23">
						
						Si ya es cliente puede iniciar sesi&oacute;n para evitar introducir sus datos:
					<p>&nbsp;</p>
					<form action="/tienda/cliente" method="post" class="m_bottom_15 ">
					<input type="hidden" name="accion" value="login">
					<ul>
						<li class="m_bottom_15 col-lg-6 col-md-6 col-sm-12">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">E-mail</label>
							<input type="email" id="email" name="email" value="<? echo $_SESSION['cliente']['email']; ?>" class="w_full tr_all" placeholder="Correo electr&oacute;nico" required>
						</li>
						<li class="m_bottom_15 col-lg-6 col-md-6 col-sm-12">
							<label for="clave" class="second_font m_bottom_4 d_inline_b fs_medium">Clave </label>
							<input type="password" id="clave" name="clave" value="<? echo $_SESSION['cliente']['clave']; ?>" class="w_full tr_all" placeholder="Clave de acceso" required>
						</li>
					</ul>
				<button type="submit" class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: purple; margin:5px;"> <i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</button>

				</form>
				

<a name="recordarclave"></a>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					
					 <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Recordar clave</h5>
					<hr class="divider_bg m_bottom_23">
						
						Si olvido su clave, indique su mail y le enviaremos su clave de acceso:
					<p>&nbsp;</p>
					<form action="/tienda/cliente" method="post" class="m_bottom_15 ">
					<input type="hidden" name="accion" value="recordar">
					<ul>
						<li class="m_bottom_15 col-lg-12 col-md-12 col-sm-12">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">E-mail</label>
							<input type="email" id="email" name="email" value="<? echo $_SESSION['cliente']['email']; ?>" class="w_full tr_all" placeholder="Correo electr&oacute;nico" required>
						</li>
						 
					</ul>
				<button type="submit" class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: orange; margin:5px;"> <i class="fa fa-send" aria-hidden="true"></i> Enviar</button>

				</form>			
					
				</section>
			</aside>
		</div>
	</div>
</div>