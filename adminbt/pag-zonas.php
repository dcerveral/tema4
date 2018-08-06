<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
	
	//COMPROBAMOS SI TIENE PEDIDOS
	
		$consulta="SELECT id FROM `pedidos`  WHERE  `zona` =".$_GET['id'].";";
		$sql=mysql_query($consulta,$conex);
		$existe=mysql_fetch_array($sql);
	
		$consulta="SELECT id FROM `clientes`  WHERE  `zona` =".$_GET['id'].";";
		$sql=mysql_query($consulta,$conex);
		$existe2=mysql_fetch_array($sql);
		 
		
		if (!$existe[0] && !$existe2[0]){
	
			$consulta="DELETE FROM `zonas`  WHERE  `id` =".$_GET['id'].";";
			mysql_query($consulta,$conex);
			$error="La zona ha sido eliminada";
		} else {
			$error="ERROR: La zona contiene pedidos/clientes";
			?><script>alert("<? echo $error; ?>");</script><?
		}
		 
}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	 
	$sql="UPDATE  `zonas` SET  
	
					`zona` =  '".addslashes($_POST['zona'])."',
					`subzona` =  '".addslashes($_POST['subzona'])."',
					`isopais` =  '".addslashes($_POST['isopais'])."',
					`isoidioma` =  '".strtolower($_POST['isoidioma'])."' ,
					`pais` =  '".addslashes($_POST['pais'])."',
					`idioma` =  '".addslashes($_POST['idioma'])."' ,
					`cambio` =  '".addslashes($_POST['cambio'])."' ,
					`general` =  '".addslashes($_POST['general'])."' ,
					`reducido` =  '".addslashes($_POST['reducido'])."' ,
					`superreducido` =  '".addslashes($_POST['superreducido'])."' ,
					`moneda` =  '".strtolower($_POST['moneda'])."' 
				WHERE  `id` =".$_POST['id'].";";
		 
		 
		
	mysql_query($sql,$conex);
		$error="Modificaci&oacute;n realizada";
}


//CREAR NOTICIA
//INSERTAMOS NUEVA NOTICIA Y SUBIMOS IMAGEN
				
if ($_POST['accion']=="nueva") {				
   
		$consulta="INSERT INTO `zonas` (`id`, `zona`, `subzona`, `pais`, `isoidioma`,`moneda`,`cambio`, `activo`, `general`, `reducido`, `superreducido`)
		VALUES ( NULL , '".$_POST['zona']."', '".addslashes($_POST['subzona'])."', '".addslashes($_POST['pais'])."', '".strtolower($_POST['isoidioma'])."', '".strtolower($_POST['moneda'])."', '".addslashes($_POST['cambio'])."',  '0', '".$_POST['general']."', '".$_POST['reducido']."', '".$_POST['superreducido']."' );";
		 
		
		if (mysql_query($consulta,$conex)){$error="La zona ha sido creado";}
			else  {$error="ERROR: La zona no ha sido creada";}
		

}
?>


<section class="content-header">
      <h1>
        Pedidos <small>Zonas</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Pedidos</li>
        <li class="active">Zonas</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Zonas</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nueva-zona" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  
                  <th>Zona</th>
				  <th>Pais</th>
				  <th>Subzona</th>
				  
				  <th>Conf.</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				 
				$consulta="select  *  from zonas   order by  id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					 
					echo "<td>".ucfirst($campo['zona'])."<br>";
					
					 
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=zonas&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >Inactivo</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=zonas&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Activo</i>  ";}
					echo "</td>";
					
					
					
					echo "<td>".$campo['pais']."</td>";
					echo "<td>".$campo['subzona']."</td>";
					
					echo "<td>".$campo['isoidioma']." ".$campo['moneda']." x".$campo['cambio']." ".$campo['general']."% ".$campo['reducido']."% ".$campo['superreducido']."%</td>";
		 
					echo "<td>";
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/zonas/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					echo "<a href='".$folderAdmin."/editar-zona/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					 
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
        <h4 class="modal-title" id="myModalLabel">Borrar Zona</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar esta zona?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>