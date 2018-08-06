<?
			if ($_GET['id']){$error="Datos actualizados.";}	
					$consulta="select idiomabase,monedabase from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
?>
<section class="content-header">
      <h1>
         Idiomas y Monedas 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>   Datos</a></li>
        <li class="active">Idiomas y Monedas</li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               
                <a  href='<? echo $folderAdmin; ?>/local/<? echo date('is'); ?>' class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
		 
		 
		
		
		<div class="form-group">
                  <label for="monedabase">Monedas </label>
                  <input type="text" class="form-control"   value='<? echo $not['monedabase']; ?>' id="titulo" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=monedabase&valor=' + this.value ,'oculto')" placeholder="Titulo" >
        </div>
		
		<div class="form-group">
                  <label for="idiomabase">Idiomas </label>
                  <input type="text" class="form-control"  id="idiomabase"     value='<? echo $not['idiomabase']; ?>'  onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=idiomabase&valor=' + this.value ,'oculto')" placeholder="Descripci&oacute;n" >
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
               
		 
			Configura los idiomas y monedas<p>
			
			<p> La primera moneda, es la predeterminada.
			<p> El resto separadas por comas.
			<p>Ejemplos:<p>
			ES - Espa&ntilde;ol<p>
			EUR - Euro
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
	</div>
 
	

 
 </section>