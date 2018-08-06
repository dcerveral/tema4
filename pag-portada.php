

<!--layerslider-->
<div class="layerslider" style="width:100%;height:550px;">
	
	<?
	
			$consulta2="Select * FROM sliders WHERE activo='1' ORDER BY id ASC ";
			$sql2= mysql_query($consulta2,$conex);
		while ($slider=mysql_fetch_array($sql2)){
			
			echo '<div class="ls-slide" data-ls="transition2d: all;">
		 			<img src="/img/sliders/'.$slider[0].'/'.$slider[0].'.png?'.$slider['act'].'"   class="ls-bg">
					<img src="/img/sliders/'.$slider[0].'/'.$slider[0].'.png?'.$slider['act'].'"   class="ls-tn">
		 			<p class="ls-l color_white fw_light tt_uppercase" style="left:20px;top:143px;font-size:1.285em;" data-ls="offsetxin:0; offsetyin:120;delayin:400;easingin:easeOutBack;durationin:700;">'.$slider['subtitulo'].'</p>
					<h2 class="ls-l color_white second_font tt_uppercase t_align_c" style="left:20px;top:185px;font-size:4.285em;line-height:.94em;" data-ls="offsetxin:0; offsetyin:120;delayin:600;easingin:easeOutBack;durationin:700;">'.$slider['titulo'].'</h2>
					<a title="'.$slider['titulo'].'" href="'.$slider['url'].'" class="ls-l d_block button_type_5 bg_transparent slider_button color_white tt_uppercase fw_light" style="font-size:1.428em;left:20px;top:300px;" data-ls="offsetxin:0; offsetyin:120;delayin:800;easingin:easeOutBack;durationin:700;">'.$slider['boton'].'</a>
				</div>';
					
					 
						}
	
	?>
	
	
	

</div>

<? //BOXED


	$consulta="Select * FROM boxs ORDER BY id ASC ";
		$sql= mysql_query($consulta,$conex);
		$a=0;
		while ($box=mysql_fetch_array($sql)){
			$a++;
			$tit[$a]=$box['titulo'];
			$subtitulo[$a]=$box['subtitulo'];
			$boton[$a]=$box['boton'];
			$url[$a]=$box['url'];
			$act[$a]=$box['act'];
		}

?>

