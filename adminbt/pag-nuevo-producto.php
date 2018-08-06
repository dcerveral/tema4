<?

if ($_POST['accion']){
	
	
	 $consulta="INSERT INTO  `productos` (`id`, `titulo`, `subtitulo`, `activo`,  `seo`, `tipo`, `ref`) VALUES 
				(NULL, '".addslashes($_POST['titulo'])."', '1', '1', '".$seo."', 'venta', '".addslashes($_POST['ref'])."' );";
		
 
	 $sql=mysql_query($consulta,$conex);
	 
	 $ID=mysql_insert_id();
	 
	 
		echo "<script>window.location.href='".$folderAdmin."/editar-producto/".$ID."'</script>";
	 	echo "<a href='".$folderAdmin."/editar-producto/".$ID."'>Continuar</a>";
	 
	}


?> 
<section class="content-header">
      <h1>
        Catalogo <small>Nuevo Producto</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li><a href="<? echo $adminFolder; ?>/productos">  Catalogo</a></li>
        <li class="active">Nuevo Producto</li>
      </ol>
    </section>

	
	<form action='<? echo $folderAdmin; ?>/nuevo-producto?<? echo date('im'); ?>' method='POST' enctype="multipart/form-data">
		<div class="form-group">
            <input type="hidden" class="form-control" value='nueva' name='accion' >
        </div>  
		 
		
<!-- Main content -->
    <section class="content">
	
	<div class="row">
        <div class="col-xs-12 col-lg-12">
            
	 <div class="col-xs-12">
	   <div class="box box-success">
            <div class="box-header">
				 <strong> PRODUCTO NUEVO</strong>
				 <div class="box-tools pull-right">
                <button type="submit" class="btn  btn-success btn-xs"><i class="fa fa-floppy-o" aria-hidden="true"></i> Continuar</button>
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
		
			  
			</div> 	 
		
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  

		</div>
		
		
		
		<div class="col-xs-12 col-lg-3">
		
		
		
		
		
		<div class="box box-danger">
            <div class="box-header">
				<strong>Ayuda</strong>
			  
              </div>
             
            <!-- /.box-header -->
			
			
            <div class="box-body">
               
				Indique la referencia y nombre del producto para continuar
			
			</div>  
		
		
		
		
				
		
            </div>
            <!-- /.box-body -->
          </div>
		
		
		
		
		
		
		
		
		
		
		
		
          
			
			
			
			
			
			 
		
		  
		  
		   
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
