<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
		$sql="DELETE FROM `noticias`  WHERE  `id` =".$_GET['id'].";";
		
	mysql_query($sql,$conex);
		$error="La noticia ha sido eliminada";
		 
}


//GESTION DE SEO
	if ($_POST['titulo']){
	$seo=amigo($_POST['titulo']);
       //Si ya existe ese seo, le insertamos otro
		if ($_POST['id']){$AND=" AND id!=".$_POST['id']."";$ID=$_POST['id'];}else{$ID=rand(0,100);}
		
		$consulta= "SELECT id FROM `noticias`  WHERE  `seo` ='".$seo."' ".$AND.";";
		 
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
		
		if ($existe[0]){$seo.=$ID;}
		 
	}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	$fechas=explode ('/',$_POST['fecha']);
	
	$fecha=$fechas[2]."-".$fechas[0]."-".$fechas[1];
	$sql="UPDATE  `noticias` SET  `titulo` =  '".addslashes($_POST['titulo'])."',
						`subtitulo` =  '".$_POST['subtitulo']."',
						`activo` =  '".$_POST['activo']."',
						`texto` =  '".addslashes($_POST['texto'])."',
						`fecha` =  '".$fecha."',
						`seo` =  '".$seo."',
						`url` =  '".$_POST['url']."'  WHERE  `id` =".$_POST['id'].";";
		 
		 
		
	mysql_query($sql,$conex);
		$error="Modificaci&oacute;n realizada";
}


//CREAR NOTICIA
//INSERTAMOS NUEVA NOTICIA Y SUBIMOS IMAGEN
				
if ($_POST['accion']=="nueva") {				
   

	  
		$consulta2="SELECT * FROM `tmp` WHERE id='1' limit 1";
		$sql2=mysql_query($consulta2,$conex);
		$foto=mysql_fetch_array($sql2);
		$img=$foto[1];
		$img = mysql_escape_string($img);
	 
        # Agregamos la imagen a la base de datos
       
		$consulta="INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `texto`, `activo`, `url`, `foto`, `fecha`, `seo`)
		VALUES (NULL, '".addslashes($_POST['titulo'])."', '".$_POST['subtitulo']."', '".addslashes($_POST['texto'])."', '0', '".$_POST['url']."','".$img."', CURRENT_DATE(), '".$seo."' );";
		
 
 

		mysql_query($consulta,$conex);
		mysql_query("UPDATE tmp SET foto='' WHERE id='1'; ",$conex);
		
		$error="El borrador ha sido guardado";

}
?>


<section class="content-header">
      <h1>
        Blog <small>Entradas</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Blog</li>
        <li class="active">Entradas</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Entradas</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nueva" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>IMG</th>
                  <th>Titulo</th>
				   <th>Estado</th>
				  <th>Categoria</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				$consulta="select  id, categoria   from categorias ";
				 
				$sql=mysql_query($consulta,$conex);
				while($categorias=mysql_fetch_array($sql)){
					
					$cate[$categorias[0]]=$categorias[1];
					
				}
 
				$consulta="select  id, titulo, subtitulo, foto, url, fecha, activo,texto,act  from noticias   order by fecha DESC, id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
					//foto o nada
	  if ($campo['foto']){
				
				$image=$folderAdmin."/img.php?id=".$campo['id']."&".date('mi').rand(111,999);
				
				
				
			}
			else{
				
				if ($campo['url']){$image="http://img.bitpixels.com/getthumbnail?code=51068&size=480&url=".$campo['url'];}
			 
				
				
				
			}
			
					
					
					
					
					
					
					
					
					echo "<tr id='tr".$campo[0]."'>
						<td><span style='display:none;'>".$campo[0]."</span> 
					<img src='".$image."' class=' img-thumbnail'  style='width:100px;'    onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					";
					echo "<td><strong>".$campo[1]."</strong><br>".substr (strip_tags ($campo['texto']),0,90)."...</td>";
					
					echo "<td>";
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=noticias&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >Borrador</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=noticias&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Publicada</i>  ";}
					echo "<br>".$campo['fecha']."</td>";
					
					
					
					
					echo "<td>".$cate[$campo[2]]."</td>
					<td  ><span style='display:none;'>".$campo['act']."</span>";
		 
		 
			// if ($campo['activo']=="0"){echo "<a href='/admin/editar/".$campo[0]."?".$rand."'><i class='fa fa-floppy-o red-text'></i></a> &nbsp;"; }
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/listado/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					echo "<a href='".$folderAdmin."/editar/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					 
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
        <h4 class="modal-title" id="myModalLabel">Borrar Entrada</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar esta entrada?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>