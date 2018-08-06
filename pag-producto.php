
<? if ($pro['descuento']>0) { $pro['neto']=$pro['descuento']; }?>



<!--breadcrumbs-->
<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
<div class="container">
<a   href="/" title="Inicio" class="sc_hover">Inicio</a> 
<span class="color_dark">/</span> 
<a   href="/tienda" title="tienda" class="sc_hover">Tienda</a> 
<span class="color_dark">/</span> 
<span class="color_light"><? echo $pro['titulo']; ?></span>
</div>
</div>
<!--main content-->
<div class="page_section_offset">
<div class="container" role="banner">
<div class="row">
<section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
<main class="clearfix m_bottom_40 m_xs_bottom_30">
<div class="product_preview f_left f_xs_none wrapper m_xs_bottom_15">
<div class="d_block relative r_image_container" style="overflow:hidden;">
<img id="zoom" src="<? echo "/img/productos/1:1/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>" alt="<? echo $pro['titulo']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>">
</div>
<!--thumbnails-->
<div class="product_thumbnails_wrap relative m_bottom_3">
										<div class="owl-carousel" id="thumbnails" data-nav="thumbnails_product_" data-owl-carousel-options='{
											"responsive" : {
												"0" : {
													"items" : 3
												},
												"321" : {
													"items" : 4
												},
												"769" : {
													"items" : 2
												},
												"992" : {
													"items" : 3
												}
											},
											"stagePadding" : 40,
											"margin" : 10,
											"URLhashListener" : false
										}'>	
<? if ($pro['foto1']) { ?>										
	<a href="<? echo "/img/productos/".$pro[0]."-1/".$pro['seo'].".png?".$pro['act']; ?>" data-image="<? echo "/img/productos/1:1/".$pro[0]."-1/".$pro['seo'].".png?".$pro['act']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."-1/".$pro['seo'].".png?".$pro['act']; ?>" class="d_block"><img src="<? echo "/img/productos/1:1/".$pro[0]."-1/".$pro['seo'].".png?".$pro['act']; ?>" ></a>
<? } ?> 
 
<? if ($pro['foto2']) { ?>		
	<a href="<? echo "/img/productos/".$pro[0]."-2/".$pro['seo'].".png?".$pro['act']; ?>" data-image="<? echo "/img/productos/1:1/".$pro[0]."-2/".$pro['seo'].".png?".$pro['act']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."-2/".$pro['seo'].".png?".$pro['act']; ?>" class="d_block"><img src="<? echo "/img/productos/1:1/".$pro[0]."-2/".$pro['seo'].".png?".$pro['act']; ?>" ></a>
<? } ?>
<? if ($pro['foto3']) { ?>		
	<a href="<? echo "/img/productos/".$pro[0]."-3/".$pro['seo'].".png?".$pro['act']; ?>" data-image="<? echo "/img/productos/1:1/".$pro[0]."-3/".$pro['seo'].".png?".$pro['act']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."-3/".$pro['seo'].".png?".$pro['act']; ?>" class="d_block"><img src="<? echo "/img/productos/1:1/".$pro[0]."-3/".$pro['seo'].".png?".$pro['act']; ?>" ></a>
<? } ?>
<? if ($pro['foto4']) { ?>		
	<a href="<? echo "/img/productos/".$pro[0]."-4/".$pro['seo'].".png?".$pro['act']; ?>" data-image="<? echo "/img/productos/1:1/".$pro[0]."-4/".$pro['seo'].".png?".$pro['act']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."-4/".$pro['seo'].".png?".$pro['act']; ?>" class="d_block"><img src="<? echo "/img/productos/1:1/".$pro[0]."-4/".$pro['seo'].".png?".$pro['act']; ?>" ></a>
<? } ?>
<a href="<? echo "/img/productos/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>" data-image="<? echo "/img/productos/1:1/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>" data-zoom-image="<? echo "/img/productos/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>" class="d_block"><img src="<? echo "/img/productos/1:1/".$pro[0]."/".$pro['seo'].".png?".$pro['act']; ?>" ></a>

