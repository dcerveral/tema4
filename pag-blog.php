
<? if  ($_GET['seo']) { 

 
 
}else {$SEO="";}

		
		
	 


 ?>


<div class="container">
<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
	<div class="container">
	<a title="Inicio" href="/" class="sc_hover">Inicio</a> <span class="color_dark">/</span>
	<a title="Blog" href="/blog" class="sc_hover">Blog</a> 
		<? if  ($_GET['categoria']) { ?>
	 <span class="color_dark">/</span>
		 
		<a title="<? echo $_GET['categoria']; ?>" href="/blog/categoria/<? echo $_GET['categoria']; ?>" class="sc_hover"><? echo ucfirst($_GET['categoria']); ?></a>
	
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
	<h2 class="fw_light second_font color_dark tt_uppercase m_bottom_27">Blog</h2>
		
		
					<? 
					
	 
		$a=0;
		$p=0;
		while ($not=mysql_fetch_array($sqlseo)){
			$a=$a+150;
			$p++;
			echo '<div   class="col-lg-12  post type-post status-publish format-standard hentry" >

		<article class=" m_bottom_40 m_xs_bottom_30 clearfix animated hidden" data-animation="fadeInLeft" data-animation-delay="'.$a.'">
			
			<div   class="col-lg-2">
				 
				
			 
			<div class="date size_2  t_align_c bg_scheme_color color_white second_font tt_uppercase m_bottom_18">
					
				<b class="fs_medium ">'. date("d", strtotime($not['fecha'])).'</b>
				<span class="fs_medium">'.strftime("%B", strtotime($not['fecha'])).'</span>				</div>
			</div>
			<div class="col-lg-10 "   >
				<h4 class="second_font m_bottom_5 lh_small"><a href="/blog/'.$not['seo'].'" class="sc_hover"><b>'.$not['titulo'].'</b></a></h4>					
				<p>&nbsp;</p>
				<img class="alignright size-medium " style="float:left; margin-right:20px; margin-bottom:20px; max-width:50%; " src="/img/noticias/'.$not[0].'/'.$not['seo'].'.png?'.$not['act'].'" alt="'.$not['titulo'].'"  />
				<div class="fw_light m_bottom_15  alignright">
					<p>';
					if ($_GET['pag']=="blog"){
						echo strip_tags (substr($not['texto'],0,600)).'...';
					}
					else
					{echo $not['texto']; }
					
					echo '</p>		  
				</div>';
				if ($_GET['pag']=="blog"){
					
					echo '<div class="col-lg-12" style="text-align:right;">
							<a href="/blog/'.$not['seo'].'" class="button_type_2 grey state_2 tr_all second_font fs_medium tt_uppercase d_inline_b"><span class="m_left_10 m_right_10 d_inline_b">Leer M&aacute;s</span></a>
						</div>';
				}
				echo '</div>				
			</article> 
			</div> ';
			
		}
		
		?>
		
		
		
		
			
				
				
				
	
	<hr class="m_bottom_5 animated hidden" data-animation="fadeInLeft" data-animation-delay="100">
	<div class="d_table w_full">
	<hr><p>&nbsp;</p>
	<nav class="d_inline_b" style="float:right;">
	<ul class="hr_list">
	<li class="m_bottom_3 m_right_3">
		<? if ($_GET['p']>1) {
			 $menos=$_GET['p']-1;
			echo '<a  class="button_type_2 grey state_2 tr_all second_font fs_medium tt_uppercase d_inline_b" href="/blog/categoria'.$SEO.'/'.$menos.'">Anterior</a>';
			
			} ?>
	</li>
	<li class="m_bottom_3 m_right_3" >
		<? if ($p==$limite) {
			 $mas=$_GET['p']+1;
			echo '<a class="button_type_2 grey state_2 tr_all second_font fs_medium tt_uppercase d_inline_b" href="/blog/categoria'.$SEO.'/'.$mas.'">Siguiente</a>';
			
			} ?>
	</li>
	</ul>
	</nav>
	</div>
			</main>
	<div class="row">	
		<aside class="col-lg-3 col-md-3 col-sm-3 p_top_4 wordpress-sidebar">
			<li id="categories-2" class="widget widget_categories">
			<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13"> &nbsp; Categor&iacute;as</h5><hr class="divider_bg m_bottom_23">		
	
	
	<? $consulta="Select seo,categoria,id FROM categorias WHERE superior='1' AND id!='1' ORDER BY categoria ASC ";
		$sql= mysql_query($consulta,$conex);
		while ($cate=mysql_fetch_array($sql)){
				echo '<ul class="categories_list second_font w_break">';
				echo '<li class="relative "><a href="/blog/categoria/'.$cate[0].'" class="fs_large_0 d_inline_b tr_delay">  '.$cate[1].'</a><button class="open_sub_categories fs_medium"></button>';
				
				echo '<ul class="';
					if ($cate['seo']!=$_GET['seo']) {echo 'd_none';}
				echo '">';
				$consulta2="Select seo,categoria FROM categorias WHERE superior='".$cate[2]."' ORDER BY categoria ASC ";
				$sql2= mysql_query($consulta2,$conex);
				 
				while ($subcate=mysql_fetch_array($sql2)){
					
					echo '<li class="relative "><a href="/blog/categoria/'.$cate[0].'/'.$subcate[0].'" class="tr_delay d_inline_b"> '.$subcate[1].'</a></li>';
			}
				 echo '</ul></li></ul>';
		}
?>
	
 
		</ul>
</li><li>&nbsp;</li>
		<li id="recent-posts-2" class="widget widget_recent_entries">		
		<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13"> &nbsp; Destacado</h5><hr class="divider_bg m_bottom_23">		<ul>
					
					
					<? $consulta="Select seo,titulo FROM noticias WHERE activo='1' ORDER BY act DESC LIMIT 10";
		$sql= mysql_query($consulta,$conex);
		while ($des=mysql_fetch_array($sql)){
			
			echo '<li><a href="/blog/'.$des[0].'">'.$des[1].'</a></li>';
			
		}
		
		?>
			</li>		
					
		</aside>
	</div>
</div>
</div>
</div>

</div>

</div>
<!--footer-->
