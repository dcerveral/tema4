
<section class="content-header">
      <h1>
        Blog <small>Categorias</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
		<li>Blog</li>
         <li><a href="<? echo $adminFolder; ?>/categorias">  Categorias</a></li>
        <li class="active">Nueva</li>
      </ol>
    </section>

	
	
	
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               <form action='<? echo $folderAdmin; ?>/categorias' method='POST'>
                <button  class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='accion' value='nueva' >
        </div>
		<div class="form-group">
                  <label for="titulo">Categoria <sup>*</sup></label>
                  <input type="text" class="form-control" name='titulo' id="titulo" placeholder="Titulo" required>
        </div>
		
		<div class="form-group">
                  <label for="descripcion">Descripci&oacute;n</label>
                  <input type="text" class="form-control" name='descripcion' id="descripcion" placeholder="Descripci&oacute;n" >
        </div>
		
		
		<div class="form-group">
                <label>Superior</label>
                <select class="form-control select2" name="superior"  style="width: 100%;">
                  
                  <? //LISTAMOS TODAS LAS CATEGORIAS
						
						$consulta="select *  from categorias ORDER BY superior,categoria ";
				 
				$sql=mysql_query($consulta,$conex);
				while($campo=mysql_fetch_array($sql)){
				
				echo "<option value='".$campo[0]."'>".$campo['categoria']."</option>";
				}
						
						
						
						
						?>
                </select>
         </div>
			  
		
			  
			  
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		  
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		<div class="col-xs-12 col-lg-4">
          <div class="box box-success">
            <div class="box-header">
           
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
			
			 
			  <?
				
				 
				echo " 
					<div id='imagen'   >	
						
						<div id='cargados'  >
							<img id='banner' class=' img-thumbnail'  style='width:100%;'  src='".$folderAdmin."/imgcat.php?id=".$_GET['id']."'   onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"> 
								
						<div>
								<input id='archivosbanner' type='file' name='archivo'  onchange='modbanner();'  style='display: none; ' />
								
							</div>
						</div>
						 
						
					
						
					</div><p>
					<center><a  onclick=\"document.getElementById('archivosbanner').click()\" class='btn btn-xs btn-info'><i class='fa fa-camera'></i> Subir Foto</A></center><p>
		</div>	";
					
					 
			?>
			  
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		  
		  
		  
		  
		  
		  
		  

 

		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
</div>
</section> 


<script>
 
function modbanner(){ 

document.getElementById("banner").src='<? echo $folderAdmin; ?>/loading.gif';
 
$("#subido").remove();
var archivos = document.getElementById("archivosbanner");//Damos el valor del input tipo file
var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo

/* Creamos el objeto que hara la petici�n AJAX al servidor, debemos de validar 
si existe el objeto � XMLHttpRequest� ya que en internet explorer viejito no esta,
y si no esta usamos �ActiveXObject� */ 

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
//que no se repita, si no lo usamos solo tendra el valor de la ultima iteraci�n
for(i=0; i<archivo.length; i++){
   data.append('archivo'+i,archivo[i]);
}

//Pas�ndole la url a la que haremos la petici�n
Req.open("POST", "<? echo $folderAdmin; ?>/ajax-foto-temp.php", true);

/* Le damos un evento al request, esto quiere decir que cuando termine de hacer la petici�n,
se ejecutara este fragmento de c�digo */ 

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

 //Enviamos la petici�n 
 Req.send(data); 

}
 

</script>