
 

<?
				
					$consulta="select* from envios where id=".$_GET['id']." order by id DESC limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					$_SESSION['id']=$not['id'];
					 
				
				?>


<section class="content-header">
      <h1>
        Pedidos <small>Formas de envio</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li> Pedidos</li>
		  <li> Formas de envio</li>
        <li class="active">Editar</li>
      </ol>
    </section>

	
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
				<? echo $not['nombre']; ?>
			  <div class="box-tools pull-right">
               <form action='<? echo $folderAdmin; ?>/envios' method='POST'>
                <button  class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='accion' value='editar' >
        </div>
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='id' value='<? echo $not['id']; ?>' >
        </div>
		
		 
		 
		
		
		<div class="form-group">
                  <label for="tipo" >Tipo</label>
                  <select id="tipo" name="tipo" class="form-control">
                    <option <? if ( $not['tipo']=="precio") {echo "selected";} ?> value="precio">Precio</option>
                    <option <? if ( $not['tipo']=="peso") {echo "selected";} ?> value="peso">Peso</option>
                     
                  </select>
        </div>
		
		
		<div class="form-group">
                   <label for="zona" >Zona</label>
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
		
		
		<div class="form-group">
                  <label for="forma">Forma de envio</label>
                  <input type="text" class="form-control" name='forma' id="forma" value="<? echo $not['forma']; ?>" placeholder="Forma de envio" >
        </div>
		
		<div class="form-group">
                  <label for="configura">Configuraci&oacute;n</label>
                  <input type="text" class="form-control" name='configura' id="configura" value="<? echo $not['configura']; ?>" placeholder="Configuraci&oacute;n" >
        </div>
		
		<div class="form-group">
                  <label for="mail">Mensaje</label>
                  <input type="text" class="form-control" name='mail' id="mail" value="<? echo $not['mail']; ?>" placeholder="Texto al completar el pedido" >
        </div>
		
		<div class="form-group">
                  <label for="pvp">Defecto</label>
                  <input type="number" step="0.01" class="form-control" name='pvp' id="pvp" value="<? echo $not['pvp']; ?>" placeholder="PVP" >
        </div>
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		  
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		<div class="col-xs-12 col-lg-4">
          

		  
		   <div class="box box-danger">
            <div class="box-header">
				<strong>Ayuda</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body  " >
				 
			 Puede crear una regla en configuraci&oacute;n, para diferentes precios por moneda/kilos.
			 <p>
			 Ejemplo:
			 0-1=5.99|1-5=6.95|5-20=100
			 
			 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
		
		
</div>
</section> 
 