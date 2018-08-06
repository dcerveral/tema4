 
<section class="content-header">
      <h1>
        Catalogo <small>Fabricantes</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li><a href="<? echo $adminFolder; ?>/fabricantes">  Catalogo</a></li>
        <li  >Fabricantes</li>
		<li class="active">Nuevo</li>
      </ol>
    </section>

	
	<form action='<? echo $folderAdmin; ?>/fabricantes/?<? echo date('im'); ?>' method='POST' enctype="multipart/form-data">
		<div class="form-group">
            <input type="hidden" class="form-control" value='nueva' name='accion' >
        </div>  
		 
	
<!-- Main content -->
    <section class="content">
	
	<div class="row">
        <div class="col-xs-12 col-lg-12">
          <div class="box box-success">
            <div class="box-header">
				<strong>Nuevo</strong>
			  <div class="box-tools pull-right">
                 <button  class="btn  btn-success " > <i class="fa fa fa-floppy-o" aria-hidden="true"></i> Guardar </a></button>
           
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
	
      
        <div class="col-xs-12 col-lg-9">
          
          <!-- /.box -->

		  
		  
		 
          <div class="box box-warning">
            <div class="box-header">
				<strong>Descripci&oacute;n</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
		 
		<div class="form-group">
             
                  <textarea class="form-control " id="editor"  rows="10" name='texto' placeholder='Escribe aqui   la noticia'><? echo $not['texto']; ?></textarea>
         </div>
			  
			 
		
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  

 

		</div>
		
		
		
		<div class="col-xs-12 col-lg-3">
		
		
		
		
		
		<div class="box box-info">
            <div class="box-header">
				<strong>Fabricante</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
			
			
            <div class="box-body">
               
			<div class="form-group">
                  
                  <input type="text" class="form-control" value='<? echo $not['titulo']; ?>' name='titulo' id="titulo" placeholder="Titulo" required>
        </div>  
		
		
		
		
				
		
            </div>
            <!-- /.box-body -->
          </div>
		
		
		
		
		
		
		
		
		
		<div class="box box-info collapsed-box">
            <div class="box-header">
				<strong>Web</strong>
			  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
			
			
            <div class="box-body">
               
			   
			  
	 
			  
			

	<div class="form-group">
                
                  <input type="text" class="form-control" name='url' id="url" value='<? echo $not['url']; ?>' placeholder="https://">
        </div>

		
			  
            </div>
            <!-- /.box-body -->
          </div>
		
		
		
          <div class="box box-info collapsed-box">
            <div class="box-header">
			<strong>Foto Principal</strong>
			<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
			
			 
			  <?
				
				 
				echo " 
					<div id='imagen'   >	
						
						<div id='cargados'  >
							<img id='banner' class=' img-thumbnail'  style='width:100%;'  src='".$folderAdmin."/img.php?tabla=fabricantes&id=".$_GET['id']."&".date('im')."'   onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"> 
								
						<div>
								<input id='archivosbanner' type='file' name='archivo'  onchange='modbanner();'  style='display: none; ' />
								
							</div>
						</div>
						 
						
					
						
					</div><p>
					<center><a  onclick=\"document.getElementById('archivosbanner').click()\" class='btn btn-xs btn-info'><i class='fa fa-camera'></i> Subir Foto</A></center><p>
		</div>	";
					
					 
			?>
			  
			  
            </div>
			
			
			<div class="box box-danger collapsed-box">
            <div class="box-header">
				<strong>Estado</strong>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
				 
				 
				 
                <!-- /.input group -->
				<P>
				<div class="form-group">
					
					<select class="form-control select2" name="activo"  style="width: 100%;">
						<option value="0">Oculto</option>
						<option value="1" <? if ($not['activo']==1) {echo "selected";} ?>>Visible</option>
					</select>
				</div>
				
              </div>
			  

				 
            </div>
			
			
			
			
			
			
			
			
			
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		  
		  
		  
		  
		   <!-- /.editor avanzado-->
			</div>
          </div>
          <!-- /.box -->
		</div>

 

		
		
		
		
		
		
		
		
		
		
		
		</div>
		
		
		
</div>
</form>
</section> 


<script>
 
function modbanner(){ 

document.getElementById("banner").src='<? echo $folderAdmin; ?>/loading.gif';
 
$("#subido").remove();
var archivos = document.getElementById("archivosbanner");//Damos el valor del input tipo file
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
Req.open("POST", "<? echo $folderAdmin; ?>/ajax-foto-temp.php", true);

/* Le damos un evento al request, esto quiere decir que cuando termine de hacer la petición,
se ejecutara este fragmento de código */ 

Req.onload = function(Event) {
//Validamos que el status http sea ok 
if (Req.status == 200) { 


	document.getElementById('banner').style.display='none';

	
  //Recibimos la respuesta de php
  var msg = Req.responseText;
  $("#cargados").append(msg);
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ayuda</h4>
      </div>
      <div class="modal-body">
        Opciones de bloque:
		<ul>
			<li>Solo texto</li>
			<li>Texto y una foto: Se visualizará foto a la izquierda y texto a la derecha.</li>
			<li>Más de una foto: Se visualizará una galería de fotos.</li>
		</ul>
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
         
      </div>
    </div>
  </div>
</div>


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
	
<!-- Modal -->
<div class="modal fade" id="borrando" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar fotos bloque</h4>
      </div>
      <div class="modal-body">
        
		Las fotos del bloque han sido marcadas para borrar.
		
		
		
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
         
      </div>
    </div>
  </div>
</div>