<!--main content-->
<section class="section_offset hidden animated" data-animation="fadeInDown">
	<div class="container">
	<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">

	<!--boxs-->
	<figure class="relative wrapper scale_image_container m_bottom_30 r_image_container">
		<img src="/img/boxs/1/1.png?<? echo $act[1]; ?>" alt="<? echo $tit[1]; ?>" class="tr_all scale_image">
		<!--caption-->
		<figcaption class="caption_type_1 tr_all">
		<div class="d_inline_b color_white fw_light caption_title tt_uppercase bg_lbrown_translucent">
		<? echo $subtitulo[1]; ?></div>
		<div class="caption_inner">
		<h3 class="color_white second_font fw_light m_bottom_5 fs_sm_default"><? echo $tit[1]; ?></h3>
		<p><a  class="color_lbrown color_white_hover" href="<? echo $url[1]; ?>"><? echo $boton[1]; ?></A></p>
		</div>
		</figcaption>
	</figure>

	<!--boxs-->
	<a title="<? echo $tit[2]; ?>" href="<? echo $url[2]; ?>" class="banner_type_2 scheme_color m_xs_bottom_30 d_block">
	<span class="bg_scheme_color inner color_white t_align_c d_block">
	<span class="second_font tt_uppercase fw_light m_bottom_11 d_block fs_big_2 ba_title"><? echo $tit[2]; ?></span>
	<span class="fs_large fw_light m_bottom_15 d_block ba_title_2"><? echo $subtitulo[2]; ?></span>
	<span class="second_font tt_uppercase color_white fs_medium button_type_7 d_inline_b bg_transparent tr_all"><? echo $boton[2]; ?></span>
	</span>
	</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
	<!--banner-->
	<figure class="relative wrapper scale_image_container r_image_container m_xs_bottom_30">
	<img src="/img/boxs/3/3.png?<? echo $act[3]; ?>" alt="<? echo $tit[3]; ?>" class="tr_all scale_image" >
	<!--caption-->
	<figcaption class="caption_type_1 tr_all">
	<div class="d_inline_b color_white fw_light caption_title tt_uppercase bg_lbrown_translucent">
	<? echo $subtitulo[3]; ?></div>
	<div class="caption_inner">
	<h3 class="color_white second_font fw_light m_bottom_5 fs_sm_default"><? echo $tit[3]; ?></h3>
	<p > 
	<a href="<? echo $url[3]; ?>" class="color_lbrown color_white_hover"><? echo $boton[3]; ?></a></p>
	</div>
	</figcaption>
	</figure>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4">
	<!--banner-->
	<div class="banner_type_2 color_lbrown m_bottom_30">
	<div class="bg_lbrown inner color_white t_align_c">
	<span class="second_font tt_uppercase fw_light m_bottom_11 d_block fs_big_2 ba_title"><? echo $tit[4]; ?></span>
	<span class="fs_large fw_light m_bottom_15 d_block ba_title_2"><? echo $subtitulo[4]; ?></span>
	<!--newsletter form-->
	<a   href="<? echo $url[4]; ?>" class="second_font tt_uppercase color_white fs_medium button_type_2 d_inline_b bg_transparent bg_white_h color_lbrown_h bg_white_hover tr_all"><? echo $boton[4]; ?></a>
	</div>
	</div>
	<!--banner-->
	<figure class="relative wrapper scale_image_container r_image_container">
	<img  src="/img/boxs/5/5.png?<? echo $act[5]; ?>" alt="<? echo $tit[5]; ?>" class="tr_all scale_image">
	<!--caption-->
	<figcaption class="caption_type_1 tr_all">
	<div class="d_inline_b color_white fw_light caption_title tt_uppercase bg_lbrown_translucent">
	<? echo $subtitulo[5]; ?></div>
	<div class="caption_inner">
	<h3 class="color_white second_font fw_light m_bottom_5 fs_sm_default"><? echo $tit[5]; ?></h3>
	<p><a class="color_lbrown color_white_hover" href="<? echo $url[5]; ?>"><? echo $boton[5]; ?></A></p>
	</div>
	</figcaption>
	</figure>
	</div>
	</div>
	</div>
</section>




<!--tabs-->
<div class="section_offset p_bottom_0">
	<div class="container">
		<div class="tabs m_bottom_10">
			<!--tabs nav-->
			<nav class="m_bottom_10">
				<ul class="hr_list tabs_list second_font tt_uppercase fs_large fw_light">
				<li data-animation="fadeInRight" class="m_right_40 m_xs_right_10 animated hidden"><a class="color_light color_dark_hover" title="Novedades" href="#tab-1">Novedades</a></li>
				</ul>
			</nav>
			
			<hr data-animation="fadeInLeft" data-animation-delay="600" class="hidden animated divider_bg m_bottom_30">
			<!--tabs content-->
			
			<div id="tab-1">
				<div class="row">
					 

<? //PRODUCTOS


	$consulta="Select * FROM productos WHERE activo='1' ORDER BY rand() ";
		$sql= mysql_query($consulta,$conex);
		$a=150;
		while ($pro=mysql_fetch_array($sql)){
			$a=$a+150;
			
			echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 w_mxs_full m_xs_bottom_30 animated hidden" data-animation="fadeInDown" data-animation-delay="'.$a.'">
								<!--product-->
								<figure class="product_item relative c_image_container frame_container t_sm_align_c r_image_container">
								<!--image & buttons & label-->
								<div class="relative">
								<div>
								<img  src="/img/productos/1:1/'.$pro[0].'/'.$pro['seo'].'.png?'.$pro['act'].'" alt="'.$pro['titulo'].'" class="c_image_1 tr_all" style="width:100%">
								</div>
								<div class="product_label fs_ex_small circle color_white bg_scheme_color t_align_c vc_child tt_uppercase"><i class="d_inline_m">Nuevo</i></div></div>
								<figcaption class="bg_white relative p_bottom_0"><div class="row"><div class="col-lg-12 col-md-12 m_bottom_9"><p class="second_font sc_hover d_xs_block truncate">'.$pro['titulo'].'</p>
								</div><div class="col-lg-5 col-md-5 color_light fs_large second_font t_align_r t_sm_align_c m_bottom_9"></div></div>
								<a   href="/tienda/'.$pro['seo'].'" title="'.$pro['titulo'].'" class="button_type_2 m_bottom_9 d_block w_full t_align_c lbrown state_2 tr_all second_font fs_medium tt_uppercase"><i class="fa fa-info d_inline_m m_right_9"></i> M&aacute;s info</a>
								</figcaption></figure>
							</div>
						 ';
		}

