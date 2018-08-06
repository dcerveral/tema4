<? 

	session_start();
	error_reporting(0);
	include ('conex.php');
	
	setlocale(LC_TIME, 'es_ES.UTF-8');
 
			
			 //$_SESSION["carrito"] = null;
			
	include ('seo-empresa.php'); 
	   
?>

<!doctype html>
<html lang="es">
<head>
<title><? echo $titulo; ?></title>
<meta name="title" content="<? echo $titulo; ?>">
<meta name="description" content="<? echo $descripcion; ?>">
<meta name="keywords" content="<? echo $claves; ?>">
<!--meta info-->
<link rel="canonical" href="<? echo $canonical; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="https://my1.es">
<meta name="robots" content="index, follow">
<!--add responsive layout support-->
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--include favicon-->
<link rel="shortcut icon" type="image/x-icon" href="/img/icon.ico">
<link rel="apple-touch-icon-precomposed" href="/img/icon.ico">
<!--stylesheet include-->
<link rel="stylesheet" type="text/css" media="all" href="/css/style.css">
<link rel="stylesheet" type="text/css" media="all" href="/css/animate.css">
<link rel="stylesheet" type="text/css" media="all" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="/plugins/layerslider/css/layerslider.css">
<link rel="stylesheet" type="text/css" media="all" href="/plugins/owl-carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" media="all" href="/plugins/fancybox/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" media="all" href="/plugins/jackbox/css/jackbox.min.css">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/datatables/dataTables.bootstrap.css">
	
<!--fonts include-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,400italic,500italic,300italic,100italic,100,700italic,900,900italic,700' rel='stylesheet' type='text/css'>
<!--[if lte IE 10]><link rel="stylesheet" type="text/css" media="screen" href="css/ie.css"><![endif]-->
		<!--head libs-->
		<!--[if lte IE 8]>
			<style>
				#preloader{display:none !important;}
			</style>
		<![endif]-->
<!--[if (lt IE 9) | IE 9]>
<div class="bg_red" style="padding:5px 0 12px;">
<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix color_white" style="padding:9px 0 0;float:left;width:80%;"><i class="fa fa-exclamation-triangle f_left m_right_10" style="font-size:25px;"></i><b>Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:20%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_1 d_block f_right lbrown tr_all second_font fs_medium" target="_blank" style="margin-top:6px;">Update Now!</a></div></div></div></div>
<![endif]-->
<!--cookie-->
<!-- 
	<div class="cookie">
	<div class="container">
		<div class="d_table w_full">
			<div class="d_table_cell v_align_m color_white fw_medium">Please note this website requires cookies in order to function correctly, they do not store any specific information about you personally.</div>
			<div class="d_table_cell v_align_m color_white"><a href="#" class="button_type_1 grey tr_all second_font d_block f_right fs_medium">Read More</a>
			<button class="button_type_1 d_block f_right lbrown tr_all second_font fs_medium m_right_3">Accept Cookies</button>
						</div>
					</div>
				</div>
			</div> -->
			<style>
			.truncate{overflow:hidden;
			white-space:nowrap;
			text-overflow: ellipsis;}
			
			.align-center{text-align:center;}
			.align-right{text-align:right;}
			.tabla{

				display: table;
				width:100%;
				 

				}

				.tabla-tr{

				display: table-row;
				
				}

				.tabla-td{

				display: table-cell;
				border: 1px solid #eeeeee;
				padding:10px;
				  white-space: nowrap;
					
				}
				.bold{font-weight:bold;}
			</style>
			
