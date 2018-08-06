<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
		$sql="DELETE FROM `pagos`  WHERE  `id` =".$_GET['id'].";";
		
	mysql_query($sql,$conex);
		$error="El pago ha sido eliminado";
		 
}

//EDITAR NOTICIA
if ($_POST['accion']=="editar")
{
	
	 
	$sql="UPDATE  `pagos` SET  
	
					`tipo` =  '".addslashes($_POST['tipo'])."',
					`forma` =  '".addslashes($_POST['forma'])."',
					`configura` =  '".addslashes($_POST['configura'])."',
					`mail` =  '".addslashes($_POST['mail'])."',
					`variable` =  '".addslashes($_POST['variable'])."',
					`pvp` =  '".addslashes($_POST['pvp'])."'

						WHERE  `id` =".$_POST['id'].";";
		 
		 
		
	mysql_query($sql,$conex);
		$error="Modificaci&oacute;n realizada";
}


//CREAR NOTICIA
//INSERTAMOS NUEVA NOTICIA Y SUBIMOS IMAGEN
				
if ($_POST['accion']=="nueva") {				
   
		$consulta="INSERT INTO `pagos` (`id`, `tipo`, `forma`, `configura`, `mail`, `pvp`, `variable`, `activo`)
		VALUES ( NULL , '".$_POST['tipo']."', '".addslashes($_POST['forma'])."', '".addslashes($_POST['configura'])."', '".addslashes($_POST['mail'])."', '".addslashes($_POST['pvp'])."' , '".addslashes($_POST['variable'])."' , '0' );";
		
		 
		
		if (mysql_query($consulta,$conex)){$error="El pago ha sido creado";}
			else  {$error="ERROR: El pago no ha sido creado";}
		

}
?>


<section class="content-header">
      <h1>
        Pedidos <small>Formas de pago</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Pedidos</li>
        <li class="active">Formas de pago</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Formas de pago</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevo-pago" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  
                  <th>Tipo</th>
				  <th>Pago</th>
				  <th>Fijo</th>
				  <th>Variable</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				 
				$consulta="select  *  from pagos   order by  id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					 
					echo "<td>".ucfirst($campo['tipo'])."<br>";
					
					 
					if ($campo['activo']=="0"){echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-success';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=pagos&campo=activo&valor=1&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-danger' >Inactivo</i>  "; }
						else {echo "<i onclick=\"this.className='btn btn-xs  btn-flat btn-danger';llamarasincrono('".$folderAdmin."/ajax-mod.php?tabla=pagos&campo=activo&valor=0&id=".$campo[0]."' ,'oculto');\" class='btn btn-xs  btn-flat btn-success' >Activo</i>  ";}
					echo "</td>";
					
					
					
					
					echo "<td><strong>".$campo['forma']."</strong></td>";
					echo "<td>".$campo['pvp']."</td>";
					echo "<td>".$campo['variable']."%</td>";
		 
					echo "<td>";
		 
					echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/pagos/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					echo "<a href='".$folderAdmin."/editar-pago/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
					 
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
        <h4 class="modal-title" id="myModalLabel">Borrar Modo de Pago</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar este modo de pago?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>