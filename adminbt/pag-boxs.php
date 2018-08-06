<?


 

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	 $sql="UPDATE  `boxs` SET  `titulo` =  '".addslashes($_POST['titulo'])."',
						`subtitulo` =  '".addslashes($_POST['subtitulo'])."',
						`activo` =  '".$_POST['activo']."',
						 
						`boton` =  '".$_POST['boton']."',
						 
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
       
		$consulta="INSERT INTO `boxs` (`id`, `titulo`, `subtitulo` , `activo`, `url`, `foto`, `boton` )
		VALUES (NULL, '".addslashes($_POST['titulo'])."', '".addslashes($_POST['subtitulo'])."',  '1', '".$_POST['url']."','".$img."', '". $_POST['boton']."' );";
		
 
 

		mysql_query($consulta,$conex);
		mysql_query("UPDATE tmp SET foto='' WHERE id='1'; ",$conex);
		
		$error="El box ha sido guardado";

}
?>


<section class="content-header">
      <h1>
        Portada <small>Boxs</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Portada</li>
        <li class="active">Boxs</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Boxs</h3>
			  <div class="box-tools pull-right">
               
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
				 
 
				$consulta="select  *  from boxs   order by  id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
		 
				
				$image=$folderAdmin."/img.php?id=".$campo['id']."&tabla=boxs&".date('mi').rand(111,999);
				
				
				
			 
			
					
					
					
					
					
					
					
					
					echo "<tr id='tr".$campo[0]."'>
						<td><span style='display:none;'>".$campo[0]."</span> 
					<img src='".$image."' class=' img-thumbnail'  style='width:100px;'    onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					";
					echo "<td> ".$campo['subtitulo']."</td>";
					echo "<td> ".$campo['titulo']."";
					 	echo "</td>";
					
					echo "<td> <a href='".$campo['url']."'>".$campo['boton']."</a></td>";
					
					
					
					echo "<td  > ";
		 
		 
			 
		 
					echo "<a class='btn btn-info' onclick=\"$('#myModal').modal('show');\"style='margin:1px;' >".$campo[0]."</A>";
					echo "<a href='".$folderAdmin."/editar-box/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					
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
        <h4 class="modal-title" id="myModalLabel">Posiciones de las cajas</h4>
      </div>
      <div class="modal-body" style="overflow:hidden;">
        
		<div class="col-lg-4">
		
			<div class=" bg-purple color-palette text-center">&nbsp;<br>1<br>&nbsp;</div>
			<p>
			<div class=" bg-orange color-palette text-center">&nbsp;<br>2<br>&nbsp;</div>
		</div>
		<div class="col-lg-4 bg-teal color-palette text-center"><p>&nbsp;</p>&nbsp;<br>3<br>&nbsp;<p>&nbsp;</p></div>
		<div class="col-lg-4">
		
			<div class=" bg-maroon color-palette text-center">&nbsp;<br>4<br>&nbsp;</div>
			<p>
			<div class=" bg-navy color-palette text-center">&nbsp;<br>5<br>&nbsp;</div>
		</div>
		 
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>