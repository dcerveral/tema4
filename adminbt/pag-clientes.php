<?

//BORRAR NOTICIA
if ($_GET['id'] )
{
	
	//COMPROBAMOS SI TIENE PEDIDOS
	
		$consulta="SELECT id FROM `pedidos`  WHERE  `idcliente` =".$_GET['id'].";";
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
	
		 
		
		if (!$existe[0]){
	
			$consulta="DELETE FROM `clientes`  WHERE  `id` =".$_GET['id'].";";
			mysql_query($consulta,$conex);
			$error="El Cliente ha sido eliminado";
		} else {
			$error="ERROR: Cliente con pedidos";
			?><script>alert("<? echo $error; ?>");</script><?
		}
		 
}

 if ($_POST['to'] )
{
	
	 
	$para      = $_POST['to'];
	$titulo    =  $_POST['asunto'];
	$mensaje   = $_POST['mensaje'];
	$cabeceras = 'From: '. $emailDef . "\r\n" .
		'Reply-To: '. $emailDef . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	 mail($para, $titulo, $mensaje, $cabeceras);
	
	$para      = $emailDef;
	$titulo    =  $_POST['asunto'];
	$mensaje   = 'Su mensaje ha sido entregado: '. $_POST['mensaje'];
	$cabeceras = 'From: ' . $_POST['to']. "\r\n" .
		'Reply-To:  ' . $_POST['to'] . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	 mail($para, $titulo, $mensaje, $cabeceras);
	 
		$error="El correo ha sido enviado";
		
		
		
}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	 
	$sql="UPDATE  `clientes` SET  
	
						`email` =  '".addslashes($_POST['email'])."',
						`clave` =  '".addslashes($_POST['clave'])."',
						`cif` =  '".addslashes($_POST['cif'])."',
						`nombre` =  '".addslashes($_POST['nombre'])."',
						`direccion` =  '".addslashes($_POST['direccion'])."',
						`cp` =  '".addslashes($_POST['cp'])."',
						`ciudad` =  '".addslashes($_POST['ciudad'])."',
						`provincia` =  '".addslashes($_POST['provincia'])."',
						`pais` =  '".addslashes($_POST['pais'])."',
						`telefono` =  '".addslashes($_POST['telefono'])."',
						`zona` =  '".addslashes($_POST['zona'])."',
						`notas` =  '".addslashes($_POST['notas'])."' 

						 WHERE  `id` =".$_POST['id'].";";
						 
		 
	mysql_query($sql,$conex);
		$error="Cliente actualizado";
}


//CREAR NOTICIA
//INSERTAMOS NUEVA NOTICIA Y SUBIMOS IMAGEN
				
if ($_POST['accion']=="nueva") {				
   
 
       
		$consulta="INSERT INTO `clientes` (`id`, `email`, `clave`, `notas`, `activo`, `cif`, `nombre`, `fecha`, `direccion`, `cp`, `ciudad`, `provincia`, `pais`, `telefono`)
		VALUES (NULL, '".addslashes($_POST['email'])."', '".$_POST['clave']."', '".addslashes($_POST['notas'])."', '0', '".$_POST['cif']."','".$_POST['nombre']."', CURRENT_DATE(), '".$_POST['direccion']."','".$_POST['cp']."','".$_POST['ciudad']."','".$_POST['provincia']."','".$_POST['pais']."','".$_POST['telefono']."'  );";
		 mysql_query($consulta,$conex);
		 
		
		$error="El cliente ha sido guardado";

}
?>


<section class="content-header">
      <h1>
        Pedidos <small>Clientes</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Pedidos</li>
        <li class="active">Clientes</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevo-cliente" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>IMG</th>
                  <th>Nombre</th>
				   <th>Email</th>
				  <th>Tel</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<?  
 
				$consulta="select  *  from clientes   order by   id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
	 
				
				$image="https://www.gravatar.com/avatar/".md5($campo['email'])."?s=64";
				
		 
					
					
					
					
					
					
					
					
					echo "<tr id='tr".$campo[0]."'>
						<td><span style='display:none;'>".$campo[0]."</span> 
					<img src='".$image."' class=' img-thumbnail'  style='width:100px;'    onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"></td>
					";
					echo "<td><strong>".$campo['nombre']."</strong><br><i>".$campo['cif']."</i><br>";
					
					
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=clientes&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >No verificado</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=clientes&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Verificado</i>  ";}
					
					echo "</td>";
					echo "<td>".$campo['email']."</td>";
					echo "<td>".$campo['telefono']."</td>
					<td  ><span style='display:none;'>".$campo['act']."</span>";
		 
		 
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/clientes/".$campo[0]."?".rand(111,999)."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					
					echo "<a class='btn btn-info' style='margin:1px;' onclick=\"document.getElementById('correo').value='".$campo['email']."'; $('#myModal2').modal('show') ;\" ><i class='fa fa-envelope'></i> </A>";
					echo "<a href='".$folderAdmin."/editar-cliente/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					 
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enviar mail a Cliente</h4>
      </div>
      <div class="modal-body">
        <form method='POST' action="" >
		
		
			<div class="form-group">
				<input id='correo' name="to" type="hidden">
			</div>
			<div class="form-group">
                  <label for="asunto">Asunto</label>
                  <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Asunto" required>
            </div>
		
			<div class="form-group">
                  <label>Mensaje</label>
                  <textarea class="form-control" name="mensaje" rows="3" placeholder="Mensaje" required></textarea>
            </div>
			 
			 
				<button style="" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-success" >Enviar</button>
			 
			
			</form>
      </div>
       
		
      </div>
      
        
        
      
    </div>
  </div>
 
 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar Cliente</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar este cliente?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='clientes' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>

