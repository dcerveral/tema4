<?
			if ($_GET['id']){$error="Datos actualizados.";}	
					$consulta="select titulo,descripcion,palabras,google from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
?>
<section class="content-header">
      <h1>
         SEO 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>   Datos</a></li>
        <li class="active">SEO</li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               
                <a  href='<? echo $folderAdmin; ?>/seo/<? echo date('is'); ?>' class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
		 
		 
		
		
		<div class="form-group">
                  <label for="titulo">Titulo </label>
                  <input type="text" class="form-control"   value='<? echo $not['titulo']; ?>' id="titulo" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=titulo&valor=' + this.value ,'oculto')" placeholder="Titulo" >
        </div>
		
		<div class="form-group">
                  <label for="descripcion">Descripci&oacute;n </label>
                  <input type="text" class="form-control"  id="descripcion"     value='<? echo $not['descripcion']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=descripcion&valor=' + this.value ,'oculto')" placeholder="Descripci&oacute;n" >
        </div>
		
		<div class="form-group">
                  <label for="claves">Claves</label>
                  <input type="text" class="form-control"   id="claves"    value='<? echo $not['palabras']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=palabras&valor=' + this.value ,'oculto')" placeholder="Descripci&oacute;n" >
        </div>
		
		<div class="form-group">
                  <label for="google">Webmaster Tools</label>
                  <input type="text" class="form-control"   id="google"    value='<? echo $not['google']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=google&valor=' + this.value ,'oculto')" placeholder="Google Webmaster Tools" >
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
               
		 
			Recuerde que los datos que introduzca, mejorar&aacute;n su presencia en buscadores.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
	</div>
 
	

 
 </section>