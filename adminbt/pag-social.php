<?
			if ($_GET['id']){$error="Datos actualizados.";}	
					$consulta="select facebook,twitter,googleplus  from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
?>
<section class="content-header">
      <h1>
         Redes Sociales 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>   Datos</a></li>
        <li class="active">Redes Sociales</li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               
                <a  href='<? echo $folderAdmin; ?>/social/<? echo date('is'); ?>' class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
		 
		 
		
		
		<div class="form-group">
                  <label for="facebook">Facebook </label>
                  <input type="text" class="form-control"   value='<? echo $not['facebook']; ?>' id="facebook" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=facebook&valor=' + this.value ,'oculto')" placeholder="Facebook" >
        </div>
		
		<div class="form-group">
                  <label for="descripcion">Twitter </label>
                  <input type="text" class="form-control"  id="twitter"     value='<? echo $not['twitter']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=twitter&valor=' + this.value ,'oculto')" placeholder="Twitter" >
        </div>
		
		 
		
		<div class="form-group">
                  <label for="googleplus">Google +</label>
                  <input type="text" class="form-control"   id="googleplus"    value='<? echo $not['googleplus']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=googleplus&valor=' + this.value ,'oculto')" placeholder="Google Plus" >
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
               
		 
			Al completar estos campos, aparecer&aacute;n los iconos de redes sociales
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
	</div>
 
	

 
 </section>