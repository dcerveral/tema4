<?
				
					$consulta="select * from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					
	if ($_GET['id']){
		 
					
$url = "http://maps.googleapis.com/maps/api/geocode/json?address="	
						 
						.urlencode($not['direccion']).",".urlencode($not['cp']).",".urlencode($not['localidad']).",".urlencode($not['provincia'])."&language=es&sensor=true";

							$data = @file_get_contents($url);
							$jsondata = json_decode($data,true);

							//print_r($jsondata); echo "<br><br>";
							if(is_array($jsondata)){
							
							$c=$jsondata['results'];
							$b=count($c);
							
								for ($a=0;$a<$b;$a++){
								$ubi[$a] = $jsondata['results'][$a]['formatted_address'];
								 $lat[$a] = $jsondata['results'][$a]['geometry']['location']['lat'];
								$lng[$a] = $jsondata['results'][$a]['geometry']['location']['lng'];
								 }
							} 

	mysql_query("UPDATE empresa SET lng='".$lng[0]."', lat='".$lat[0]."' WHERE id='1';",$conex);						
							
							
 
		
	}
?>

<section class="content-header">
      <h1>
         Contacto 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>   Datos</a></li>
        <li class="active">Contacto</li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box">
            <div class="box-header">
            
			  <div class="box-tools pull-right">
               
                <a  href='<? echo $folderAdmin; ?>/contacto/<? echo date('is'); ?>' class="btn  btn-success " > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 
		 
		 
		
		
		<div class="form-group">
                  <label for="nombre">Nombre </label>
                  <input type="text" class="form-control"   value='<? echo $not['empresa']; ?>' id="nombre" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=empresa&valor=' + this.value ,'oculto')"  >
        </div>
		
		 <div class="form-group">
                  <label for="direccion">Direcci&oacute;n </label>
                  <input type="text" class="form-control"   value='<? echo $not['direccion']; ?>' id="direccion" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=direccion&valor=' + this.value ,'oculto')"  >
        </div>
		 
		 <div class="form-group">
                  <label for="cp">C.P. </label>
                  <input type="text" class="form-control"   value='<? echo $not['cp']; ?>' id="cp" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=cp&valor=' + this.value ,'oculto')"  >
        </div>
		
		 <div class="form-group">
                  <label for="localidad">Localidad</label>
                  <input type="text" class="form-control"   value='<? echo $not['localidad']; ?>' id="localidad" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=localidad&valor=' + this.value ,'oculto')"  >
        </div>
		<div class="form-group">
                  <label for="provincia">Provincia</label>
                  <input type="text" class="form-control"   value='<? echo $not['provincia']; ?>' id="provincia" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=provincia&valor=' + this.value ,'oculto')"  >
        </div>		 
				 
		<div class="form-group">
                  <label for="fijo">Tel&eacute;fono</label>
                  <input type="text" class="form-control"   value='<? echo $not['fijo']; ?>' id="provincia" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=fijo&valor=' + this.value ,'oculto')"  >
        </div>	

		<div class="form-group">
                  <label for="movil">M&oacute;vil</label>
                  <input type="text" class="form-control"   value='<? echo $not['movil']; ?>' id="movil" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=movil&valor=' + this.value ,'oculto')"  >
        </div>
		
		<div class="form-group">
                  <label for="fax">Fax</label>
                  <input type="text" class="form-control"   value='<? echo $not['fax']; ?>' id="fax" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=fax&valor=' + this.value ,'oculto')"  >
        </div>
				 
		<div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control"   value='<? echo $not['email']; ?>' id="email" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=email&valor=' + this.value ,'oculto')"  >
        </div>		 
				 
		<div class="form-group">
                  <label for="horario">Horario</label>
                  <input type="text" class="form-control"   value='<? echo $not['horario']; ?>' id="horario" onkeyup="llamarasincrono('<? echo $folderAdmin; ?>/ajax-mod.php?tabla=empresa&campo=horario&valor=' + this.value ,'oculto')"  >
        </div>		 
						 


				 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
		
		
		<div class="col-xs-12 col-lg-4">
          <div class="box box-danger">
            <div class="box-header">
             <strong>Logo e icono</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
		 <div class="col-xs-12">Logotipo
					<div id='imagen1'  onclick="document.getElementById('archivosbanner1').click()" >	
						<div id='cargados1'  >
							<img id='banner1' style='width:100%;cursor:hand;' class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=1&tabla=clientes&id=1&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner1' type='file' name='archivo'  onchange='modbanner(1);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>
				
				<div class="col-xs-12"><p>&nbsp;</P>Fabicon
					<div id='imagen2'  onclick="document.getElementById('archivosbanner2').click()" >	
						<div id='cargados2'  >
							<img id='banner2' style='width:100%;cursor:hand;'  class='img-fluid img-thumbnail' src='<? echo $folderAdmin; ?>/img.php?foto=2&tabla=clientes&id=1&<? echo rand(111,999); ?>'   onerror="this.src='<? echo $folderAdmin; ?>/sin_foto.jpg';"> 
							<div>
								<input id='archivosbanner2' type='file' name='archivo'  onchange='modbanner(2);'  style='display: none; ' />
							</div>
						</div>
					</div>  
				</div>   </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		</div>
	</div>
 
	

 
 </section>
 
 <script>
 
 
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
Req.open("POST", "<? echo $folderAdmin; ?>/ajax-subirfoto.php?tabla=clientes&id=1&foto=" + $foto, true);

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
 
 
 

