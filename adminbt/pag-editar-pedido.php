<?



if ($_POST['idlinea'] ) {
	
					$error="Linea actualizada";
				//ACTUALIZAMOS LINEA	
					$consulta="UPDATE  `lineas` SET  
						 
						`idproducto` =  '".$_POST['idproducto']."',
						`principal` =  '".$_POST['principal']."',
						`cantidad` =  '".$_POST['cantidad']."',
						`ref` =  '".$_POST['ref']."',
						`producto` =  '".$_POST['producto']."',
						`neto` =  '".$_POST['neto']."',
						`iva` =  '".$_POST['iva']."'
						WHERE   `id` =".$_POST['idlinea'].";";
						
					$totales="S";
					
					mysql_query($consulta,$conex);
	}

if ($_POST['accion']=="cliente") {
	
					$error="Cliente actualizado";
					
					$consulta="UPDATE pedidos SET idcliente='".$_POST['idcliente']."' WHERE id=".$_POST['id'];
					 
					mysql_query($consulta,$conex);
	}
if ($_POST['accion']=="nuevalinea") {
	
					$error="Nueva linea creada";
					
					$consulta="INSERT INTO  `lineas` (`id`, `idpedido`, `cantidad`, `ref`, `producto`, `neto`, `iva`) VALUES (NULL, '".$_GET['id']."', '0', 'ref', 'producto', '0', '21');";
					 
					mysql_query($consulta,$conex);
	}				

					
	//ACTUALIZAMOS TOTALES
 
	
	//RECORREMOS LINEAS CON SUS PRECIOS E IVA
		$consulta="SELECT cantidad,neto,iva FROM lineas WHERE idpedido=".$_GET['id'];
		$sql=mysql_query($consulta,$conex);
		$NETO=0;
		$IVA=0;
		while ($cantidad=mysql_fetch_array($sql)){
			
			$cant=$cantidad[0];
			$neto=$cantidad[1];
			$iva=$cantidad[2];
			
			$NETO=$NETO + ($cant * $neto);
			$IVA=$IVA + ((($neto * $cant) * $iva) / 100);
			
		}
					 
	//ACTUALIZAMOS NETO E IVA DEL PEDIDO
		mysql_query("UPDATE   `pedidos` SET  `neto` =  '".$NETO."',`iva` =  '".$IVA."' WHERE  `id` =".$_GET['id'].";",$conex);
	
	//ACTUALIZAMOS TOTAL= NETO+IVA+ENVIOPVP+PAGOPVP
	
		mysql_query("UPDATE   `pedidos` SET  `total` =  neto + iva + enviopvp + pagopvp WHERE  `id` =".$_GET['id'].";",$conex);
	
 			 
		


					$consulta="select* from pedidos where id=".$_GET['id']." order by id DESC limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					$_SESSION['id']=$not['id'];

					
				?>


<section class="content-header">
      <h1>
        Pedidos <small>Editar</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li> Pedidos</li>
		  
        <li class="active">Editar</li>
      </ol>
    </section>

	
				
