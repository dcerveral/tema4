<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
	
	
	
	//COMPROBAMOS SI TIENE noticias
	
		$consulta="SELECT id FROM `noticias`  WHERE  `subtitulo` =".$_GET['id'].";";
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
	
		 
		
		if (!$existe[0]){
	
			$consulta="DELETE FROM `categorias`  WHERE  `id` =".$_GET['id'].";";
			mysql_query($consulta,$conex);
			$error="La categoria ha sido eliminada";
		} else {
			$error="ERROR: Categoria con noticias asociadas";
			?><script>alert("<? echo $error; ?>");</script><?
		}
	
	 
		
		 
}

//GESTION DE SEO
	if ($_POST['titulo']){
	$seo=amigo($_POST['titulo']);
       //Si ya existe ese seo, le insertamos otro
		if ($_POST['id']){$AND=" AND id!=".$_POST['id']."";$ID=$_POST['id'];}else{$ID=rand(0,100);}
		
		$consulta= "SELECT id FROM `categorias`  WHERE  `seo` ='".$seo."' ".$AND.";";
		 
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
		
		if ($existe[0]){$seo.=$ID;}
		 
	}
//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	
	$sql="UPDATE  `categorias` SET  `categoria` =  '".$_POST['titulo']."',`seo` =  '".$seo."',  `superior` =  '".$_POST['superior']."' ,  `descripcion` =  '".$_POST['descripcion']."' WHERE
						 
						  `id` =".$_POST['id'].";";
		
	mysql_query($sql,$conex);
		$error="Modificaci&oacute;n realizada";
}


//CREAR NOTICIA
//INSERTAMOS NUEVA NOTICIA Y SUBIMOS IMAGEN
				
if ($_POST['accion']=="nueva") {				
   
		
	
		# Agregamos la imagen a la base de datos
		$consulta2="SELECT * FROM `tmp` WHERE id='1' limit 1";
		$sql2=mysql_query($consulta2,$conex);
		$foto=mysql_fetch_array($sql2);
		$img=$foto[1];
		$img = mysql_escape_string($img);
	 
		
	   
	   
		$consulta="INSERT INTO `categorias` (`id`, `categoria`, `superior`, `foto`, `seo`, `descripcion`)
		VALUES (NULL, '".$_POST['titulo']."', '".$_POST['superior']."','".$img."' ,'".$seo."', '".addslashes($_POST['descripcion'])."');";
		
	 
 

		mysql_query($consulta,$conex);
		mysql_query("UPDATE tmp SET foto='' WHERE id='1'; ",$conex);
		$error="La categoria ha sido creada";
	 

}
?>

<section class="content-header">
      <h1>
        Blog <small>Categorias</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
		<li>Blog</li>
          <li class="active">Categorias</li>
       
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categorias</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevacat" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>IMG</th>
                  <th>Categoria</th>
				  <th>Sup.</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>
                
		 

				<?
				$consulta="select  id, categoria, superior, seo, descripcion  from categorias ORDER BY id DESC  ";
				 
				$sql=mysql_query($consulta,$conex);
				while($categorias=mysql_fetch_array($sql)){
					
					$cate[$categorias[0]]=$categorias[1];
					
				}
				
				mysql_data_seek($sql, 0);
				
				while($campo=mysql_fetch_array($sql)){
					
					echo "<tr id='tr".$campo[0]."'><td  ><span style='display:none;'>".$campo[0]."</span><img src='".$folderAdmin."/imgcat.php?id=".$campo[0]."&".date('is')."' class=' img-thumbnail'  style='width:100px;'     onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					<td class='truncate'>".$campo[1]."<br><i> ".$campo['descripcion']."</i></td>
					<td>".$cate[$campo['superior']]."</td>
					<td style='text-align: center;'>";
		 
					if ($campo[0]==1) {
						
						echo "<a class='btn btn-warning' style='margin:1px;'  ><i class='fa fa-home'></i> </A>";
						}
						else {
						echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/categorias/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
							
						}
					
					echo "<a class='btn btn-success' style='margin:1px;' href='".$folderAdmin."/editarcategoria/".$campo[0]."'><i class='fa fa-pencil-square-o'></i> </A>";
					 
					echo "</td></tr>";
				}
				
				
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
        <h4 class="modal-title" id="myModalLabel">Borrar Categoria</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar esta categoria?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='categorias' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>