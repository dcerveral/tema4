<?

	$consulta="select * from productos where id=".$_GET['id']."  limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					$_SESSION['id']=$not['id'];
			
?>
<section class="content-header">
      <h1>
        Catalogo <small>Editar Producto</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li><a href="<? echo $adminFolder; ?>/productos">  Catalogo</a></li>
        <li class="active">Editar Producto</li>
      </ol>
    </section>

	
	<form action='<? echo $folderAdmin; ?>/productos/?<? echo date('im'); ?>' method='POST' enctype="multipart/form-data">
		<div class="form-group">
            <input type="hidden" class="form-control" value='editar' name='accion' >
        </div>  
		<div class="form-group">
			<input type='hidden'class="form-control"  name='id' value='<? echo $not['id']; ?>'>
		</div>
		
<!-- Main content -->
    <section class="content">
	
	<div class="row">
        <div class="col-xs-12 col-lg-12">
            
	 <div class="col-xs-12">
	   <div class="box box-success">
            <div class="box-header">
				 <strong> PRODUCTO #<? echo $not[0]; ?></strong>
				 <div class="box-tools pull-right">
                <button type="submit" class="btn  btn-success btn-xs"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
              </div>
				       </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
	  
      
        <div class="col-xs-12 col-lg-9">
          
          <!-- /.box -->

		  
		  
		 
          <div class="box box-warning">
            <div class="box-header">
				<strong>Datos generales</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			<div class="form-group">
				<div class="input-group col-xs-3" style="float: left"  >
				<label>Ref:</label>
                  <input type="text" class="form-control" value='<? echo $not['ref']; ?>' name='ref' id="ref" placeholder="Referencia" required>
				
				</div>
				<div class="input-group col-xs-9" style="float: left"  >
                  <label>Producto</label>
                  <input type="text" class="form-control" value='<? echo $not['titulo']; ?>' name='titulo' id="titulo" placeholder="Titulo" required>
				</div>
			
		 
		<div class="input-group  col-xs-12">
					<label>&nbsp;<br>Descripci&oacute;n</label>
                  <textarea class="form-control " id="editor"  rows="40" name='texto' placeholder='Escribe aqui   la noticia'><? echo $not['texto']; ?></textarea>
         </div>
			  
		</div> 	 
		
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  <div class="box box-warning ">
            <div class="box-header">
				<strong>Datos t&eacute;cnicos</strong>
			  <div class="box-tools pull-right">
				<a class="btn btn-box-tool" onclick="anadirdato();"><i class="fa fa-indent" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
		  
		 
			<div class="form-group col-xs-12">
			
			
				<div class="input-group col-xs-3 hidden-sm-down" style="float: left"  >
					<label>Caract.</label>
				</div>
				<div class="input-group col-xs-9 hidden-sm-down" style="float: left" >
					<label>Valor</label>
				</div>
				<div style="clear:both;"></div>
			
		<?
			$DATOS=explode(';',$not['datos']);
			 foreach ($DATOS as &$campos) {
				 
				$CAMPOS=explode(':',$campos);
				
				?>
				<div class="input-group col-xs-3" style="float: left"  >
					<input style=" width:100%" name="datos[]" placeholder="Caracteristica" value="<? echo $CAMPOS[0]; ?>">
				</div>
				<div class="input-group col-xs-9" style="float: left" >
					<input style=" width:100%" name="datos[]" placeholder="Valor" value="<? echo $CAMPOS[1]; ?>">
				</div>
				
				<? 	} ?>
			
			
			<div id='anadir'></div>
			
			
			
			
			
			
		</div>
		
				 
		  
		  
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
 
 
		<div class="box box-warning ">
            <div class="box-header">
				<strong>Opciones Disponibles</strong>
			  <div class="box-tools pull-right">
				<a class="btn btn-box-tool" onclick="anadiropcion();"><i class="fa fa-indent" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
		  
		 
			<div class="form-group col-xs-12">
			
			
			<div class="input-group col-xs-4 hidden-sm-down" style="float: left"  >
					<label>Tipo</label>
				</div>
				<div class="input-group col-xs-6 hidden-sm-down" style="float: left" >
					<label>Valor</label>
				</div>
				<div class="input-group col-xs-2 hidden-sm-down" style="float: left" >
					<label>Neto</label>
				</div>
				<div style="clear:both;"></div>
		<?
			$DATOS=explode(';',$not['opciones']);
			 foreach ($DATOS as &$campos) {
				 
				$CAMPOS=explode(':',$campos);
				
		?>
				<div class="input-group col-xs-4" style="float: left"  >
					<input style=" width:100%" name="opciones[]" placeholder="Tipo" value="<? echo $CAMPOS[0]; ?>">
				</div>
				<div class="input-group col-xs-6" style="float: left" >
					<input style=" width:100%" name="opciones[]" placeholder="Valor" value="<? echo $CAMPOS[1]; ?>">
				</div>
				<div class="input-group col-xs-2" style="float: left" >
					<input type="number" style=" width:100%" name="opciones[]" step="0.01" placeholder="Suplemento" value="<? echo $CAMPOS[2]; ?>">
				</div>
				<? 	} ?>
			
			
			<div id='anadiropciones'></div>
			
			
			
			
			
			
		</div>
		
				 
		    
         
		  
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
 
 
 
 
 <div class="box box-info ">
            <div class="box-header">
				<strong>Fotos Adicionales</strong>
			  <div class="box-tools pull-right">
				  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
		   
				<div class="col-xs-6 col-lg-3">
					<div id='imagen1'  onclick="document.getElementById('archivosbanner1').click()" >	
						<div id='cargados1'  >
							<img id='banner1' style='width:100%;cursor:hand;' class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=1&tabla=productos&id=<? echo $_GET['id']; ?>&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner1' type='file' name='archivo'  onchange='modbanner(1);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>
				
				<div class="col-xs-6 col-lg-3">
					<div id='imagen2'  onclick="document.getElementById('archivosbanner2').click()" >	
						<div id='cargados2'  >
							<img id='banner2' style='width:100%;cursor:hand;'  class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=2&tabla=productos&id=<? echo $_GET['id']; ?>&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner2' type='file' name='archivo'  onchange='modbanner(2);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>
				<div class="col-xs-6 col-lg-3">
					<div id='imagen3'  onclick="document.getElementById('archivosbanner3').click()" >	
						<div id='cargados3'  >
							<img id='banner3' style='width:100%;cursor:hand;'  class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=3&tabla=productos&id=<? echo $_GET['id']; ?>&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner3' type='file' name='archivo'  onchange='modbanner(3);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>
				<div class="col-xs-6 col-lg-3">
					<div id='imagen4'  onclick="document.getElementById('archivosbanner4').click()" >	
						<div id='cargados4'  >
							<img id='banner4' style='width:100%;cursor:hand;'  class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=4&tabla=productos&id=<? echo $_GET['id']; ?>&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner4' type='file' name='archivo'  onchange='modbanner(4);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>
			
			</div>
		 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
 
 
 
 
 
 
 
 
 
 
 

		</div>
		
		
		
		<div class="col-xs-12 col-lg-3">
		
		
		
		
		
		<div class="box box-info">
            <div class="box-header">
				<strong>Precio</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
			
			
            <div class="box-body">
               
			<div class="form-group">
                   <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Neto</span>
									<input type="number" name="neto" step="0.01"  class="form-control" value="<? echo $not['neto']; ?>">
					</div>
                  <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Oferta</span>
									<input type="number" name="descuento" step="0.01" class="form-control" value="<? echo $not['descuento']; ?>">
					</div>
				<div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Impuesto</span>
					<select name="impuesto" style="width:100%;border-radius: 0px; border:0px;">
						<option value="general" <? if ($not['impuesto']=="general") {echo "selected";} ?>>General</option>
						<option value="reducido" <? if ($not['impuesto']=="reducido") {echo "selected";} ?>>Reducido</option>
						<option value="superreducido" <? if ($not['impuesto']=="superreducido") {echo "selected";} ?>>Superreducido</option>
					</select>
				</div>
			
			</div>  
		
		
		
		
				
		
            </div>
            <!-- /.box-body -->
          </div>
		
		
		
		
		
		
		
		
		
		<div class="box box-info ">
            <div class="box-header">
				<strong>Categoria y Tipo</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
			
			
            <div class="box-body">
               
			  
		 
		
		
		
		
				
		 
			 
	 
			  
	<div class="form-group">
			
			
			<div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Categ.</span>
					<select class="form-control select" name="subtitulo"  style="width: 100%;">
                  
                  <? //LISTAMOS TODAS LAS CATEGORIAS 
						
						$consulta="select *  from categoriasproductos ORDER BY  categoria ";
				 
				$sql=mysql_query($consulta,$conex);
				while($campo=mysql_fetch_array($sql)){
				
				echo "<option value='".$campo[0]."'";
				if ($campo[0]==$not['subtitulo']){echo " selected ";}
				echo ">".$campo['categoria']."</option>";
				}
						
						
						
						
						?>
                </select>
				</div>
			<div class="input-group col-xs-12">
				<span class="input-group-addon " style="width:80px;">Tipo</span>
					<select class="form-control select" name="tipo"  style="width: 100%;">
                  
                 
					<option value="venta" <? if ($not['tipo']=="venta") {echo "selected";} ?>>Venta</option>
					<option value="catalogo" <? if ($not['tipo']=="catalogo") {echo "selected";} ?>>Catalogo</option>
					<option value="servicio" <? if ($not['tipo']=="servicio") {echo "selected";} ?>>Servicio</option>
					<option value="enlace" <? if ($not['tipo']=="enlace") {echo "selected";} ?>>Enlace</option>
                 
                </select>
         </div>   

		<div class="input-group col-xs-12">
				<span class="input-group-addon " style="width:80px;">Fab.</span>
					<select class="form-control select" name="fabricante"  style="width: 100%;">
					<option></option>
                  <? //LISTAMOS TODAS LAS fabricantes 
						
						$consulta="select id,titulo  from fabricantes WHERE activo='1' ORDER BY  titulo ";
				 
				$sql=mysql_query($consulta,$conex);
				while($campo=mysql_fetch_array($sql)){
				
				echo "<option value='".$campo[0]."'";
				if ($campo[0]==$not['fabricante']){echo " selected ";}
				echo ">".$campo['titulo']."</option>";
				}
						
						
						
						
						?>
                </select>
         </div>  
				
                   <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Web</span>
									<input type="text" name="url" class="form-control" value="<? echo $not['url']; ?>" placeholder="https://">
					</div>
                  <div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">D&iacute;as</span>
									<input type="number" name="dias" class="form-control" value="<? echo $not['dias']; ?>">
					</div>
				<div class="input-group col-xs-12">
									<span class="input-group-addon " style="width:80px;">Peso</span>
									<input type="number" name="peso" step="0.01" class="form-control" value="<? echo $not['peso']; ?>">
					</div>
			</div>
  
            </div>
            <!-- /.box-body -->
          </div>
		
		
		
          <div class="box box-info ">
            <div class="box-header">
			<strong>Foto Principal</strong>
			<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
			
			 
			  <?
				
				 
				echo " 
					<div id='imagen0'   >	
						<div id='cargados0'  >
							<img id='banner0' class=' img-thumbnail'  style='width:100%;'  src='".$folderAdmin."/img.php?tabla=productos&id=".$_GET['id']."&".rand(111,999)."'   onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"> 
						<div>
								<input id='archivosbanner0' type='file' name='archivo'  onchange='modbanner(0);'  style='display: none; ' />
						</div>
					</div>
					</div><p>
					<center><a  onclick=\"document.getElementById('archivosbanner0').click()\" class='btn btn-xs btn-info'><i class='fa fa-camera'></i> Subir Foto</A></center><p>
				";
					
					 
			?>
			</div>
			  
     </div>
			
			<div class="box box-danger ">
            <div class="box-header">
				<strong>DOCUMENTO</strong>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					 
			 <?
				
				 
				echo " 
					<div id='imagenPDF'   >	
						<div id='cargadosPDF'  >"; ?>
						
						 <div class="input-group col-xs-12">
							<span class="input-group-addon ">Name</span> 
							<input type="text" name="pdfname" id="pdfname" class="form-control" value="<? echo $not['pdfname']; ?>" >
					</div>
				
						
						<? echo "
						<div>
								<input id='archivosbannerPDF' type='file' name='archivo'  onchange=\"pdf('PDF');\"  style='display: none; ' />
						</div>
					</div>
					</div><p>
					<center>
					<a href='".$folderAdmin."/pdf.php?id=".$not[0]."' target='pdf' class='btn btn-xs btn-warning'><i class='fa fa-eye'></i> Ver</A>
					<a id='botonpdf' onclick=\"document.getElementById('archivosbannerPDF').click()\" class='btn btn-xs btn-info'><i class='fa fa-camera'></i> Subir PDF</A>
					</center><p>
				";
					
					 
			?>
				
              </div>
			  

				 
            </div>
			 

		   
			<div class="box box-danger ">
            <div class="box-header">
				<strong>Estado</strong>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
				 
				 
				<div class="form-group">
					
					<select class="form-control select2" name="activo"  style="width: 100%;">
						<option value="0">Sin Stock</option>
						<option value="1" <? if ($not['activo']==1) {echo "selected";} ?>>En Stock</option>
					</select>
				</div>
				
              </div>
			  
            </div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
		</div>

 

		
		
		
		
		
		
		
		
		
		
		
		</div>
		
		
		