</div>
<button class="thumbnails_product_prev black_hover button_type_4 grey state_2 tr_all d_block vc_child"><i class="fa fa-angle-left d_inline_m"></i></button>
<button class="thumbnails_product_next black_hover button_type_4 grey state_2 tr_all d_block vc_child"><i class="fa fa-angle-right d_inline_m"></i></button>
</div>
</div>

<div class="product_description f_left f_xs_none">
<div class="wrapper">
<h1 class="second_font m_bottom_3 f_left product_title"><? echo $pro['titulo']; ?></h1>
</div>
<div class="relative m_bottom_18">
<b class="second_font d_block m_bottom_10"><? echo $categoria['categoria']; ?></b>
</div>

<hr class="divider_light m_bottom_15">
 <? 
 
 $texto=explode('.',$pro['texto']);
 
 
 echo $texto[0]; ?>

 
<hr class="divider_light m_bottom_15">
 
 
 
 
 
 
 
 
 
 
 
 
 
<? if ($pro['opciones']) { 

 
?> 

 
	<div>
	
	<h5>Opciones disponibles</h5>
	 <p>&nbsp;</p>
	 <form   id="formulario" method="POST">
	 
	 
	 
	 
	 <input type="hidden" name="idpro" value="<? echo $pro[0]; ?>"> 
	 <input type="hidden" name="neto" value="<? echo $pro['neto']; ?>"> 
	 <input type="hidden" name="monedabase" value="<? echo $empresa['monedabase']; ?>"> 
	<? 
	
	
	//Buscamos opciones diferentes
	
	$consulta="SELECT DISTINCT(tipo) FROM opcionespro";
	$sql=mysql_query($consulta,$conex);
	while ($tipo=mysql_fetch_array($sql)){
		 
		
		 
		 echo ' 
		<p style="display: inline;">'.$tipo[0].'</p> ';
		echo "<select   style='width:100% ' name='opciones[]' id='".$tipo[0]."'  class='selecto'><option value=''></option>";
		$consulta2="SELECT * FROM opcionespro where idpro='".$pro[0]."' AND tipo='".$tipo[0]."';"; 
		$sql2=mysql_query($consulta2,$conex);
		while ($opc=mysql_fetch_array($sql2)){
			
			$proneto= ($opc['neto'] * $_SESSION['cambio']);
			
			 
			 switch ($opc['neto'] ){
			 
				case 0: $neto="";break;
				case ( $opc['neto'] >0): $neto="+ ".$proneto." ".$_SESSION['moneda'];break;
				case ( $opc['neto'] <0): $neto=" ".$proneto." ".$_SESSION['moneda'];break;
				}
				
			 
			echo "<option value='".$opc[0]."'>".$opc['valor']." ".$neto."</option>";
			
		}
		echo "</select> &nbsp;<br>";
		 
	}
	  ?>  
	</form>
	</div>
	
	 <div style="clear:both;"></div>
<? } ?>


