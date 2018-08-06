<?


//OPCIONES

if ($_POST){
	
	//DATOS
	$par=0;
	 foreach ( $_POST["datos"] as $valor ) { 
	 
			if ($valor){
				if ($par==0){$valores.=$valor.":";$par=1;}else{$valores.=$valor.";";$par=0;}
			}
	 	}
		 
		 
	//OPCIONES
	$par=0;
	 foreach ( $_POST["opciones"] as $opcion ) { 
	 
			if ($opcion){
				if ($par==2){$opciones.=$opcion.";";$par=0;}
				else{$opciones.=$opcion.":";$par++;}
			}
			 
	 	}
}

//BORRAR NOTICIA
 
if ($_GET['id'] )
{
	
	//COMPROBAMOS SI TIENE PEDIDOS
	
		$consulta="SELECT id FROM `lineas`  WHERE  `idproducto` =".$_GET['id'].";";
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
	
		 
		
		if (!$existe[0]){
	
			$sqldel="DELETE FROM `productos`  WHERE  `id` =".$_GET['id'].";";
			 
			mysql_query($sqldel,$conex);
			$error="El producto ha sido eliminado";
		} else {
			$error="ERROR: Producto con pedidos";
			?><script>alert("<? echo $error; ?>");</script><?
		}
		 
}
 


//GESTION DE SEO
	if ($_POST['titulo']){
	$seo=amigo($_POST['titulo']);
       //Si ya existe ese seo, le insertamos otro
		if ($_POST['id']){$AND=" AND id!=".$_POST['id']."";$ID=$_POST['id'];}else{$ID=rand(0,100);}
		
		$consulta= "SELECT id FROM `productos`  WHERE  `seo` ='".$seo."' ".$AND.";";
		 
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
		
		if ($existe[0]){$seo.=$ID;}
		 
	}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	
		 
		 
		
		
		
	$fechas=explode ('/',$_POST['fecha']);
	
	$fecha=$fechas[2]."-".$fechas[0]."-".$fechas[1];
	$sql="UPDATE  `productos` SET  `titulo` =  '".addslashes($_POST['titulo'])."',
						`subtitulo` =  '".$_POST['subtitulo']."',
						`activo` =  '".$_POST['activo']."',
						`texto` =  '".addslashes($_POST['texto'])."',
						`fecha` =  '".$fecha."',
						`seo` =  '".$seo."',
						`neto` =  '".$_POST['neto']."',
						`descuento` =  '".$_POST['descuento']."',
						`impuesto` =  '".$_POST['impuesto']."',
						`tipo` =  '".$_POST['tipo']."',
						`peso` =  '".$_POST['peso']."',
						`dias` =  '".$_POST['dias']."',
						`fabricante` =  '".$_POST['fabricante']."',
						`datos` =  '".addslashes($valores)."',
						`pdfname` =  '".addslashes($_POST['pdfname'])."',
						
						`ref` =  '".addslashes($_POST['ref'])."',
						`opciones` =  '".addslashes($opciones)."',
						`url` =  '".$_POST['url']."'  WHERE  `id` =".$_POST['id'].";";
		 
		 
		
	mysql_query($sql,$conex);
	
	//GUARDAMOS LAS OPCIONES EN OTRA TABLA
	 
		//primero boramos
		mysql_query("DELETE FROM `opcionespro` WHERE `idpro`='".$_POST['id']."'; ",$conex);
	 
		$opciones=explode(';',$opciones);
	
		foreach ($opciones as &$valor) {
			$valores=explode(':',$valor); 
			if ($valor){
				$csql="INSERT INTO  `opcionespro` (`id`,`tipo`, `valor`, `neto`, `idpro`) VALUES (NULL,";
				foreach ($valores as &$campos) {
					
						$csql.="'".$campos."', ";		
							
				}
				$csql.=" '".$_POST['id']."');";
			 
				 mysql_query($csql,$conex);
			}
		}
	
	
	
	
	
	
	
	
	
	
		$error="Modificaci&oacute;n realizada";
}



?>


<section class="content-header">
      <h1>
        Catalogo <small>Productos</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Catalogo</li>
        <li class="active">Productos</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevo-producto" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>IMG</th>
				  <th>Ref</th>
                  <th>Titulo</th>
				   <th>Estado</th>
				  <th>Categoria</th>
				  <th>Neto</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				$consulta="select  id, categoria   from categoriasproductos ";
				 
				$sql=mysql_query($consulta,$conex);
				while($categorias=mysql_fetch_array($sql)){
					
					$cate[$categorias[0]]=$categorias[1];
					
				}
 
				$consulta="select  id, titulo, subtitulo, foto, url, fecha, activo,texto,act,ref,neto,tipo  from productos   order by   id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
					//foto 
				
				$image=$folderAdmin."/img.php?tabla=productos&id=".$campo['id']."&".date('mi').rand(111,999);
				
			 
					
					
					
					
					
					
					
					
					echo "<tr id='tr".$campo[0]."'>
						<td><span style='display:none;'>".$campo[0]."</span> 
					<img src='".$image."' class=' img-thumbnail'  style='width:100px;'    onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					";
					echo "<td>".$campo['ref']."</td>";
					echo "<td><strong>".$campo[1]."</strong><br>".substr (strip_tags ($campo['texto']),0,90)."...</td>";
					
					echo "<td>";
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=productos&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >Out</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=productos&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Stock</i>  ";}
					echo "<br>".ucfirst($campo['tipo'])."</td>";
					
					
					
					
					echo "<td>".$cate[$campo[2]]."</td>";
					echo "<td>".$campo['neto']."</td>";
					echo "<td  ><span style='display:none;'>".$campo['act']."</span>";
		 
		 
			// if ($campo['activo']=="0"){echo "<a href='/admin/editar/".$campo[0]."?".$rand."'><i class='fa fa-floppy-o red-text'></i></a> &nbsp;"; }
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/productos/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					echo "<a href='".$folderAdmin."/editar-producto/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					 
					echo "</td></tr>";
				}
				echo "</table>";
?>

                </tbody>
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 

</div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar Producto</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar este producto?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>

 