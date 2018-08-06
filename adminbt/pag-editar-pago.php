
 

<?
				
					$consulta="select* from pagos where id=".$_GET['id']." order by id DESC limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					$_SESSION['id']=$not['id'];
					 
				
				?>


<section class="content-header">
      <h1>
        Pedidos <small>Formas de Pago</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li> Pedidos</li>
		  <li> Formas de Pago</li>
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
               <form action='<? echo $folderAdmin; ?>/pagos' method='POST'>
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
                    <option <? if ( $not['tipo']=="paypal") {echo "selected";} ?> value="paypal">Paypal</option>
                    <option <? if ( $not['tipo']=="transferencia") {echo "selected";} ?> value="transferencia">Transferencia</option>
                    <option <? if ( $not['tipo']=="tarjeta") {echo "selected";} ?> value="tarjeta" disabled=disabled>Tarjeta</option>
                   
                  </select>
        </div>
		
		<div class="form-group">
                  <label for="forma">Forma de pago</label>
                  <input type="text" class="form-control" name='forma' id="forma" value="<? echo $not['forma']; ?>" placeholder="Forma de pago" >
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
                  <label for="pvp">Coste Fijo</label>
                  <input type="number" step="0.01" class="form-control" name='pvp' id="pvp" value="<? echo $not['pvp']; ?>" placeholder="PVP" >
        </div>
		
		<div class="form-group">
                  <label for="variable">Coste Variable</label>
                  <input type="number" step="0.01" class="form-control" name='variable' id="variable" value="<? echo $not['variable']; ?>" placeholder="PVP" >
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
				 
			  <i class="fa fa-paypal"></i> PAYPAL: Debe introducir su email de Paypal en configuraci&oacute;n.
			  <div class="divider"></div>
			  <i class="fa fa-university"></i> TRANSFERENCIA: Debe introducir su n&uacute;mero de cta. en configuraci&oacute;n.
			  <div class="divider"></div>
			  <i class="fa fa-credit-card"></i> TARJETA: Por el momento no hay TPV configurado, pero se pueden realizar pagos con tarjeta v&iacute;a PAYPAL.
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
</div>
</section> 
 