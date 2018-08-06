<?

if ($_POST['idcliente']){
	
	
	 $consulta="INSERT INTO  `pedidos` (`id`, `idcliente`, `enviara`, `estado`, `fecha`, `envio`, `enviopvp`, `pago`, `pagopvp`, `neto`, `iva`, `total`, `notacliente`, `notaproveedor`) VALUES (NULL, '".$_POST['idcliente']."', 'A direcci&oacute;n principal', 'Pendiente', CURRENT_DATE(), '', '0', '', '0', '0', '0', '0', '', 'Generado Manualmente');";
	 
	 $sql=mysql_query($consulta,$conex);
	 
	 $ID=mysql_insert_id();
	 
	 
		echo "<script>window.location.href='".$folderAdmin."/editar-pedido/".$ID."'</script>";
	 	echo "<a href='".$folderAdmin."/editar-pedido/".$ID."'>Continuar</a>";
	 
	}


?>

<section class="content-header">
      <h1>
        Pedidos <small>Nuevo</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $folderAdmin; ?>">  Inicio</a></li>
         <li  >Pedidos</li>
        <li class="active">Nuevo</li>
      </ol>
    </section>

	<!-- Main content -->
 <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pedidos</h3>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				Para generar un nuevo pedido, seleccione primero el cliente:
				<p>
				<form method="POST">
				
					<div class="form-group  ">
                  <label for="idcliente" >Cliente  </label>
					 
                  <select  id="idcliente" name="idcliente" class="form-control" onchange="this.form.submit();" required>
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
			</div>
		</div>
		</div>
	</div>
</section>