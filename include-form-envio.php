 
<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> <span class="color_dark">/</span>
		<a title="Inicio" href="/tienda/carrito" class="sc_hover">Cesta</a> <span class="color_dark">/</span>
			<span class="color_light">Envio</span>
		
		 
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
				<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Datos de envio</h1>
				<hr class='divider_bg m_bottom_23'>
				Indique los datos de envio. Por defecto hemos seleccionado la misma direci&oacute;n
				 que los datos de facturaci&oacute;n:
				<p>&nbsp;</p>
				<form action="/tienda/envio" method="post" class="m_bottom_15">
				<input type="hidden" name="accion" value="envio">
					<ul>
						 
						<li class="m_bottom_15 col-lg-12 col-md-12 col-sm-12">
							<label for="nombre" class="second_font m_bottom_4 d_inline_b fs_medium">Nombre/Empresa</label>
							<input type="text" id="nombre" name="nombre" value="<? echo $_SESSION['enviara']['nombre']; ?>" class="w_full tr_all" placeholder="Nombre/Empresa" required>
						</li>
						<li class="m_bottom_15 col-lg-12 col-md-12 col-sm-12">
							<label for="direccion" class="second_font m_bottom_4 d_inline_b fs_medium">Direcci&oacute;n</label>
							<input type="text" id="direccion" name="direccion" value="<? echo $_SESSION['enviara']['direccion']; ?>" class="w_full tr_all" placeholder="Direcci&oacute;n" required>
						</li>
						 
						<li class="m_bottom_15 col-lg-3 col-md-3 col-sm-12">
							<label for="cp" class="second_font m_bottom_4 d_inline_b fs_medium">C&oacute;digo Postal</label>
							<input type="text" id="cp" name="cp" value="<? echo $_SESSION['enviara']['cp']; ?>" class="w_full tr_all" placeholder="C&oacute;digo Postal" required>
						</li>
						<li class="m_bottom_15 col-lg-5 col-md-5 col-sm-12">
							<label for="ciudad" class="second_font m_bottom_4 d_inline_b fs_medium">Ciudad</label>
							<input type="text" id="ciudad" name="ciudad" value="<? echo $_SESSION['enviara']['ciudad']; ?>" class="w_full tr_all" placeholder="Poblaci&oacute;n" required>
						</li>
						<li class="m_bottom_15 col-lg-4 col-md-4 col-sm-12">
							<label for="provincia" class="second_font m_bottom_4 d_inline_b fs_medium">Provincia</label>
							<input type="text" id="provincia" name="provincia" value="<? echo $_SESSION['enviara']['provincia']; ?>" class="w_full tr_all" placeholder="Provincia" required>
						</li>
						<li class="m_bottom_15 col-lg-12 col-md-12 col-sm-12">
							<label for="notas" class="second_font m_bottom_4 d_inline_b fs_medium">Notas sobre el pedido</label>
							<input type="text" id="notas" name="notas" value="<? echo $_SESSION['enviara']['notas']; ?>" class="w_full tr_all" placeholder="Notas sobre la entrega del pedido" >
						</li>
						<li><button onclick="this.form.submit();" type="submit" action="/tienda/envio" class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;">  Continuar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
						<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Cliente:</span> <span class="fw_light"><? echo $_SESSION["cliente"]["nombre"]; ?></span></li>
						
						
						
					</ul>
		
		
				


				
					
				</section>
			</aside>
		</div>
	</div>
</div>