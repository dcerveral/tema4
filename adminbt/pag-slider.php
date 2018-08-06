<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
		$sql="DELETE FROM `sliders`  WHERE  `id` =".$_GET['id'].";";
		
	mysql_query($sql,$conex);
		$error="El slider ha sido eliminado";
		 
}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	 $sql="UPDATE  `sliders` SET  `titulo` =  '".addslashes($_POST['titulo'])."',
						`subtitulo` =  '".addslashes($_POST['subtitulo'])."',
						`activo` =  '".$_POST['activo']."',
						 
						`boton` =  '".$_POST['boton']."',
						 
						`url` =  '".$_POST['url']."'  WHERE   `id` =".$_POST['id'].";";
		 
		 
		
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
       
		$consulta="INSERT INTO `sliders` (`id`, `titulo`, `subtitulo` , `activo`, `url`, `foto`, `boton` )
		VALUES (NULL, '".addslashes($_POST['titulo'])."', '".addslashes($_POST['subtitulo'])."',  '1', '".$_POST['url']."','".$img."', '". $_POST['boton']."' );";
		
 
 

		mysql_query($consulta,$conex);
		mysql_query("UPDATE tmp SET foto='' WHERE id='1'; ",$conex);
		
		$error="El slider ha sido guardado";

}
?>


<section class="content-header">
      <h1>
        Portada <small>Slider</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Portada</li>
        <li class="active">Slider</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sliders</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevo-slider" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>IMG</th>
                  <th>Subtitulo</th>
				   <th>Titulo</th>
				  <th>Bot&oacute;n</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				 
 
				$consulta="select  *  from sliders   order by  id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
		 
				
				$image=$folderAdmin."/img.php?id=".$campo['id']."&tabla=sliders&".date('mi').rand(111,999);
				
				
				
			 
			
					
					
					
					
					
					
					
					
					echo "<tr id='tr".$campo[0]."'>
						<td><span style='display:none;'>".$campo[0]."</span> 
					<img src='".$image."' class=' img-thumbnail'  style='width:100px;'    onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					";
					echo "<td> ".$campo['subtitulo']."</td>";
					echo "<td> ".$campo['titulo']."<br>";
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=sliders&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >Borrador</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=sliders&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Publicada</i>  ";}
					echo "</td>";
					
					echo "<td> <a href='".$campo['url']."'>".$campo['boton']."</a></td>";
					
					
					
					echo "<td  > ";
		 
		 
			 
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/slider/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					echo "<a href='".$folderAdmin."/editar-slider/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					//echo "<a href='/leer/".$campo[0]."/ver' class='btn btn-info' style='margin:1px;' target='spain'> <i class='fa fa-eye purple-text'></i> </A>";
					
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
        <h4 class="modal-title" id="myModalLabel">Borrar Slider</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar este slider?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>