<? if ($pro['tipo']=="catalogo") { ?>
	<h5>Solicite Presupuesto:</h5><p>&nbsp;</p>

	<div class="product_options" id="enviado" >
		 <form   id="pedido" method="POST">
		 <input type="hidden" name="idpro" value="<? echo $pro[0]; ?>">
		 <input type="hidden" name="tipo" value="<? echo $pro['tipo']; ?>"> 
		 <ul>
			<li class="m_bottom_15">
				<label for="name" class="second_font m_bottom_4 d_inline_b fs_medium">Nombre</label>
				<input type="text" name="nombre" id="name" placeholder="Su nombre" class="w_full tr_all" required/>
			</li>
			<li class="m_bottom_15">
				<label for="tel" class="second_font m_bottom_4 d_inline_b fs_medium">Tel&eacute;fono</label>
				<input type="text" name="tel" id="tel" placeholder="Tel&eacute;fono" class="w_full tr_all" required/>
			</li>
			<li class="m_bottom_15">
				<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">Correo</label>
				<input type="email" name="email" id="email" placeholder="E-mail" class="w_full tr_all" required/>
			</li>
			 
				 
				<input  type="hidden" value="<? echo $_SESSION['zona']; ?>" name="zona" id="zona" >
			 
		</ul>
		<div class="scheme_color"   id="respuesta"> 
			<? if ($pro['neto']>0) { ?>
				<p style=' font-weight:bold'>DESDE  <? echo $pro['neto'] * $_SESSION['cambio']; ?> <? echo $_SESSION['moneda']; ?></p> 
			<? } ?>
		</div>
		
		<hr class="divider_light">
		<footer class="bg_grey_light_2 w_inherit">
		<div class="clearfix">
		<div class="f_right m_right_3 relative transform3d">
		<button id="enviarpresupuesto"  class="button_type_2 d_block  t_align_c lbrown  tr_all second_font fs_medium tt_uppercase f_left m_right_3 "><i class="fa fa-paper-plane d_inline_m m_right_9"></i> Solicite Presupuesto</button>
		</form>
		</div>
		</div>
		</footer>
	</div>
	
	
	
	
<? } else { ?>
	
	<div class="product_options" >
		
		 <form  action="/tienda/carrito"  id="carrito" method="POST">
		 <input type="hidden" name="idpro" value="<? echo $pro[0]; ?>">
		
		<div class="scheme_color"   id="respuesta"> 
			<? if ($pro['neto']>0) { ?>
				<p style=' font-weight:bold'>Desde  <? echo $pro['neto'] * $_SESSION['cambio']; ?> <? echo $_SESSION['moneda']; ?></p> 
			<? } ?>
		</div> <div  id="enviado">
		</div>
		<hr class="divider_light">
		<footer class="bg_grey_light_2 w_inherit">
		<div class="clearfix">
		<div class="f_right m_right_3 relative transform3d">
		<input type="number" step="1" value="1" name="cantidad" style="width:60px">
		<button id="anadircarro2"  class="button_type_2 d_block  t_align_c lbrown  tr_all second_font fs_medium tt_uppercase f_right m_right_3 "><i class="fa fa-shopping-bag d_inline_m m_right_9"></i> A&ntilde;adir al carro
		</button>
		</form>
		</div>
		</div>
		</footer>
	</div>
	
	
<? } ?>
	
</div>
</main>
<!--tabs-->
<div class="tabs styled_tabs m_bottom_18">
<nav class="second_font">
<ul class="hr_list">
<li class="m_right_3"><a title="Descripci&oacute;n" href="#tab1" class="color_light border_light_3 d_block">Descripci&oacute;n</a></li>
<? if ($pro['datos'] || $pro['pdfname']) { ?>
	<li class="m_right_3"><a title="Datos técnicos" href="#tab2" class="color_light border_light_3 d_block">Caracteristicas</a></li>
<? } ?>
<!--li class="m_right_3"><a title="Envío y Pago" href="#tab3" class="color_light border_light_3 d_block">Env&iacute;o y Pago</a></li-->
</ul>
</nav>
<hr class="d_xs_none">
<div id="tab1" class="fw_light tab_content">
<b class="m_bottom_15 model">

<? echo $pro['texto']; ?>

</div>


<div id="tab2" class="tab_content">

<?
if ($pro['datos']) { echo '<table>';
	$valores=explode(';',$pro['datos']); 
					foreach ($valores as &$campos) {
						
							$ver=explode(':',$campos); 		
								if ($ver[0]) {echo "<tr><td style='white-space:nowrap;font-weight:bold;'>".$ver[0]."</td><td>".$ver[1]."</td></tr>";}
					}
	echo '</table>';}

	if ($pro['pdfname']) {
		
		switch ($pro['pdftipo']){
			 
		}
		echo '<p>&nbsp;</p><strong>Documentaci&oacute;n Adicional:</strong> </b><a href="/pdf.php?id='.$pro[0].'" target="pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$pro['pdfname'];
	}