</head>
<body class="sticky_menu">
<!--layout-->
<div class="wide_layout db_centered bg_white">
<header role="banner" class="w_inherit">
<!--top part-->
<div class="header_top_part bg_grey_light_2">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 t_xs_align_c htp_offset p_xs_top_0 p_xs_bottom_0">
<!--shop nav-->
<nav class="d_xs_inline_b">
<ul class="hr_list second_font si_list fs_small">
<li><a class="sc_hover d_inline_b" title="Inicio" href="/">Inicio</a></li>
<li><a class="sc_hover d_inline_b" title="Blog" href="/blog">Blog</a></li>
<li><a class="sc_hover d_inline_b" rel="nofollow" title="Cientes" href="/clientes">&Aacute;rea Clientes</a></li>
</ul>
</nav>
</div>
<div class="col-lg-4 col-md-5 col-sm-4 fs_small color_light fw_light t_xs_align_c htp_offset p_xs_top_0 p_xs_bottom_0"><p class="scheme_color"></p></div>
<div class="col-lg-4 col-md-5 col-sm-4 fs_small color_light fw_light t_xs_align_c htp_offset p_xs_top_0 p_xs_bottom_0">
<!--currency-->
<div class="f_right relative transform3d">
<b class="scheme_color"><i class="fa fa-phone"></i> <?  echo $empresa['fijo']; ?></b>
</div></div></div></div></div>
<div class="header_middle_part t_xs_align_c">
<div class="container">
<div class="d_table w_full d_xs_block">
<div class="col-lg-4 col-md-4 col-sm-4 d_table_cell d_xs_block f_none v_align_m m_xs_bottom_15">
<!--logo-->
<a href="/" title="Inicio" class="d_inline_b"><img src="/img/logo.png?<? echo $empresa['act']; ?>" alt="<? echo $dominio; ?>"></a>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 d_table_cell d_xs_block f_none v_align_m">
<div class="clearfix">
<div class="clearfix f_right f_xs_none d_xs_inline_b m_xs_bottom_15 t_xs_align_l">
<!--carrito-->
<div class="f_right relative transform3d">
<? if ($_SESSION["carrito"]["articulos_total"]>0) { ?>

	 
		<button class="button_type_1 tr_all second_font color_dark grey state_2 fs_small" data-open-dropdown="#carrito"><i class="fa fa-shopping-bag d_inline_m m_right_5"></i> Carrito</button>
		<div id='carrito' data-show="fadeInUp" data-hide="fadeOutDown" class="dropdown bg_grey_light login_dropdown animated">
			<?
			
		echo "".$_SESSION["carrito"]["articulos_total"]." Articulos en su carro <p>";
		  
			 
		 	?>
			<p>&nbsp;</p>
			<a href="/tienda/carrito"  class="button_type_2 d_block  t_align_c   bg_green tr_all second_font fs_medium tt_uppercase" style="background-color: green; margin:5px;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Ver Carro</a>
			<p>&nbsp;</p>
			<span style="float:right"><a href="/tienda/"  > Contin&uacute;a Comprando <i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>
			
			</div>
<? } else { ?>

	<button  class="button_type_1 tr_all second_font color_dark grey state_2 fs_small" data-open-dropdown="#carrito"><a href="/tienda"><i class="fa fa-shopping-bag d_inline_m m_right_5"></i> Tienda</a></button>
			
<? } ?>	 
</div>
<!--login-->
<div class="f_right m_right_3 relative transform3d">
<button class="button_type_1 tr_all second_font color_dark grey state_2" data-open-dropdown="#login"><i class="fa fa-phone d_inline_m m_right_5"></i> <span class="fs_small">Te llamamos</span></button>
<div id="login" data-show="fadeInUp" data-hide="fadeOutDown" class="dropdown bg_grey_light login_dropdown animated">
<form action="/llamamos.php" method="post" id="llamamosform" class="m_bottom_15">
<ul>
<li class="m_bottom_15">
<label for="name" class="second_font m_bottom_4 d_inline_b fs_medium">Nombre</label>
<input type="text" name="name" id="name" placeholder="Su nombre" class="w_full tr_all" required/>
</li>
<li class="m_bottom_20">
<label for="telefono" class="second_font m_bottom_4 d_inline_b fs_medium">Tel&eacute;fono</label>
<input type="text" name="telefono" id="telefono" placeholder="Su Tel&eacute;fono" class="w_full tr_all" required/>
</li>
<li>
<button type="submit" value="Enviar" class="t_align_c tt_uppercase w_full second_font d_block fs_medium button_type_2 lbrown tr_all">Enviar</button>
</li>
</ul>
</form>
</div></div></div></div></div></div></div></div>
<div class="header_bottom_part bg_white w_inherit">
<div class="container">
<hr class="divider_black">
<div class="row">
<div class="col-lg-12 col-md-12">
<button id="mobile_menu_button" class="vc_child d_xs_block db_xs_centered d_none m_bottom_10 m_top_15 bg_lbrown color_white tr_all"><i class="fa fa-navicon d_inline_m"></i> MEN&Uacute;</button>
<!--main menu-->
<nav role="navigation" class="d_xs_none">
<ul class="main_menu relative hr_list second_font fs_medium " >

	<? $consulta="Select seo,categoria,id FROM categoriasproductos WHERE superior='1' AND id!='1' ORDER BY categoria ASC ";
		$sql= mysql_query($consulta,$conex);
		while ($cate=mysql_fetch_array($sql)){
			
			echo '<li><a title="'.$cate[1].'" href="/tienda/categoria/'.$cate[0].'" class="tt_uppercase tr_delay">'.$cate[1].'<i class="fa fa-caret-down tr_inherit d_inline_m m_left_5 m_md_left_2"></i></a>';
		
				$consulta2="Select seo,categoria FROM categoriasproductos WHERE superior='".$cate[2]."' ORDER BY categoria ASC ";
				$sql2= mysql_query($consulta2,$conex);
				echo '<ul class="sub_menu bg_grey_light tr_all">';
				while ($subcate=mysql_fetch_array($sql2)){
					
					echo '<li><a title="'.$subcate[1].'" href="/tienda/categoria/'.$cate[0].'/'.$subcate[0].'" class="tt_uppercase tr_delay">'.$subcate[1].'<i class="fa fa-caret-right tr_inherit d_inline_m m_left_5 m_md_left_2"></i></a>';
				}
				echo '</ul>';
				echo '</li>';
		}
