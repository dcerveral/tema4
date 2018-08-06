<?


//BORRAR NOTICIA
if ($_GET['id'] )
{
		$sql="DELETE FROM `pedidos`  WHERE  `id` =".$_GET['id'].";";
		mysql_query($sql,$conex);
		$sql="DELETE FROM `lineas`  WHERE  `idpedido` =".$_GET['id'].";";
		mysql_query($sql,$conex);
		$error="El pedido ha sido eliminado";
		 
}

 


 
?>


<section class="content-header">
      <h1>
        Pedidos <small>Listado</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li class="active">Pedidos</li>
        
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pedidos</h3>
			  <div class="box-tools pull-right">
               
                <a href="<? echo $folderAdmin; ?>/nuevo-pedido" type="button" class="btn  btn-success btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  
                  <th>Ref</th>
				  <th>Estado</th>
				  <th>Cliente</th>
				  <th>Total</th>
                  <th>Acci&oacute;n</th>
                  
                </tr>
                </thead>
                <tbody>


<? 
				 
				$consulta="select  pedidos.id,pedidos.fecha,pedidos.estado,pedidos.total,clientes.nombre  from pedidos,clientes WHERE clientes.id=pedidos.idcliente   order by  pedidos.id DESC ";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					echo "<td>". $campo['fecha'] . " #" . $campo[0] ."</td>";
					
					switch ($campo['estado']){
						
							case "Pendiente" : $color="red";break;
							case "Procesando" : $color="orange";break;
							case "Enviado" : $color="purple";break;
							case "Completado" : $color="green";break;
							case "Cancelado" : $color="black";break;
							case "Reembolsado" : $color="teal";break;
						
					}
					
					echo "<td><span class='btn btn-xs  btn-flat bg-".$color."  color-palette'>".$campo['estado']."</span></td>";
					echo "<td><strong>".$campo['nombre']."</strong></td>";
					echo "<td>".$campo['total']."</td>";
					echo "<td>";
					if ($campo['estado']=="Cancelado"){
						echo "<a class='btn btn-danger' style='margin:1px;' onclick=\"document.getElementById('eliminar').href='".$folderAdmin."/pedidos/".$campo[0]."'; $('#myModal').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					}else {
						echo "<a class='btn btn-warning' style='margin:1px;' onclick=\" $('#myModal2').modal('show') ;\" ><i class='fa fa-trash'></i> </A>";
					}
					echo "<a href='".$folderAdmin."/editar-pedido/".$campo[0]."?".$rand."'  class='btn btn-success' style='margin:1px;'><i class='fa fa-pencil-square-o green-text'></i> </A>";
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
        <h4 class="modal-title" id="myModalLabel">Eliminar Pedido</h4>
      </div>
      <div class="modal-body">
        &iquest;Esta seguro de eliminar este pedido?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a id='eliminar' href='listado' type="button" class="btn btn-danger">Borrar</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">No se puede eliminar pedido</h4>
      </div>
      <div class="modal-body">
        Solo los pedidos <strong>Cancelados</strong> pueden ser eliminados.
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
        
      </div>
    </div>
  </div>
</div>