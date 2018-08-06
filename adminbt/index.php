<?
session_start();
error_reporting(0);

 

include('conex.php');

$rand=rand(0,1000);

if ($_GET['pag']=="logout"){$_SESSION['cargaropciones']="0";$_SESSION['admin']="0";$error="Desconectado";}


 
if ($_POST['adminUsuario'] && $_POST['adminClave'] && $_POST['adminCapcha']){
	
	$consulta="SELECT id from empresa WHERE usuario='".$_POST['adminUsuario']."' and clave='".$_POST['adminClave']."' ";
	
	
	 
	
	$sql=mysql_query($consulta,$conex);
	$identificado=mysql_fetch_array($sql);
	$_SESSION['admin']=$identificado[0];
	if (!$identificado[0]){$error="Acceso Denegado";}
	
}

//actualizamos menu
$_SESSION['menu']="";

//CARGAMOS LA WEB SI ESTA IDENTIFICADO
if ($_SESSION['admin']=="1") {

 
	
	
	


?>


 <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><? echo $dominio; ?> - Panel de control</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<? echo $folderAdmin; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<? echo $folderAdmin; ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css"> 

 

    <!-- Select2 -->
	<? if ($_GET['pag']!="stat") { ?>
	<link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/select2/select2.min.css">
	
	<? } ?>
	<link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/iCheck/all.css">
	<link rel="stylesheet" href="<? echo $folderAdmin; ?>/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 
	  <link rel="stylesheet" href="<? echo $folderAdmin; ?>/plugins/datepicker/datepicker3.css">
	  
  <link rel="shortcut icon" href="https://my1.es/img/logoredondo.png">
  
  <style>
  a{cursor:hand; cursor:pointer;}
  </style>
</head>
<!--
BODY TAG OPTIONS:
  Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red  sidebar-mini <? echo $_SESSION['sidebar-collapse']; ?>">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header ">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size:0.5em;"><b>Fpanel</b></span> 
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><? echo $DOMINIO; ?></b> </span> 
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" onclick="menu();">
        <span class="sr-only">MENU</span>
      </a>
	  
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        
      </div>
    </nav>
  </header>
  
  
  
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar ">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
       
        <!-- Optionally, you can add icons to the links-->
        <li class="<? if ($_GET['pag']=="home") {echo "active";} ?>"><a href="<? echo $folderAdmin; ?>/"><i class="fa fa-th "></i> <span>Inicio  </span></a></li>
       
	   
	    <li class="treeview  <? if ($_GET['pag']=="categorias-productos" || $_GET['pag']=="editarcategoriaproductos" || $_GET['pag']=="nuevacatprod" || $_GET['pag']=="fabricantes" || $_GET['pag']=="editar-fabricante" || $_GET['pag']=="nuevo-fabricante" || $_GET['pag']=="productos" || $_GET['pag']=="editar-producto" || $_GET['pag']=="nuevo-producto" || $_GET['pag']=="impuestos" || $_GET['pag']=="editar-impuesto" || $_GET['pag']=="nuevo-impuesto"  ) {echo "active";} ?>"> 
          <a href="categorias" > <i class="fa fa-shopping-bag"></i> <span>Catalogo</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
				<li  <? if ($_GET['pag']=="productos" || $_GET['pag']=="editar-producto" || $_GET['pag']=="nuevo-producto"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/productos?<? echo date('mi'); ?><? echo rand(111,999); ?>"> Productos</a></li>
				<li  <? if ($_GET['pag']=="categorias-productos" || $_GET['pag']=="editarcategoriaproductos" || $_GET['pag']=="nuevacatprod"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/categorias-productos?<? echo date('mi'); ?><? echo rand(111,999); ?>">Categorias</a></li>
				<li  <? if ($_GET['pag']=="fabricantes" || $_GET['pag']=="editar-fabricante" || $_GET['pag']=="nuevo-fabricante"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/fabricantes?<? echo date('mi'); ?><? echo rand(111,999); ?>">Fabricantes</a></li>
				
				 
				
          </ul>
        </li>
		
		
	   <li class="treeview  <? if ($_GET['pag']=="clientes" || $_GET['pag']=="editar-cliente" || $_GET['pag']=="nuevo-cliente" || $_GET['pag']=="pagos" || $_GET['pag']=="editar-pago" || $_GET['pag']=="nuevo-pago" || $_GET['pag']=="envios" || $_GET['pag']=="editar-envio" || $_GET['pag']=="nuevo-envio" || $_GET['pag']=="pedidos" || $_GET['pag']=="editar-pedido" || $_GET['pag']=="nuevo-pedido" || $_GET['pag']=="zonas" || $_GET['pag']=="editar-zona" || $_GET['pag']=="nueva-zona"  ) {echo "active";} ?>"> 
          <a href="categorias" > <i class="fa fa-truck"></i> <span>Pedidos</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
				<li  <? if ($_GET['pag']=="pedidos" || $_GET['pag']=="editar-pedido" || $_GET['pag']=="nuevo-pedido"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/pedidos?<? echo date('mi'); ?><? echo rand(111,999); ?>">Pedidos</a></li>
				<li  <? if ($_GET['pag']=="clientes" || $_GET['pag']=="editar-cliente" || $_GET['pag']=="nuevo-cliente"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/clientes?<? echo date('mi'); ?><? echo rand(111,999); ?>">Clientes</a></li>
				<li  <? if ($_GET['pag']=="envios" || $_GET['pag']=="editar-envio" || $_GET['pag']=="nuevo-envio"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/envios?<? echo date('mi'); ?><? echo rand(111,999); ?>">Formas de Envio</a></li>
				<li  <? if ($_GET['pag']=="pagos" || $_GET['pag']=="editar-pago" || $_GET['pag']=="nuevo-pago"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/pagos?<? echo date('mi'); ?><? echo rand(111,999); ?>">Formas de Pago</a></li>
				<li  <? if ($_GET['pag']=="zonas" || $_GET['pag']=="editar-zona" || $_GET['pag']=="nueva-zona"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/zonas?<? echo date('mi'); ?><? echo rand(111,999); ?>">Zonas</a></li>
				 
				 
				 
				 
          </ul>
        </li>
		
		
		<li class="treeview  <? if ($_GET['pag']=="listado" || $_GET['pag']=="nuevacat" || $_GET['pag']=="nueva" || $_GET['pag']=="editar"  || $_GET['pag']=="categorias" || $_GET['pag']=="editarcategoria") {echo "active";} ?>"> 
          <a href="categorias" > <i class="fa fa-newspaper-o"></i> <span>Blog</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
				<li  <? if ($_GET['pag']=="listado" || $_GET['pag']=="editar" || $_GET['pag']=="nueva"  ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/listado?<? echo date('mi'); ?><? echo rand(111,999); ?>">Entradas</a></li>
				<li  <? if ($_GET['pag']=="categorias" || $_GET['pag']=="editarcategoria" || $_GET['pag']=="nuevacat" ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/categorias?<? echo date('mi'); ?><? echo rand(111,999); ?>">Categorias</a></li>
				
          </ul>
        </li>
		
		
		
		<li class="treeview  <? if ($_GET['pag']=="slider" || $_GET['pag']=="nuevo-slider"  || $_GET['pag']=="editar-box"  || $_GET['pag']=="editar-slider" || $_GET['pag']=="boxs"  || $_GET['pag']=="iconos"   ) {echo "active";} ?>"> 
          <a href="categorias" > <i class="fa fa-window-restore"></i> <span>Portada</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
			<li  <? if ($_GET['pag']=="slider" || $_GET['pag']=="nuevo-slider" || $_GET['pag']=="editar-slider") {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/slider?<? echo date('mi'); ?><? echo rand(111,999); ?>">Slider</a></li>
           	 <li <? if ($_GET['pag']=="boxs"|| $_GET['pag']=="editar-box"  ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/boxs?<? echo date('mi'); ?><? echo rand(111,999); ?>">Boxs</a></li>
			<li <? if ($_GET['pag']=="iconos" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/iconos?<? echo date('mi'); ?><? echo rand(111,999); ?>">Iconos</a></li>
			 
          </ul>
        </li>
		
		
		
	   <li class="treeview  <? if ($_GET['pag']=="usuario" || $_GET['pag']=="contacto"  || $_GET['pag']=="seo" || $_GET['pag']=="local" || $_GET['pag']=="social" ) {echo "active";} ?>"> 
          <a href="categorias" > <i class="fa fa-building"></i> <span>Datos</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
			<li  <? if ($_GET['pag']=="usuario" ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/usuario?<? echo date('mi'); ?><? echo rand(111,999); ?>">Usuario</a></li>
           	 <li <? if ($_GET['pag']=="contacto" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/contacto?<? echo date('mi'); ?><? echo rand(111,999); ?>">Contacto</a></li>
			<li <? if ($_GET['pag']=="seo" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/seo?<? echo date('mi'); ?><? echo rand(111,999); ?>">SEO</a></li>
			<li <? if ($_GET['pag']=="social" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/social?<? echo date('mi'); ?><? echo rand(111,999); ?>">R. Sociales</a></li>
			<li <? if ($_GET['pag']=="local" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/local?<? echo date('mi'); ?><? echo rand(111,999); ?>">Conf. Local</a></li>
			 
          </ul>
        </li>
		
		<li class="treeview  <? if ($_GET['pag']=="opciones"   ) {echo "active";} ?>"> 
          <a   > <i class="fa fa-cube"></i> <span>P&aacute;ginas</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
				<li  <? if ($_GET['id']=="1" ) {echo "class='active' ";} ?>><a href="<? echo $folderAdmin; ?>/opciones/1?<? echo date('mi'); ?><? echo rand(111,999); ?>">Legal</a></li>
				<li <? if ($_GET['id']=="2" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/opciones/2?<? echo date('mi'); ?><? echo rand(111,999); ?>">Guia</a></li>
				<li <? if ($_GET['id']=="3" ) {echo "class='active' ";} ?> ><a href="<? echo $folderAdmin; ?>/opciones/3?<? echo date('mi'); ?><? echo rand(111,999); ?>">Garantía</a></li>
				
          </ul>
        </li>
		
		
		<li class="treeview" > 
          <a > <i class="fa fa-server"></i> <span>Servidor</span>
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
				<li><a href="https://<? echo $dominio; ?>/cpanel" target="cpanel">Panel Control</a></li>
           	  	<li><a href="https://<? echo $dominio; ?>/webmail" target="cpanel">Webmail</a></li>
          </ul>
        </li>
		
		
		 <li  ><a href="<? echo $folderAdmin; ?>/logout"> <i class="fa fa-sign-out"></i> <span>Salir</span></a></li>
				
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <div class="content-wrapper"> 
  
  
	
	 
	
   <?  if (!$_GET['pag']) {$_GET['pag']="home";}
		
		include ('pag-'.$_GET['pag'].".php");

		 
   ?> 
    
  
   
    </div>
  <!-- /.content-wrapper -->

  
   <? if ($error) { ?>
	
	 
		<div class="alert alert-warning alert-dismissible"  id="msgalert" style="position:fixed; bottom:1px; right:15px;z-index:1000" onclick="this.style.display='none';">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-warning"></i>
                <? echo $error; ?>
        
		</div>
			  
		<script type="text/javascript">
			 
			setInterval(function(){
				document.getElementById("msgalert").style.display='none';
			},5000,"JavaScript");
		</script>	 
	 
	
	<? } ?>
	
<!-- Main Footer -->
 

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 
<div id='oculto' style="width:0px;height:0px;"></div>
<!-- REQUIRED JS SCRIPTS -->
<!-- REQUIRED JS SCRIPTS -->

<script src="<? echo $folderAdmin; ?>/js/ajax.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<? echo $folderAdmin; ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<? echo $folderAdmin; ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<? echo $folderAdmin; ?>/dist/js/app.min.js"></script>

<? if ($_GET['pag']!="stat") { ?>
<script src="<? echo $folderAdmin; ?>/plugins/select2/select2.full.min.js"></script>
<? } ?>
<!-- CK Editor -->
<script src="<? echo $folderAdmin; ?>/plugins/ckeditor/ckeditor.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="<? echo $folderAdmin; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<? echo $folderAdmin; ?>/plugins/iCheck/icheck.min.js"></script>
 
<script src="<? echo $folderAdmin; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<? echo $folderAdmin; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
 
<script src="<? echo $folderAdmin; ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 
<script src="<? echo $folderAdmin; ?>/plugins/fastclick/fastclick.js"></script>

 
<script src="<? echo $folderAdmin; ?>/dist/js/demo.js"></script>
 
 <script src="<? echo $folderAdmin; ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
 
 
<script>
$(document).ready(function(){
	
	 
 
       
 
 
	$.fn.select2.defaults.set("theme", "classic");
	
	
	 
				
				
	$(".js-example-tags").select2({
		  tags: true
		   
		})



	 $('[data-toggle="popover"]').popover(); 
	
	
  $('input').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-green',
      radioClass: 'iradio_line-green',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
});

$('input').on('ifUnchecked', function(event){
  document.getElementById('checkerror').style.display='inline';
});
$('input').on('ifChecked', function(event){
  document.getElementById('checkerror').style.display='none';
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
           "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Del _START_ al _END_   de _TOTAL_ ",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "https://my1.es",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando..."
        },
		
		 "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
	  "scrollX": true,
	  "order": [[ 0, 'desc' ]],
      "autoWidth": true		
		
		
		
		
		
		
    } );
    $('#example2').DataTable({
		
		
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
	
	 $('#example3').DataTable({
		
		
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
	
  });
</script>



<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
   CKEDITOR.replace( 'editor');
   CKEDITOR.replace( 'editor1');
   CKEDITOR.replace( 'editor2');
   CKEDITOR.replace( 'editor3');
   CKEDITOR.replace( 'editor4');
   CKEDITOR.replace( 'editor5');
   CKEDITOR.replace( 'editor6');
   CKEDITOR.replace( 'editor7');
   CKEDITOR.replace( 'editor8');
  

    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
	
	
  });
  
 
</script>
	 
<script type="text/javascript"> 
  $('select').select2();
  
   $('#datepicker').datepicker({
      autoclose: true
    });
	
	
</script>

<script type="text/javascript">
  function menu(){
	  
	  llamarasincrono('<? echo $folderAdmin; ?>/ajax-menu.php','oculto');
	  
  }
</script>
 




</body>
</html>

<?
}else {INCLUDE ('login.php');}

?>


<? 

	//FUNCIONES
	function amigo($url) {

// Tranformamos todo a minusculas

$url = strtolower($url);

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n');

$url = str_replace ($find, $repl, $url);

// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('-', '-', '-');

$url = preg_replace ($find, $repl, $url);

return $url;

}
?>









<? mysql_free_result(); ?>