 


<section class="content-header">
      <h1>
        Clientes <small>Nuevo</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li> Pedidos</li>
		  <li> Clientes</li>
        <li class="active">Nuevo</li>
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
               <form action='<? echo $folderAdmin; ?>/clientes' method='POST'>
                <button  class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='accion' value='nueva' >
        </div>
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='id' value='<? echo $not['id']; ?>' >
        </div>
		
		 
		 
		
		
		<div class="form-group">
                  <label for="cif">CIF</label>
                  <input type="text" class="form-control" name='cif' value="<? echo $not['cif']; ?>" id="cif" placeholder="CIF" >
        </div>
		
		<div class="form-group">
                  <label for="nombre">Nombre/Empresa</label>
                  <input type="text" class="form-control" name='nombre' id="nombre" value="<? echo $not['nombre']; ?>" placeholder="Nombre" >
        </div>
		
		<div class="form-group">
                  <label for="direccion">Direcci&oacute;n</label>
                  <input type="text" class="form-control" name='direccion' id="direccion" value="<? echo $not['direccion']; ?>" placeholder="Direcci&oacute;n" >
        </div>
		
		<div class="form-group col-xs-2">
                   
                  <input type="text" class="form-control" name='cp' id="cp" value="<? echo $not['cp']; ?>" placeholder="CP" >
        </div>
		<div class="form-group  col-xs-4">
                   
                  <input type="text" class="form-control" name='ciudad' id="ciudad" value="<? echo $not['ciudad']; ?>" placeholder="Ciudad" >
        </div>
		<div class="form-group  col-xs-4">
                   
                  <input type="text" class="form-control" name='provincia' id="provincia" value="<? echo $not['provincia']; ?>" placeholder="Provincia" >
        </div>	  
		<div class="form-group  col-xs-2">
                   
                  <input type="text" class="form-control" name='pais' id="pais" value="<? echo $not['pais']; ?>" placeholder="Pais" >
        </div>	
			  
		
		<div class="form-group  col-xs-4">
                   
                  <input type="text" class="form-control" name='telefono' id="telefono" value="<? echo $not['telefono']; ?>" placeholder="Telefono" >
        </div>	
		<div class="form-group  col-xs-4">
                   
                  <input type="email" class="form-control" name='email' id="email" value="<? echo $not['email']; ?>" placeholder="email" required>
        </div>	
		<div class="form-group  col-xs-4">
                   
                  <input type="password" onclick="this.type = 'text';" class="form-control" name='clave' id="clave" value="<? echo $not['clave']; ?>" placeholder="Clave" required>
        </div>	
			  
			  
		<div class="form-group">
					<label for="editor">Notas <small style="color: #eeeeee;">No visible</small></label>
                  <textarea class="form-control " id="editor"  rows="40" name='notas' placeholder='Notas sobre el cliente'><? echo $not['notas']; ?></textarea>
         </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		  
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		<div class="col-xs-12 col-lg-4">
          <div class="box box-success">
            <div class="box-header">
				Foto
            </div>
            <!-- /.box-header -->
            <div class="box-body align-center" >
				<center>
					<img src= "https://www.gravatar.com/avatar/<? echo md5($not['email']); ?>?s=128">
				</center>
			  
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		 
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
</div>
</section> 
