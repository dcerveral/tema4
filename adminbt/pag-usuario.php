<?
				
				
	if ($_GET['id']){$error="Datos actualizados.";}
					$consulta="select usuario,clave,email from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
?>

<section class="content-header">
      <h1>
         Usuario 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>   Datos</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               
                <a  href='<? echo $folderAdmin; ?>/usuario/<? echo date('is'); ?>' class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
		 
		 
		
		
		<div class="form-group">
                  <label for="titulo">Usuario <sup>*</sup></label>
                  <input type="text" class="form-control" name='titulo' value='<? echo $not['usuario']; ?>' id="titulo" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=usuario&valor=' + this.value ,'oculto')" placeholder="email" required>
        </div>
		
		<div class="form-group">
                  <label for="descripcion">Clave <sup>*</sup></label>
                  <input type="password" class="form-control" name='descripcion' id="descripcion" onclick="this.type='text';"   value='<? echo $not['clave']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=clave&valor=' + this.value ,'oculto')" placeholder="" >
        </div>
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
		
		
		<div class="col-xs-12 col-lg-4">
          <div class="box box-danger">
            <div class="box-header">
             <strong>Aviso</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
			Recuerde que los cambios ser&aacute;n aplicados la pr&oacute;xima vez que inicie sesi&oacute;n.
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
	</div>
 
	

 
 </section>