?>

							 
							
					  
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<!--brands carousel-->
<div class="section_offset">
<section class="container m_bottom_10">
<div class="d_table m_bottom_5 w_full animated hidden" data-animation="fadeInLeft">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 v_align_m d_table_cell f_none">
<h5 class="second_font color_dark tt_uppercase fw_light d_inline_m m_bottom_4">Nuestras marcas</h5>	
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 t_align_r d_table_cell f_none">
<!--carousel navigation-->
<div class="clearfix d_inline_b">
<button class="brands_carousel_prev black_hover button_type_4 grey state_2 tr_all d_block f_left vc_child m_right_5"><i class="fa fa-angle-left d_inline_m"></i></button>
<button class="brands_carousel_next black_hover button_type_4 grey state_2 tr_all d_block f_left vc_child"><i class="fa fa-angle-right d_inline_m"></i></button>
</div>
</div>
</div>



<hr class="divider_bg m_bottom_15 animated hidden" data-animation="fadeInLeft" data-animation-delay="200">
<!--carousel-->
<div class="row">
<div class="owl-carousel" data-nav="brands_carousel_" 
							data-owl-carousel-options='{
								"stagePadding" : 15,
								"margin" : 30,
								"responsive" : {
										"0" : {
											"items" : 2
										},
										"320" : {
											"items" : 3
										},
										"550" : {
											"items" : 4
										},
										"768" : {
											"items" : 5
										},
										"992" : {
											"items" : 6
										},
										"1200" : {
											"items" : 7
										}
									}
								}'>
								
<?
	//fabricantes


	$consulta="Select * FROM fabricantes WHERE activo='1' ORDER BY rand() LIMIT 30 ";
		$sql= mysql_query($consulta,$conex);
		$a=0;
		while ($fab=mysql_fetch_array($sql)){
			$a=$a+150;
			echo '<div class="animated hidden" data-animation="fadeInLeft" data-animation-delay="'.$a.'">
				<img src="/img/fabricantes/'.$fab[0].'/'.$fab['seo'].'.png" alt="'.$fab['seo'].'"> 
				</div>';
		}


?>								

</div>
</div>
</section>
</div>


<!--blog-->
<div class="section_offset p_bottom_0">
<section class="container m_bottom_5">
<div class="d_table m_bottom_5 w_full hidden animated" data-animation="fadeInLeft">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 v_align_m d_table_cell f_none">
<h5 class="second_font color_dark tt_uppercase fw_light d_inline_m m_bottom_4">Nuestro Blog</h5>	
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 t_align_r d_table_cell f_none">
<!--carousel navigation-->
<div class="clearfix d_inline_b">
<button class="blog_prev black_hover button_type_4 grey state_2 tr_all d_block f_left vc_child m_right_5"><i class="fa fa-angle-left d_inline_m"></i></button>
<button class="blog_next black_hover button_type_4 grey state_2 tr_all d_block f_left vc_child"><i class="fa fa-angle-right d_inline_m"></i></button>
</div>
</div>
</div>
<hr class="divider_bg m_bottom_15 animated hidden" data-animation="fadeInLeft" data-animation-delay="100">
					<!--carousel-->
					<div class="row">
						<div class="owl-carousel" data-nav="blog_" data-owl-carousel-options='{
							"stagePadding" : 15,
							"margin" : 30,
							"responsive" : {
									"0" : {
										"items" : 1
									},
									"470" : {
										"items" : 2
									},
									"992" : {
										"items" : 3
									}
								}
							}'>
<!--post-->