</div>
</form>
</section> 

<script>
 function anadirdato(){ 
 
 
 $("#anadir").append("<div class=\'input-group col-xs-3\' style=\'float: left\'  ><input style=\' width:100%\' name=\'datos[]\' placeholder=\'Caracteristica\'></div><div class=\'input-group col-xs-9\' style=\'float: left\' ><input style=\' width:100%\' name=\'datos[]\' placeholder=\'Valor\'></div>")
 
 

 }
 
  function anadiropcion(){ 
 
 $("#anadiropciones").append("<div class=\'input-group col-xs-4\' style=\'float: left\'  ><input style=\' width:100%\' name=\'opciones[]\' placeholder=\'Tipo\'></div><div class=\'input-group col-xs-6\' style=\'float: left\'  ><input style=\' width:100%\' name=\'opciones[]\' placeholder=\'Valor\'></div><div class=\'input-group col-xs-2\' style=\'float: left\'  ><input type=\'number\' step=\'0.01\' style=\' width:100%\' name=\'opciones[]\' placeholder=\'Suplemento\'></div>")
 
 
 }
 
 
function modbanner($foto){ 

document.getElementById("banner" + $foto).src='<? echo $folderAdmin; ?>/loading.gif';
 
$("#subido" + $foto).remove();
var archivos = document.getElementById("archivosbanner" + $foto);//Damos el valor del input tipo file
var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo

/* Creamos el objeto que hara la petición AJAX al servidor, debemos de validar 
si existe el objeto “ XMLHttpRequest” ya que en internet explorer viejito no esta,
y si no esta usamos “ActiveXObject” */ 

 if(window.XMLHttpRequest) { 
 var Req = new XMLHttpRequest(); 
 }else if(window.ActiveXObject) { 
 var Req = new ActiveXObject("Microsoft.XMLHTTP"); 
 }

//El objeto FormData nos permite crear un formulario pasandole clave/valor para poder enviarlo, 
//este tipo de objeto ya tiene la propiedad multipart/form-data para poder subir archivos
var data = new FormData();

//Como no sabemos cuantos archivos subira el usuario, iteramos la variable y al
//objeto de FormData con el metodo "append" le pasamos calve/valor, usamos el indice "i" para
//que no se repita, si no lo usamos solo tendra el valor de la ultima iteración
for(i=0; i<archivo.length; i++){
   data.append('archivo'+i,archivo[i]);
}

//Pasándole la url a la que haremos la petición
Req.open("POST", "<? echo $folderAdmin; ?>/ajax-subirfoto.php?tabla=productos&id=<? echo $_GET['id']; ?>&foto=" + $foto, true);

/* Le damos un evento al request, esto quiere decir que cuando termine de hacer la petición,
se ejecutara este fragmento de código */ 

Req.onload = function(Event) {
//Validamos que el status http sea ok 
if (Req.status == 200) { 


	document.getElementById('banner' + $foto).style.display='none';

	
  //Recibimos la respuesta de php
  var msg = Req.responseText;
  $("#cargados" + $foto).append(msg);
} else { 
  console.log(Req.status); //Vemos que paso. 
  alert('error');
} 
};

 //Enviamos la petición 
 Req.send(data); 

}


 function pdf($foto){ 

 document.getElementById("botonpdf").innerHTML='Fichero Subido';
 document.getElementById("botonpdf").className='btn btn-xs btn-success';
 
 
$("#subido" + $foto).remove();
var archivos = document.getElementById("archivosbanner" + $foto);//Damos el valor del input tipo file
var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo

/* Creamos el objeto que hara la petición AJAX al servidor, debemos de validar 
si existe el objeto “ XMLHttpRequest” ya que en internet explorer viejito no esta,
y si no esta usamos “ActiveXObject” */ 

 if(window.XMLHttpRequest) { 
 var Req = new XMLHttpRequest(); 
 }else if(window.ActiveXObject) { 
 var Req = new ActiveXObject("Microsoft.XMLHTTP"); 
 }

//El objeto FormData nos permite crear un formulario pasandole clave/valor para poder enviarlo, 
//este tipo de objeto ya tiene la propiedad multipart/form-data para poder subir archivos
var data = new FormData();

//Como no sabemos cuantos archivos subira el usuario, iteramos la variable y al
//objeto de FormData con el metodo "append" le pasamos calve/valor, usamos el indice "i" para
//que no se repita, si no lo usamos solo tendra el valor de la ultima iteración
for(i=0; i<archivo.length; i++){
   data.append('archivo'+i,archivo[i]);
}

//Pasándole la url a la que haremos la petición
Req.open("POST", "<? echo $folderAdmin; ?>/ajax-subir-pdf.php?id=<? echo $_GET['id']; ?>&0" , true);

/* Le damos un evento al request, esto quiere decir que cuando termine de hacer la petición,
se ejecutara este fragmento de código */ 

Req.onload = function(Event) {
//Validamos que el status http sea ok 
if (Req.status == 200) { 


	document.getElementById('banner' + $foto).style.display='none';

	
  //Recibimos la respuesta de php
  var msg = Req.responseText;
  $("#cargados" + $foto).append(msg);
} else { 
  console.log(Req.status); //Vemos que paso. 
  alert('error');
} 
};

 //Enviamos la petición 
 Req.send(data); 

}

</script>

 


<!-- Modal -->
<div class="modal fade" id="cargando" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Subir foto</h4>
      </div>
      <div class="modal-body">
        
		Seleccione la imagen y espere.
		<p><center />
		<img src="<? echo $folderAdmin; ?>/loading.gif">
		
		
		
      </div>
       
    </div>
  </div>
</div>
