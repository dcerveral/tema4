<?

// session_destroy();

//DATOS GENERALES DE LA EMPRESA

$consulta="SELECT * FROM empresa WHERE id=1";
$sql=mysql_query($consulta,$conex);
$empresa=mysql_fetch_array ($sql);

	//canonical
	$host = $_SERVER["HTTP_HOST"];
	$url = $_SERVER["REQUEST_URI"];
	$canonical = "https://" . $host . $url;
	
	
	//valores por defecto
	
	$titulo=$empresa['empresa'];
	$descripcion=$empresa['descripcion'];
	$claves=$empresa['palabras'];
 
 
 //GESTION DE ZONAS
 
	//cambiamos zona
	if ($_POST['zona'] || !$_SESSION['zona']){
		$_SESSION['idenvios'] = null;
		$_SESSION['zona']=$_POST['zona'];
		//zona por defecto
		if (!$_SESSION['zona']){$_SESSION['zona']=1;}
		
		//Consultamos la zona
		$moneda=$empresa['monedabase'];
		$cambio=1;
		if (!$_SESSION['zona']){$_SESSION['zona']=1;}
		
		$consulta="SELECT * FROM zonas where id=".$_SESSION['zona']." LIMIT 1";
		$sql=mysql_query($consulta,$conex);
		$zona=mysql_fetch_array($sql);
		$_SESSION['moneda']=$zona['moneda'];
		$_SESSION['cambio']=$zona['cambio'];
		$_SESSION['general']=$zona['general'];
		$_SESSION['reducido']=$zona['reducido'];
		$_SESSION['superreducido']=$zona['superreducido'];
		$_SESSION['nombrezona']=$zona['zona'];
		$_SESSION['isoidioma']=$zona['isoidioma'];
		 
	}
	
	
	
 
 
 
 
 
 
 
 
 
 
 
 
 
	//CONTACTO
	if ($_GET['pag']=="contacto"){
		$titulo=$empresa['empresa'];
		$descripcion="Estamos en ".$empresa['localidad']." envianos un mail o llamanos al telefono ".$empresa['fijo'];
	}
		
	
	//BLOG & SEO
	if ($_GET['pag']=="blog" && $_GET['seo']){
		
		//Datos categorias
		$SEO="/".$_GET['seo'];
		$consulta="SELECT id,seo,categoria,descripcion FROM categorias WHERE seo='".$_GET['seo']."' LIMIT 1";
		 
		$sql=mysql_query($consulta,$conex);
		$categoria=mysql_fetch_array ($sql);

		//SUBCATEGORIAS
		
		$SQL=" AND (subtitulo='".$categoria[0]."'   ";
		
		
		 // Categorias SUPERIORES
		 $consulta="SELECT id  FROM categorias  WHERE superior='".$categoria[0]."' ";
		 
		 $sql=mysql_query($consulta,$conex);
		
		 while ($categoria2=mysql_fetch_array ($sql)){
			 
			 $SQL.="OR subtitulo='".$categoria2[0]."' ";
			 
		 }
		$SQL.=")";
		//seo
		$titulo=$categoria['categoria'];
		$descripcion=$categoria['descripcion'];
		
		//paginacion
			$limite=10;
			if  (!$_GET['p']) {$_GET['p']=1;}
	
		$desde=($_GET['p']*$limite)-$limite;
		$LIMIT="LIMIT ".$desde.",".$limite;
		
		//consulta

		$consulta="Select id,seo,titulo,fecha,texto FROM noticias WHERE activo='1' ".$SQL." ORDER BY fecha DESC ".$LIMIT;
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$not=mysql_fetch_array($sqlseo);
		mysql_data_seek($sqlseo, 0);
	}
	
	
	//BLOG SIN  SEO
	if ($_GET['pag']=="blog" && !$_GET['seo']){
		
		//Datos categorias
		$SEO="";
		
		 
		//paginacion
			$limite=10;
			if  (!$_GET['p']) {$_GET['p']=1;}
	
		$desde=($_GET['p']*$limite)-$limite;
		$LIMIT="LIMIT ".$desde.",".$limite;
		
		//consulta

		$consulta="Select id,seo,titulo,fecha,texto FROM noticias WHERE activo='1'  ORDER BY fecha DESC ".$LIMIT;
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$not=mysql_fetch_array($sqlseo);
		
		//seo
		$titulo=$not['titulo'];
		$descripcion=strip_tags (substr($not['texto'],0,110));
		
		mysql_data_seek($sqlseo, 0);
	}
	
	
	//ENTRADA DEL BLOG
	if ($_GET['pag']=="leer" ){
		
		//Datos categorias
		$SEO="";
		
		 
	
		
		//consulta

		$consulta="Select id,seo,titulo,fecha,texto FROM noticias WHERE activo='1' AND seo='".$_GET['seo']."' LIMIT 1 ";
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$not=mysql_fetch_array($sqlseo);
		
		//seo
		$titulo=$not['titulo'];
		$descripcion=strip_tags (substr($not['texto'],0,110));
		
		mysql_data_seek($sqlseo, 0);
	}
	
	
	
	//PAGINAS FIJAS
	if ($_GET['pag']=="pag" ){
		 
		//consulta

		$consulta="Select * FROM opciones WHERE  opcion='".$_GET['opcion']."' LIMIT 1 ";
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$pag=mysql_fetch_array($sqlseo);
		
		//seo
		$titulo=$empresa['empresa']." - ".ucfirst($pag['opcion']);
		$descripcion=strip_tags (substr($pag['valor'],0,110));
		
		mysql_data_seek($sqlseo, 0);
	}
	
	//TIENDA -> PRODUCTO
	if ($_GET['pag']=="producto" ){
		
		//Datos categorias
		$SEO="";
		
		 
	
		
		//consulta

		$consulta="Select * FROM productos WHERE  seo='".$_GET['seo']."' LIMIT 1 ";
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$pro=mysql_fetch_array($sqlseo);
		
		//seo
		$titulo=$pro['titulo'];
		$descripcion=strip_tags (substr($pro['texto'],0,110));
		
		//Nombre de la categoria
		$consultac="Select seo,categoria FROM categoriasproductos WHERE  id='".$pro[2]."' LIMIT 1 ";
		$sql= mysql_query($consultac,$conex);
		$categoria=mysql_fetch_array($sql);
		 
		 
	}
	
	
	//TIENDA & SEO
	if ($_GET['pag']=="tienda" && $_GET['seo']){
		
		//Datos categorias
		$SEO="/".$_GET['seo'];
		$consulta="SELECT id,seo,categoria,descripcion FROM categoriasproductos WHERE seo='".$_GET['seo']."' LIMIT 1";
		 
		$sql=mysql_query($consulta,$conex);
		$categoria=mysql_fetch_array ($sql);

		 
		$SQL=" AND (subtitulo='".$categoria[0]."'   ";
		
		
		 // Categorias SUPERIORES
		 $consulta="SELECT id  FROM categoriasproductos WHERE superior='".$categoria[0]."' ";
		 
		 $sql=mysql_query($consulta,$conex);
		
		 while ($categoria2=mysql_fetch_array ($sql)){
			 
			 $SQL.="OR subtitulo='".$categoria2[0]."' ";
			 
		 }
		$SQL.=")";
		
	 
		 
		//seo
		$titulo=$categoria['categoria'];
		$descripcion=$categoria['descripcion'];
		
		//paginacion
			$limite=10;
			if  (!$_GET['p']) {$_GET['p']=1;}
	
		$desde=($_GET['p']*$limite)-$limite;
		$LIMIT="LIMIT ".$desde.",".$limite;
		
		//consulta

		$consulta="Select id,seo,titulo,fecha,texto FROM productos WHERE activo='1' ".$SQL." ORDER BY fecha DESC ".$LIMIT;
		
	 
		 
		$sqlseo= mysql_query($consulta,$conex);
		$not=mysql_fetch_array($sqlseo);
		mysql_data_seek($sqlseo, 0);
	}
	
	
	//TIENDA SIN  SEO
	if ($_GET['pag']=="tienda" && !$_GET['seo']){
		
		//Datos categorias
		$SEO="";
		
		 
		//paginacion
			$limite=10;
			if  (!$_GET['p']) {$_GET['p']=1;}
	
		$desde=($_GET['p']*$limite)-$limite;
		$LIMIT="LIMIT ".$desde.",".$limite;
		
		//consulta

		$consulta="Select id,seo,titulo,fecha,texto FROM productos WHERE activo='1'  ORDER BY fecha DESC ".$LIMIT;
		
		 
		$sqlseo= mysql_query($consulta,$conex);
		$not=mysql_fetch_array($sqlseo);
		
		//seo
		$titulo=$not['titulo'];
		$descripcion=strip_tags (substr($not['texto'],0,110));
		
		mysql_data_seek($sqlseo, 0);
	}
	
	//echo $titulo."-".$descripcion;
?>