<?
	//BLOG


	$consulta="Select * FROM noticias WHERE activo='1' ORDER BY fecha DESC LIMIT 6 ";
		$sql= mysql_query($consulta,$conex);
		$a=150;
		while ($not=mysql_fetch_array($sql)){
			$a=$a+150;
			 
			 
			echo '<div class="animated hidden" data-animation="fadeInDown" data-animation-delay="'.$a.'">
					<article class="frame_container scale_image_container">
					<figure class="relative">
					<span class="d_block wrapper m_bottom_15"  >
						<img src="/img/noticias/16:9/'.$not[0].'/'.$not['seo'].'.png?'.$not['act'].'" alt="'.$not['titulo'].'" class="tr_all scale_image" >
					</span>
					<figcaption>
					<div class="clearfix">
					<!--post info (date & comments)-->
					<div class="post_info f_left m_right_20 t_align_c lh_small m_sm_right_10">
					<div class="date bg_scheme_color color_white second_font tt_uppercase m_bottom_15">
					<p class="fs_big">'. date("d", strtotime($not['fecha'])).'</p>
					<p class="fs_ex_small">'.strftime("%B", strtotime($not['fecha'])).'</p>
					</div>
					</div>
					<!--post excerpt-->
					<div class="f_left post_excerpt m_bottom_15">
					<h5 class="second_font m_bottom_13"><a title="'.$not['titulo'].'" href="/blog/'.$not['seo'].'" class="sc_hover"><b>'.$not['titulo'].'</b></a></h5>
					<p class="fw_light">'.strip_tags (substr($not['texto'],0,200)).'...</p>
					</div>
					</div>
					</figcaption>
					</figure>
					</article>
				</div>';
		}


?>	

</div>
</div>
</section>
</div>




<div class="section_offset">
<div class="container">
<hr class="divider_lbrown m_bottom_25 animated hidden" data-animation="fadeInLeft" data-animation-delay="100">
<div class="row sh_container">
<div class="col-lg-4 col-md-4 col-sm-4 same_height animated hidden" data-animation="fadeInLeft" data-animation-delay="200">
<section class="item_represent relative m_bottom_25 m_xs_bottom_30 h_inherit t_sm_align_c">
<!--icon-->
<div class="d_inline_m m_sm_bottom_15 m_sm_right_0 bg_lbrown color_white m_right_17 icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconoi']; ?> d_inline_m"></i></div>
<!--description-->
<div class="d_inline_m description w_sm_full">
<h6 class="second_font color_dark m_bottom_10"><? echo $empresa['tituloi']; ?></h6>
<p class="fw_light m_bottom_10"><? echo $empresa['textoi']; ?></p>
</div>
</section>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 same_height animated hidden" data-animation="fadeInLeft" data-animation-delay="350">
<section class="item_represent with_divider relative m_bottom_25 m_xs_bottom_30 h_inherit t_sm_align_c">
<!--icon-->
<div class="d_inline_m m_sm_bottom_15 m_sm_right_0 bg_lbrown color_white m_right_17 icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconoc']; ?> d_inline_m"></i></div>
<!--description-->
<div class="d_inline_m description">
<h6 class="second_font color_dark m_bottom_10"><? echo $empresa['tituloc']; ?></h6>
<p class="fw_light m_bottom_10"><? echo $empresa['textoc']; ?></p>
</div>
</section>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 same_height animated hidden" data-animation="fadeInLeft" data-animation-delay="500">
<section class="item_represent with_divider relative m_bottom_25 m_xs_bottom_30 h_inherit t_sm_align_c">
<!--icon-->
<div class="d_inline_m m_sm_bottom_15 m_sm_right_0 bg_lbrown color_white m_right_17 icon_wrap_1 t_align_c vc_child"><i class="<? echo $empresa['iconod']; ?> d_inline_m"></i></div>
<!--description-->
<div class="d_inline_m description">
<h6 class="second_font color_dark m_bottom_10"><? echo $empresa['titulod']; ?></h6>
<p class="fw_light m_bottom_10"><? echo $empresa['textod']; ?></p>
</div>
</section>
</div>
</div>
<hr class="divider_lbrown m_bottom_35 m_xs_bottom_0 animated hidden" data-animation="fadeInLeft" data-animation-delay="200">
</div>
</div>