<!-- Main content -->
    <section class="content">
	           
	
	
      <div class="row">
	  
	  <div class="col-xs-12">
	   <div class="box box-success">
            <div class="box-header">
				 <strong> PEDIDO #<? echo $not[0]; ?></strong>
				 
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
	  
	  
        <div class="col-xs-12 col-lg-8">
          <div class="box box-success">
            <div class="box-header">
				 <strong  >Estado</strong>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body "  >
               
			  
		
		
		 
		 
		
		
		<div class="form-group">
                  
                  <select id="estado" ="true" class="form-control select" name="estado"  onchange="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=estado&valor=' + this.value ,'oculto')"  style="max-width:100%;">
                    <option <? if ( $not['estado']=="Pendiente") {echo "selected";} ?> value="Pendiente">Pendiente</option>
                    <option <? if ( $not['estado']=="Procesando") {echo "selected";} ?> value="Procesando">Procesando</option>
                    <option <? if ( $not['estado']=="Enviado") {echo "selected";} ?> value="Enviado">Enviado</option>
                    <option <? if ( $not['estado']=="Completado") {echo "selected";} ?> value="Completado">Completado</option>
					<option <? if ( $not['estado']=="Cancelado") {echo "selected";} ?> value="Cancelado">Cancelado</option>
					<option <? if ( $not['estado']=="Reembolsado") {echo "selected";} ?> value="Reembolsado">Reembolsado</option>
                  </select>
        </div>
		 
		 
		
		 <form name="form" action='<? echo $folderAdmin; ?>/editar-pedido/<? echo $not[0]; ?>' method='POST'>
			<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='accion' value='cliente' >
			</div>
			<div class="form-group">
					 
					  <input type="hidden" class="form-control" name='id' value='<? echo $not['id']; ?>' >
			</div>
			
			<div class="form-group  ">
                  <label for="idcliente" >Cliente <a href='<? echo $folderAdmin; ?>/editar-cliente/<? echo $not['idcliente']; ?>'><small>Editar</small></a> </label>
					 
                  <select  id="idcliente" name="idcliente" class="form-control" onchange="this.form.submit();" >
					<option></option>
					 <? 
					$consultac="select id,nombre from clientes order by nombre ASC;";
					$sqlc=mysql_query($consultac,$conex);
					while($CLI=mysql_fetch_array($sqlc)) {
					 
					?> 
						<option <? if ( $not['idcliente']==$CLI[0]) {echo "selected";} ?> value="<? echo $CLI[0]; ?>"><? echo $CLI['nombre']; ?></option>
                  
					<? } ?>
				  </select>
			</div>
		</form>
		<label>Fecha</label>
		  <div class="input-group date">
			
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
				  
				  <?
				 
					
					$fechas=explode ('-',$not['fecha']);
	
					 $fecha=$fechas[1]."/".$fechas[2]."/".$fechas[0];
					  $fecha=$not['fecha'];
				  ?>
				  
                  <input type="date" name='fecha' onchange="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=fecha&valor=' + this.value ,'oculto')" value='<? echo $fecha; ?>'  class="form-control pull-right" id="datepicker2" >
                </div>
		
		 
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		 
		 
		 
		 
		  <div class="box box-info">
            <div class="box-header">
				<strong>Conceptos</strong>
				<div class="box-tools pull-right">
					<form name="linea" method="POST" action="<? echo $folderAdmin; ?>/editar-pedido/<? echo $not[0]; ?>?<? echo rand(111,999); ?>">
					<div class="input-group col-xs-12">
						<input type="hidden" name="accion" class="form-control" value="nuevalinea">
					</div>
                 	 <button onclick="this.form.submit();" type="submit" class="btn btn-box-tool"  ><i class="fa fa-plus"></i></button>
					 </form>
			 </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				  
			   
			    <table id="example3"  class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  
                  <th>Ref</th>
				  <th>Concepto</th>
				  <th>Cantidad</th>
				  <th>Neto</th>
				  <th>IVA</th>
				  <th>Subtotal</th>
                   
                  
                </tr>
                </thead>
                <tbody>


<? 
				 
				$consulta="select *  from lineas WHERE idpedido='".$not[0]."' order by idproducto ASC, principal ASC";
				
				$sql=mysql_query($consulta,$conex);
				 
		 
				
				while($campo=mysql_fetch_array($sql)){
					
					
					
					echo "<tr ";
					if ($campo['cantidad']<1) {echo "style='background-color:#ffefbf'";}
					echo " onclick=\" $('#linea".$campo[0]."').modal('show');\" style='cursor:hand; cursor:pointer;'>
						<td>#". $campo['idproducto'] ." ". $campo['ref'] ."</td>";
					echo "<td>";
					if ($campo['principal']=="Opcion") {echo " - <i />";}
					echo $campo['producto'] ."</td>";
					echo "<td style='text-align:right'>". $campo['cantidad'] ."</td>";
					echo "<td style='text-align:right'> ". $campo['neto'] ."</td>";
					echo "<td style='text-align:right'>". $campo['iva'] ."%</td>";
					echo "<td style='text-align:right'>". $campo['cantidad'] * ( (($campo['iva'] * $campo['neto'] ) / 100) + $campo['neto'] )."</td>";
					 
					echo " </tr> ";
					
					
					?>
					
					<!-- Modal -->
						<div class="modal fade" id="linea<? echo $campo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Editar Linea</h4>
							  </div>
							  <div class="modal-body">
								<form name="linea" method="POST" action="<? echo $folderAdmin; ?>/editar-pedido/<? echo $not[0]; ?>?<? echo rand(111,999); ?>">
								 
								 
								 <div class="input-group col-xs-12">
									 
									<input type="hidden" name="idlinea" class="form-control" value="<? echo $campo[0]; ?>">
								 </div>
								 <div class="input-group col-xs-12">

									<span class="input-group-addon " style="width:110px;">ID/REF</span>
									<input type="text" name="idproducto" class="form-control" value="<? echo $campo['idproducto']; ?>">
								
									<span class="input-group-addon " style="width:110px;">ID/REF</span>
									<input type="text" name="ref" class="form-control" value="<? echo $campo['ref']; ?>">
								

								</div>
								 
								 
								 
								 <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:110px;">Concepto</span>
									<input type="text" name="producto" class="form-control" value="<? echo $campo['producto']; ?>">
								 </div>
								  <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:110px;">Cant/neto/iva</span>
									<input type="number" name="cantidad" class="form-control" value="<? echo $campo['cantidad']; ?>">
								 
									 <span class="input-group-addon " style="width:110px;">Cant/neto/iva</span>
									<input type="number" name="neto" class="form-control" value="<? echo $campo['neto']; ?>">
								 
									 <span class="input-group-addon " style="width:110px;">Cant/neto/iva</span>
									<input type="number" name="iva" class="form-control" value="<? echo $campo['iva']; ?>">
								 </div>
								
								<div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:110px;">Tipo</span>
										<select name="principal" style="width:100%">
											<option><? echo $campo['principal']; ?></option>
											<option>Producto</option>
											<option>Opcion</option>
										</select>

									</div>
								
								
							  </div>
							  <div class="modal-footer">
							  <button type="submit" class="btn btn-success" >Aceptar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								 </form>
							  </div>
							</div>
						  </div>
						</div>
					
				<?	
				}
				 
