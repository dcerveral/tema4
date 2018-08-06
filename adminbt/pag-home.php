<?

 
if ($_POST['asunto']){
	
	
	
	$para      = 'daniel@my1.es';
	$titulo    = 'Ticket #'.date('Ymdh'). ' '.$_POST['asunto'];
	$mensaje   = $_POST['mensaje'];
	$cabeceras = 'From: '. $emailDef . "\r\n" .
		'Reply-To: '. $emailDef . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	 mail($para, $titulo, $mensaje, $cabeceras);
	
	$para      = $emailDef;
	$titulo    = 'Ticket #'.date('Ymdh'). ' '.$_POST['asunto'];
	$mensaje   = 'Su mensaje ha sido entregado: '. $_POST['mensaje'];
	$cabeceras = 'From: daniel@my1.es' . "\r\n" .
		'Reply-To: daniel@my1.es' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	 mail($para, $titulo, $mensaje, $cabeceras);
 
	$error="Mensaje enviado";
}

?>
<section class="content-header">
      <h1>
       Inicio        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"> Inicio</a></li>
        
         
		 
      </ol>
</section>

<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12">
          
		
		 
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Catalogo</h4>

              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-bag"></i>
            </div>
            <a href="productos" class="small-box-footer">Ver <i class="fa   fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Pedidos</h4>

              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="pedidos" class="small-box-footer">Ver <i class="fa   fa-arrow-circle-right"></i></a>
          </div>
       </div>
	   <div class="col-lg-3 col-xs-6">
		
		
		<div class="small-box bg-red">
            <div class="inner">
              <h4>Blog</h4>

              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="listado" class="small-box-footer">Ver <i class="fa   fa-arrow-circle-right"></i></a>
          </div>
        
		 </div>
	   <div class="col-lg-3 col-xs-6">
		<div class="small-box bg-yellow">
            <div class="inner">
              <h4>P&aacute;ginas</h4>

              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="opciones/1" class="small-box-footer">Ver <i class="fa   fa-arrow-circle-right"></i></a>
          </div>
		
		</div>
		
		
 
	</div>
</div>
 
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-8">
          <div class="box box-success">
            <div class="box-header">
				<strong>Nueva Noticia</strong>
			  <div class="box-tools pull-right">
               <form action='<? echo $folderAdmin; ?>/listado/<? echo $_GET['tipo']; ?>' method='POST'>
			   
                <button  class="btn  btn-success " > <i class="fa fa fa-eraser" aria-hidden="true"></i> Guardar Borrador</a></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
			  
		<div class="form-group">
                 
                  <input type="hidden" class="form-control" name='accion' value='nueva' >
        </div>
		<div class="form-group">
                  <label for="titulo">Titulo <sup>*</sup></label>
                  <input type="text" class="form-control" name='titulo' id="titulo" placeholder="Titulo" required>
        </div>
		
				
		<div class="form-group">
                <label>Categoria</label>
                <select class="form-control select2" name="subtitulo"  style="width: 100%;">
                  
                  <? //LISTAMOS TODAS LAS CATEGORIAS
						
						$consulta="select *  from categorias ORDER BY  categoria ";
				 
				$sql=mysql_query($consulta,$conex);
				while($campo=mysql_fetch_array($sql)){
				
				echo "<option value='".$campo[0]."'>".$campo['categoria']."</option>";
				}
						
						
						
						
						?>
                </select>
         </div>
			  
		<div class="form-group">
            <label>Entradilla</label>
                  <textarea class="form-control"   rows="3" name='texto' placeholder='Escribe aqui la entradilla de la noticia'></textarea>
         </div>
			  
			

	<div class="form-group">
                  <label for="url">WEB</label>
                  <input type="text" class="form-control" name='url' id="url" placeholder="https://">
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
							<img id='banner' class=' img-thumbnail'  style='width:100%;'  src='".$folderAdmin."/img.php?id=".$_GET['id']."'   onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\"> 
								
						<div>
								<input id='archivosbanner' type='file' name='archivo'  onchange='modbanner();'  style='display: none; ' />
								
							</div>
						</div>
						 
						
					
						
					</div><p>
					<center><a  onclick=\"document.getElementById('archivosbanner').click()\" class='btn btn-xs btn-info'><i class='fa fa-camera'></i> Subir Foto</A></center><p>
		</div>	";
					
					 
			?>
			  
		</form>	  
            </div>
			
			
			<div class="box box-danger">
            <div class="box-header">
				<strong>Ayuda</strong>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
				Envia un ticket soporte, para solicitar ayuda.
				<p><center />
				 <a  class="btn  btn-success " onclick="$('#ayuda').modal('show');" > <i class="fa fa fa-eraser" aria-hidden="true"></i> Solicitar ayuda</a></button>
          
			  
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
<div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Solicitar ayuda</h4>
      </div>
      <div class="modal-body">
			<form method='POST' action="<? echo $folderAdmin; ?>/home" >
			<div class="form-group">
                  <label for="asunto">Asunto</label>
                  <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Asunto">
            </div>
		
			<div class="form-group">
                  <label>Mensaje</label>
                  <textarea class="form-control" name="mensaje" rows="3" placeholder="Mensaje"></textarea>
            </div>
			 
	
      </div>
       <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success" >Enviar</button>
				</form>
      </div>
    </div>
  </div>
  
</div>


<!--Start of Tawk.to Script 
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/591596fa64f23d19a89b1d99/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->