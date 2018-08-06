
 

<?
				
					$consulta="select* from zonas where id=".$_GET['id']."   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					$_SESSION['id']=$not['id'];
					 
				
				?>


<section class="content-header">
      <h1>
        Pedidos <small>Zonas</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li> Pedidos</li>
		  <li> Zonas</li>
        <li class="active">Editar</li>
      </ol>
    </section>

	
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
				<strong>Editar Zona</strong>
			  <div class="box-tools pull-right">
               <form action='<? echo $folderAdmin; ?>/zonas' method='POST'>
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
                  <label for="zona">Zona</label>
                  <input type="text" class="form-control" name='zona' id="zona" value="<? echo $not['zona']; ?>" placeholder="Zona" >
        </div>
		
		<div class="form-group">
                  <label for="pais">Pa&iacute;s/<small>es</small></label>
                  <input type="text"   class="form-control" name='pais' id="pais" value="<? echo $not['pais']; ?>" placeholder="España" >
        </div>
		
		<div class="form-group">
                  <label for="subzona">Subzona <small>Provincias</small></label>
                  <input type="text" class="form-control" name='subzona' id="subzona" value="<? echo $not['subzona']; ?>" placeholder="Subzona" >
        </div>
		
		<!--div class="form-group">
                  <label for="isopais">ISO Pa&iacute;s</label>
                  <input type="text" class="form-control" name='isopais' id="isopais" value="<? echo $not['isopais']; ?>" placeholder="es" >
        </div-->
		
		
		
		 <div class="form-group">
                  <label for="isoidioma">ISO Idioma</label>
                  <input type="text" style="text-transform:lowercase;" class="form-control" name='isoidioma' id="isoidioma" value="<? echo $not['isoidioma']; ?>" placeholder="es" >
        </div>
		
		<!--div class="form-group">
                  <label for="idioma">Idioma</label>
                  <input type="text"   class="form-control" name='idioma' id="idioma" value="<? echo $not['idioma']; ?>" placeholder="Español" >
        </div-->
		
		<div class="form-group">
                  <label for="moneda">Moneda</label>
                  <input type="text" style="text-transform:lowercase;"  class="form-control" name='moneda' id="moneda" value="<? echo $not['moneda']; ?>" placeholder="EUR" >
        </div>
		<div class="form-group">
                  <label for="cambio">Cambio</label>
                  <input type="number"   class="form-control" name='cambio' id="cambio" value="<? echo $not['cambio']; ?>"  >
        </div>
		
		<div class="form-group">
                  <label for="general">Impuesto General</label>
                  <input type="number"   class="form-control" name='general' id="general" value="<? echo $not['general']; ?>"  >
        </div>
		
		<div class="form-group">
                  <label for="reducido">Impuesto Reducido</label>
                  <input type="number"   class="form-control" name='reducido' id="reducido" value="<? echo $not['reducido']; ?>"  >
        </div>
		
		<div class="form-group">
                  <label for="superreducido">Impuesto Super-Reducido</label>
                  <input type="number"   class="form-control" name='superreducido' id="superreducido" value="<? echo $not['superreducido']; ?>"  >
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
				 
				Puedes definir zonas como peninsula, baleares, etc.. sobretodo si los <strong>costes de envio</strong>
				son diferentes para cada una de estas zonas.
				<p>
				En <strong>subzonas</strong>, puedes definir por ejemplo provincias separados por comas.
				<p>
				Tambi&eacute;n puedes definir <strong>idioma y/o moneda</strong> para cada zona.
				<p>
				Utiliza <strong>cambio</strong>, para insertar el valor de cambio sobre la moneda base.
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
</div>
</section> 
 