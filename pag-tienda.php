
<? if  ($_GET['seo']) { }else {$SEO="";}

 ?>


<div class="container">
<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
	<div class="container">
	<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
	<a title="Tienda" href="/tienda" class="sc_hover">Tienda</a> 
	
	<? if  ($_GET['categoria']) { ?>
	 <span class="color_dark">/</span>
		 
		<a title="<? echo $_GET['categoria']; ?>" href="/tienda/categoria/<? echo $_GET['categoria']; ?>" class="sc_hover"><? echo ucfirst($_GET['categoria']); ?></a>
	
	<? } ?>
	
	<? if  ($categoria['categoria']) { ?>
	 <span class="color_dark">/</span>
		<span class="color_light"><? echo $categoria['categoria']; ?></span>
	
	<? } ?>
	</div>
</div>
</div>
<div class="page_section_offset">
<div class="container">
<div class="row">

	<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
	<h2 class="fw_light second_font color_dark tt_uppercase m_bottom_27">
		<? if  ($categoria['categoria']) { echo $categoria['categoria'];  }
			else {echo "Tienda";} ?></h2>
		
		
		<figure class="m_bottom_45 m_xs_bottom_30">
<img src="<?  echo '/img/categoriasproductos/'.$categoria[0].'/'.$categoria['seo'].'.png'; ?>" alt="<?  echo $categoria['categoria']; ?>" class="m_bottom_15" onerror="this.style.display='none';">
<figcaption>
<p class="fw_light"><? echo  $categoria['descripcion']; ?></p>
</figcaption>
</figure>





 
<!--main content-->
 
 
 
<hr class="divider_light m_bottom_5">
<!--isotope-->
<div id="can_change_layout" class="category_isotope_container three_columns wrapper m_bottom_10 m_xs_bottom_0">
<!--isotope item-->
<? 
					
	  
		while ($not=mysql_fetch_array($sqlseo)){
			$a=$a+150;
			  $texto=explode('.',$not['texto']);
 
 
 
			echo '
				<div class="category_isotope_item"  style="float:left">
				<a href="/tienda/'.$not['seo'].'" title="'.$not['titulo'].'">
				<figure class="product_item relative c_image_container frame_container t_sm_align_c r_image_container">
				<div class="relative"><div>
				<img src="/img/productos/1:1/'.$not[0].'/'.$not['seo'].'.png?'.$not['act'].'" alt="'.$not['titulo'].'" class="c_image_1 tr_all">
				
				</div></div><figcaption class="bg_white relative p_bottom_0"><div class="row">
				<div class="col-lg-12 col-md-12 m_bottom_9">
				<p class="second_font sc_hover d_xs_block truncate"  >'.$not['titulo'].'</p>
				<div class="relative">
				 
				<br class="d_none"></div><hr class="d_none divider_light m_bottom_15">
			 
				<hr class="d_none divider_light m_bottom_15"></div></div>
				<a href="/tienda/'.$not['seo'].'" title="'.$not['titulo'].'" class="button_type_2 m_bottom_9 d_block w_full t_align_c lbrown state_2 tr_all second_font fs_medium tt_uppercase"><i class="fa fa-info-circle d_inline_m m_right_9"></i> M&aacute;s info</a>
				</figcaption></figure></a></div>';

		} ?>
		
<!--isotope item-->


<!--fin isotope item-->
</div>
<hr class="m_bottom_5 divider_light">
</main>
<aside class="col-lg-3 col-md-3 col-sm-3 m_bottom_40 m_xs_bottom_0 p_top_4">
<!--categories widget-->
<section class="m_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Categor&iacute;as</h5>
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
	
 
	 	<p>&nbsp;</p>
		<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13"> &nbsp; Destacado</h5><hr class="divider_bg m_bottom_23">		<ul>
					
					
					<? $consulta="Select seo,titulo FROM productos WHERE activo='1' ORDER BY act DESC LIMIT 10";
		$sql= mysql_query($consulta,$conex);
		while ($des=mysql_fetch_array($sql)){
			
			echo '<li><a href="/blog/'.$des[0].'">'.$des[1].'</a></li>';
			
		}
		
		?>
		 
</section>
<hr class="divider_light m_bottom_5">
<!--widget-->
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
</aside>
</div></div></div>