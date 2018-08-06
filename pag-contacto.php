 <div class="page_section_offset">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12  ">
<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Nuestra Localizaci&oacute;n</h1>
<div class=" m_bottom_38 m_xs_bottom_30">
 	<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?  echo $empresa['lat']; ?>,<?  echo $empresa['lng']; ?>&zoom=15&size=850x300&sensor=true&markers=<?  echo $empresa['lat']; ?>,<?  echo $empresa['lng']; ?>&label=<?  echo $empresa['empresa']; ?>" style="width:100%" onerror="this.style.display:none;">
</div>
<div class="row">
<main class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Cont&aacute;ctanos</h5>
<hr class="divider_bg m_bottom_25">
<p class="second_font m_bottom_15"><i class="fa fa-map-marker color_dark"></i> <?  echo $empresa['direccion']; ?> <?  echo $empresa['cp']; ?> <?  echo $empresa['localidad']; ?> <?  echo $empresa['provincia']; ?></p>
<ul class="second_font vr_list_type_2 m_bottom_33 m_xs_bottom_30">
<li><i class="fa fa-phone color_dark fs_large"></i> <?  echo $empresa['fijo']; ?></li>
<li class="w_break" data-icon=""><i class="fa fa-envelope color_dark"></i><?  echo $empresa['email']; ?></li>
</ul>
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Horario de Apertura</h5>
<hr class="divider_bg m_bottom_25">
<ul class="second_font">
<li><?  echo $empresa['horario']; ?></li>
 
</ul>
</main>
<section class="col-lg-8 col-md-8 col-sm-8">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Formulario de Contacto</h5>
<hr class="divider_bg m_bottom_25">
<p class="second_font m_bottom_14">Env&iacute;anos un email.</p>
<form action="/llamanos.php" method="post" class="b_default_layout" id="contactform">
<ul>
<li class="row">
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
<label class="second_font d_inline_b m_bottom_5 clickable">Nombre</label><br>
<input required type="text" name="nombre" id="nombre" placeholder="Su nombre" class="tr_all w_full fw_light">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
<label class="second_font d_inline_b m_bottom_5 clickable">Email</label><br>
<input required type="email" name="email" id="email" placeholder="Su email de contacto" class="tr_all w_full fw_light">
</div>
</li>
<li class="m_bottom_15">
<label class="second_font d_inline_b m_bottom_5 clickable">Tel&eacute;fono</label><br>
<input required type="text" name="telephone" id="telephone" placeholder="Su telefono" class="tr_all w_full fw_light">
</li>
<li class="m_bottom_5">
<label class="second_font d_inline_b m_bottom_5 clickable">Mensaje</label><br>
<textarea name="consulta" id="consulta" placeholder="Escriba su consulta" rows="6" class="tr_all w_full fw_light"></textarea>
</li>

<li class="m_bottom_15">
<label for="verificacion" class="verificacion">&iexcl;No rellenes el siguiente campo!</label><br>
<input name="verificacion" class="verificacion" />
</li>

<li>
<button type="submit" value="Enviar" class="button_type_2 black state_2 tr_all second_font fs_medium tt_uppercase d_inline_b"><span class="m_left_10 m_right_10 d_inline_b">Enviar</span></button>
</li>
</ul>
</form>
</section>

</div>
</div>
</div>
 
 </div>
 </div>