?>

                </tbody>
             
              </table>
			   
			   
			   
			   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
          <div class="box box-success">
            <div class="box-header">
				<strong>Anotaciones</strong>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body " id="notas" >
               
			  
		
		<div class="form-group">
				<label for="editor" >Nota Cliente</label>
				<textarea class="form-control "  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=notacliente&valor=' + this.value ,'oculto')"   id="notacliente"  rows="4" name='notacliente' ><? echo $not['notacliente']; ?></textarea>
        </div>
		<div class="form-group">
				<label for="editor1" >Anotaci&oacute;n <small style="color: #eeeeee;">No visible</small></label>
				<textarea class="form-control "  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=notaproveedor&valor=' + this.value ,'oculto')"   id="notaproveedor"  rows="4" name='notaproveedor' ><? echo $not['notaproveedor']; ?></textarea>
         </div>
		
		 
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		   
		  
		</div>
		
		
		
		
		<div class="col-xs-12 col-lg-4">
          

		  
		   

		

		  
		   <div class="box box-info">
            <div class="box-header">
				<strong>Enviar a</strong>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				  <div class="form-group">
                   
                   <select  id="zona" name="zona" class="form-control" onchange="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=zona&valor=' + this.value ,'oculto')" >
					<option></option>
					 <? 
					$consultac="select id,zona from zonas order by zona ASC;";
					$sqlc=mysql_query($consultac,$conex);
					while($ZONA=mysql_fetch_array($sqlc)) {
					 
					?> 
						<option <? if ( $not['zona']==$ZONA[0]) {echo "selected";} ?> value="<? echo $ZONA[0]; ?>"><? echo $ZONA['zona']; ?></option>
                  
					<? } ?>
				  </select>
				</div>
				 <div class="input-group" style="width:100%">
					<input type="text"  id="envionombre" class="form-control" value="<? echo $not['nombre']; ?>"  placeholder="Nombre" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=nombre&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group"  style="width:100%" >
					<input type="text"   id="enviodireccion"  class="form-control" value="<? echo $not['direccion']; ?>" placeholder="Direccion" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=direccion&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text"   id="enviocp"  class="form-control"  value="<? echo $not['cp']; ?>"  placeholder="CP" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=cp&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text"   id="enviociudad"  class="form-control"  value="<? echo $not['ciudad']; ?>" placeholder="Ciudad" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=ciudad&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text"   id="envioprovincia"  class="form-control"  value="<? echo $not['provincia']; ?>"placeholder="Provincia" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=provincia&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text"   id="enviopais"  class="form-control"  value="<? echo $not['pais']; ?>" placeholder="Pais" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['0']; ?>&tabla=pedidos&campo=pais&valor=' + this.value ,'oculto')">
				</div>
				 
			   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		   