?>
		
</ul>
</nav>
</div></div></div></div>
</header>



<? include ('pag-'.$_GET['pag'].'.php'); ?>





<!--footer-->
<footer role="contentinfo" class="bg_grey_light_2">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">SiteMap</h5>
<hr class="divider_bg m_bottom_25">
<ul class="second_font vr_list_type_1 with_links">

	<li class="m_bottom_14"><a title="Accede a nuestra tienda" href="/tienda" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Tienda</a></li>
	<li class="m_bottom_14"><a title="Consejos" href="/blog" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Blog</a></li>
	<li class="m_bottom_14"><a title="Contacta con nosotros" href="/contacto" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Contacto</a></li>
	<li class="m_bottom_14"><a title="Acceso a clientes" href="/clientes" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>&Aacute;rea clientes</a></li>
	
	
	
	
	
	<? if (strpos($empresa['idiomabase'], ',')==true) { ?>
	
	<li class="m_bottom_14 "> <i class="fa fa-caret-right"></i> &nbsp; Idiomas:<p>&nbsp;</p>
				<!-- GTranslate: https://gtranslate.io/ -->
				
			<?

				$idiomas=explode(',',$empresa['idiomabase']);
				$idiomabase=$idiomas[0];
				foreach ($idiomas as $idioma){
					$idioma=trim($idioma);
					echo '<a href="#" onclick="doGTranslate(\''.$idiomabase.'|'.$idioma.'\');return false;"  >
					<img src="/flag/'.$idioma.'.gif"   height="10"   /></a>';
				}

			?>			
				
				
			 
			<style type="text/css">
			<!--
			a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
			a.gflag img {border:0;}
			a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
			#goog-gt-tt {display:none !important;}
			.goog-te-banner-frame {display:none !important;}
			.goog-te-menu-value:hover {text-decoration:none !important;}
			body {top:0 !important;}
			#google_translate_element2 {display:none!important;}
			-->
			</style>

			<div id="google_translate_element2"></div>
			<script type="text/javascript">
			function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: '<? echo $idiomabase; ?>',autoDisplay: false}, 'google_translate_element2');}
			</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


			<script type="text/javascript">
			/* <![CDATA[ */
			eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
			/* ]]> */
			</script>
	
			 
	
	
	</li>
	<? } ?>
	</ul>
	
	
	
	
</div>
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Blog</h5>
<hr class="divider_bg m_bottom_25">
	<ul class="second_font vr_list_type_1 with_links">
	
	<?
	//categorias


	$consulta="Select * FROM categorias WHERE superior='1' AND id!='1' ORDER BY categoria LIMIT 5 ";
		$sql= mysql_query($consulta,$conex);
		
		while ($cate=mysql_fetch_array($sql)){
			
			echo '<li class="m_bottom_14"><a title="'.$cate['categoria'].'" href="/blog/categoria/'.$cate['seo'].'" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>'.$cate['categoria'].'</a></li>
		';
		}