?>
</div>


<div id="tab3" class="tab_content">
</div>
</div>
</section>
<aside class="col-lg-3 col-md-3 col-sm-3">
<figure class="relative m_bottom_30 manufacturer_widget">
<center /><img   src="/img/fabricantes/<? echo $pro['fabricante']; ?>/fabricante.png" onerror="this.style.display='none';">
</figure>
<div class="represent_wrap widget clearfix m_bottom_30">
	<section class="item_represent m_bottom_3 type_2 h_inherit t_sm_align_c bg_grey_light_2 tr_delay">
	<div class="d_inline_m m_xs_bottom_0 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconoi']; ?> d_inline_m"></i></div>
	<div class="description d_inline_m lh_medium">
	<p class="color_dark second_font m_bottom_2 fs_large"><? echo $empresa['tituloi']; ?></p>
	<small class="fw_light"><? echo $empresa['textoi']; ?></small>
	</div>
	</section>
	
	<section class="item_represent m_bottom_3 type_2 h_inherit t_sm_align_c bg_grey_light_2 tr_delay">
	<div class="d_inline_m m_xs_bottom_0 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconoc']; ?> d_inline_m"></i></div>
	<div class="description d_inline_m lh_medium">
	<p class="color_dark second_font m_bottom_2 fs_large"><? echo $empresa['tituloc']; ?></p>
	<small class="fw_light"><? echo $empresa['textoc']; ?></small>
	</div>
	</section>

	<section class="item_represent m_bottom_3 type_2 h_inherit t_sm_align_c bg_grey_light_2 tr_delay">
	<div class="d_inline_m m_xs_bottom_0 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconod']; ?> d_inline_m"></i></div>
	<div class="description d_inline_m lh_medium">
	<p class="color_dark second_font m_bottom_2 fs_large"><? echo $empresa['titulod']; ?></p>
	<small class="fw_light"><? echo $empresa['textod']; ?></small>
	</div>
	</section>


</div>
<section class="m_bottom_30"><h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Categor&iacute;as</h5>
<hr class="divider_bg m_bottom_23">

			 
	
	<? $consulta="Select seo,categoria,id FROM categoriasproductos WHERE superior='1' AND id!='1' ORDER BY categoria ASC ";
		$sql= mysql_query($consulta,$conex);
		while ($cate=mysql_fetch_array($sql)){
				echo '<ul class="categories_list second_font w_break">';
				echo '<li class="relative "><a href="/tienda/categoria/'.$cate[0].'" class="fs_large_0 d_inline_b tr_delay">  '.$cate[1].'</a><button class="open_sub_categories fs_medium"></button>';
				
				echo '<ul class="';
					if ($cate['seo']!=$_GET['seo']) {echo 'd_none';}
				echo '">';
				$consulta2="Select seo,categoria FROM categoriasproductos WHERE superior='".$cate[2]."' ORDER BY categoria ASC ";
				$sql2= mysql_query($consulta2,$conex);
				 
				while ($subcate=mysql_fetch_array($sql2)){
					
					echo '<li class="relative "><a href="/tienda/categoria/'.$cate[0].'/'.$subcate[0].'" class="tr_delay d_inline_b"> '.$subcate[1].'</a></li>';
			}
				 echo '</ul></li></ul>';
		}
?>
	
 
</section>
</aside>
</div>
</div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 <script>   
$(function(){
 $(".selecto").change(function(){ 
 var url = "/ajax-opciones-producto.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
});
</script>

 <script>   
$(function(){
 $("#enviarpresupuesto").click(function(){ 
 var url = "/ajax-enviar-presupuesto.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#pedido").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#enviado").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
});
</script>

 <script>   
$(function(){
 $("#anadircarro").click(function(){ 
 var url = "/ajax-anadir-carro.php?<? echo rand(111,999); ?>"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#carrito").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#enviado").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
});
</script>