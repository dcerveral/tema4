<div class="container">
	<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
		<div class="container">
		<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
		<a title="Tienda" href="/clientes" class="sc_hover">Clientes</a> <span class="color_dark">/</span>
		 	<span class="color_light">Login</span>
		
		 
		</div>
	</div>
	
	<? if ($error) { ?>
		 
			<div style="background-color:#ffdfbf; padding:10px;"><p>&nbsp;</p>
                
                <h5>  &nbsp;  <i class=" fa fa-exclamation-triangle" style="color:red;"></i> &nbsp; <? echo $error; ?></h5> 
				<p>&nbsp;</p>
              </div>
		 
	<? } ?>
</div>
	
	<div class="page_section_offset">
	<div class="container">
		<div class="row">
			<main class="col-lg-8 col-md-8 col-sm-8 m_bottom_30 m_xs_bottom_10">
				<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Acceso Clientes</h1>
				<hr class='divider_bg m_bottom_23'>
				
				Para ver el estado de su pedido, acceda con el correo y clave con la que realizo
				su pedido:
				<p>&nbsp;</p>
				
				
				<form action="/clientes" method="post" class="m_bottom_15">
				<input type="hidden" name="accion" value="login">
					<ul>
						 
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">Correo</label>
							<input type="email" id="email" name="email" value="<? echo $_POST['email']; ?>" class="w_full tr_all" placeholder="Correo" required>
						</li>
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="clave" class="second_font m_bottom_4 d_inline_b fs_medium">Clave</label>
							<input type="password" id="clave" name="clave" value="" class="w_full tr_all" placeholder="Clave" required>
						</li>
						
						
						<li><button onclick="this.form.submit();" type="submit"   class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: green; margin:5px;">  Entrar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
						</li>
					</ul>
				
				</form>
				
				
				
				<p>&nbsp;</p><p>&nbsp;</p>
				
				<h4 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Recordar clave</h4>
				<hr class='divider_bg m_bottom_23'>
				
				Si no recuerda su clave, introduzca el mail y/o el DNI/CIF con el que realizo el pedido:
				<p>&nbsp;</p>
				
				
				<form action="/clientes" method="post" class="m_bottom_15">
				<input type="hidden" name="accion" value="recordar">
					<ul>
						 
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">Correo</label>
							<input type="email" id="email" name="email" value="<? echo $_SPOST['email']; ?>" class="w_full tr_all" placeholder="Correo" >
						</li>
						<li class="m_bottom_15 col-lg-6 col-md-6col-sm-6">
							<label for="dni" class="second_font m_bottom_4 d_inline_b fs_medium">DNI/CIF</label>
							<input type="text" id="dni" name="cif" value="<? echo $_POST['cif']; ?>" class="w_full tr_all" placeholder="DNI/CIF" >
						</li>
						
						
						<li><button onclick="this.form.submit();" type="submit"   class="button_type_2 d_block  t_align_c  bg_green tr_all second_font fs_medium tt_uppercase f_right m_right_3 " style="background-color: purple; margin:5px;">  Enviar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
</li>
					</ul>
				
				</form>
				
				
				<div style="clear:both"></div>
			</main>
		</div>
	</div>
	</div>