?>	
		 </ul>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Informaci&oacute;n</h5>
<hr class="divider_bg m_bottom_25">
<ul class="second_font vr_list_type_1 with_links">
	<li class="m_bottom_14"><a title="Gu&iacute;a de Compra" href="/pag/guia" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Gu&iacute;a de Compra</a></li>
	<li class="m_bottom_14"><a title="Garant&iacute;as" href="/pag/garantia" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Garant&iacute;as</a></li>
	<li class="m_bottom_14"><a title="Politica de Privacidad" href="/pag/legal" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Politica de Privacidad</a></li>
</ul>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_35 m_xs_bottom_30">
<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Contacto</h5>
<hr class="divider_bg m_bottom_25">
<p class="second_font m_bottom_15"><i class="fa fa-map-marker color_dark"></i> <? echo $empresa['empresa']; ?> - <? echo $emp['direccion']; ?> <? echo $emp['cp']; ?> <? echo $emp['localidad']; ?> <? echo $emp['provincia']; ?></p>
<ul class="second_font vr_list_type_2 m_bottom_20">
<li><i class="fa fa-phone color_dark fs_large"></i><? echo $empresa['fijo']; ?></li>
</ul>
<ul class="hr_list">
	<? if ($empresa['facebook']) { ?>
		<li class="m_right_3 m_bottom_3">
		<a title="<? echo $empresa['empresa']; ?> en  Facebook" href="<? echo $empresa['facebook']; ?> " onClick="this.target='_blank'" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fa fa-facebook fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Facebook</span></a>
		</li>
	<? } ?>
	<? if ($empresa['twitter']) { ?>
		<li class="m_right_3 m_bottom_3">
		<a title="<? echo $empresa['empresa']; ?> en  Twitter" href="<? echo $empresa['twitter']; ?>" onClick="this.target='_blank'" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fa fa-twitter fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Twitter</span></a>
		</li>
	<? } ?>
	<? if ($empresa['googleplus']) { ?>
		<li class="m_right_3 m_bottom_3">
		<a title="s<? echo $empresa['empresa']; ?> en  Google+" href="<? echo $empresa['googleplus']; ?>" onClick="this.target='_blank'" rel="publisher" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fa fa-google-plus fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Google Plus</span></a>
		</li>
	<? } ?>
</ul>
</div>
</div>
</div>
</div>
<hr class="divider_black m_bottom_13">
<div class="d_table w_full d_xs_block t_xs_align_c">
<div class="col-lg-6 col-md-6 col-sm-6 color_light fw_light f_none d_table_cell v_align_m d_xs_block m_xs_bottom_10"> &nbsp; &copy;  <? echo date('Y'); ?>
  <a href='https://esepress.com'>esepress.com</a> . Todos los Derechos Reservados.</div>
<div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c f_none d_table_cell v_align_m d_xs_block">
<ul class="hr_list d_inline_b">
<li class="m_right_5"><img src="/images/formasdepago.png" alt="Paypal"></li>
 
</ul>
</div>
</div>
</div>
</footer>
</div>
<!--back to top-->
<button class="back_to_top animated button_type_6 grey state_2 d_block black_hover f_left vc_child tr_all"><i class="fa fa-angle-up d_inline_m"></i></button>


 
 
<!--theme initializer-->
<script src="js/themeCore.js"></script>
<script src="js/theme.js"></script>

<!--libs include-->
<script src="/js/jquery-2.1.1.min.js"></script>

<script src="/js/modernizr.js"></script>
<script src="/plugins/layerslider/js/greensock.js"></script>
<script src="/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="/plugins/layerslider/js/layerslider.transitions.js"></script>
<script src="/plugins/jquery.appear.js"></script>
<script src="/plugins/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="/plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="/plugins/jquery.easytabs.min.js"></script>
<script src="/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="/plugins/twitter/jquery.tweet.min.js"></script>
<script src="/plugins/flickr.js"></script>
<script src="/plugins/afterresize.min.js"></script>
<script src="/plugins/jackbox/js/jackbox-packed.min.js"></script>
<script src="/js/retina.min.js"></script>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="/js/ajax.js"></script>
<script type="text/javascript">
  $('select').select2();
</script>
 
 
<!--theme initializer-->
<script src="/js/themeCore.js"></script>
<script src="/js/theme4.js"></script>

</body>
</html>