<div class="box box-danger">
            <div class="box-header">
				<strong>Totales</strong>
				 
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				 
				 <center>
		 
			  <div class="input-group">
                <span class="input-group-addon "   style="width:100px;">Neto</span>
                <input type="number" disabled  style="text-align: right" name='neto' class="form-control" value="<? echo $not['neto']; ?>">
              </div>
			  <div class="input-group">
                <span class="input-group-addon "  style="width:100px;">IVA</span>
                <input type="number" disabled style="text-align: right" name='iva' class="form-control" value="<? echo $not['iva']; ?>">
              </div>
			  
			  <div class="input-group">
                <span class="input-group-addon "  style="width:100px;">Envio</span>
                <input type="number"  step="any" id="fenvio" onkeyup="calculatotal();" onchange="calculatotal();" style="text-align: right" name='enviopvp' class="form-control" value="<? echo $not['enviopvp']; ?>">
              </div>
			  
			  <div class="input-group">
                <span class="input-group-addon " style="width:100px;">F.Pago</span>
                <input type="number"  step="any"  id="fpago" onkeyup="calculatotal();" onchange="calculatotal();" style="text-align: right" name='pagopvp' class="form-control" value="<? echo $not['pagopvp']; ?>">
              </div>
			  
			  <div class="input-group">
                <span class="input-group-addon "  style="width:100px;"><strong> TOTAL </strong> </span>
                <input type="number" step="any" disabled  id="ftotal"  style="text-align: right; color:blue;" name='total' class="form-control" value="<? echo $not['total']; ?>">
              </div>
			 </center>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  

		  
		  
		   <div class="box box-danger">
            <div class="box-header">
				<strong>Facturar a</strong>
				
            </div>
            <!-- /.box-header -->
            
				  
			  <div class="box-body"  >
				 <? $consulta="select * from clientes where id=".$not['idcliente']." limit 1;";
					$sql=mysql_query($consulta,$conex);
					$cliente=mysql_fetch_array($sql);
					 
				 ?>
				<div class="input-group" style="width:100%">
					<input type="text" style="background-color:#eeeeee;" id="cif" class="form-control" value="<? echo $cliente['cif']; ?>"  placeholder="cif" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=cif&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%">
					<input type="text" style="background-color:#eeeeee;"  id="cnombre" class="form-control" value="<? echo $cliente['nombre']; ?>"  placeholder="Nombre" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=nombre&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group"  style="width:100%" >
					<input type="text" style="background-color:#eeeeee;"   id="cdireccion"  class="form-control" value="<? echo $cliente['direccion']; ?>" placeholder="Direccion" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=direccion&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text" style="background-color:#eeeeee;"   id="ccp"  class="form-control"  value="<? echo $cliente['cp']; ?>"  placeholder="CP" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=cp&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text" style="background-color:#eeeeee;"   id="cciudad"  class="form-control"  value="<? echo $cliente['ciudad']; ?>" placeholder="Ciudad" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=ciudad&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text" style="background-color:#eeeeee;"   id="cprovincia"  class="form-control"  value="<? echo $cliente['provincia']; ?>"placeholder="Provincia" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=provincia&valor=' + this.value ,'oculto')">
				 </div>
				 <div class="input-group" style="width:100%" >
					<input type="text"  style="background-color:#eeeeee;"  id="cpais"  class="form-control"  value="<? echo $cliente['pais']; ?>" placeholder="Pais" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not['idcliente']; ?>&tabla=clientes&campo=pais&valor=' + this.value ,'oculto')">
				</div>
			   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		   <div class="box box-warning">
            <div class="box-header">
				
				<strong>Formas pago y envio</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				 
				 <center>
		 
			  <div class="input-group">
                <span class="input-group-addon " style="width:100px;">F.Pago</span>
                <input type="text" id="pago"  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=pago&valor=' + this.value ,'oculto')" name='pago' class="form-control" value="<? echo $not['pago']; ?>">
              </div>
			  <div class="input-group">
                <span class="input-group-addon " style="width:100px;">F.Envio</span>
                <input type="text" id="envio"  name='envio' onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=envio&valor=' + this.value ,'oculto')"  class="form-control" value="<? echo $not['envio']; ?>">
              </div>
			  
			  <div class="input-group">
                <span class="input-group-addon " style="width:100px;">Divisa Pago</span>
                <input type="text"  style="background-color:#eeeeee;" name='divisapago' onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=envio&valor=' + this.value ,'oculto')"  class="form-control" value="<? echo $not['divisapago']; ?>">
              </div>
			  
			  <div class="input-group">
                <span class="input-group-addon " style="width:100px;">Imp. Pago</span>
                <input type="text" style="background-color:#eeeeee;"    name='importepago' onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?id=<? echo $not[0]; ?>&tabla=pedidos&campo=envio&valor=' + this.value ,'oculto')"  class="form-control" value="<? echo $not['importepago']; ?>">
              </div>
			  
			  </center>
			  	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  
		  <div class="box box-warning">
            <div class="box-header">
				
				<strong>Guardar</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				 
				 <center>
		 
				<a onclick="activar();" href="<? echo $folderAdmin; ?>/pedidos?<? echo rand(111,999); ?>"   class="btn  btn-success "  > <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Guardar y volver</a></a>
			 	
			  
			  </center>
			  	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		 
		  
	</div> 
		  
		  
		
</div> 
</section> 
  
