<?php
session_start();

include ('conf.php');
include ('conex2.php');

if (!$_GET['tabla']) {$_GET['tabla']="noticias";}
if ($_GET['foto']==0) {$foto="foto";$_GET['foto']="";}else{$foto="foto".$_GET['foto'];}
if (!$_GET['id']){$_GET['id']=$_SESSION['id'];}
	 foreach ($_FILES as $key) {
	 
	 
	 //Obtenemos el nombre del archivo temporal
   $temporal = $key['tmp_name'];
    
	
 
	 }

	 
	 if (is_uploaded_file($key['tmp_name'])) {
			
			 
			if (mysqli_connect_errno()) {
			die("Error al conectar: ".mysqli_connect_error());
			 
			}
					# verificamos el formato de la imagen
			if ($key["type"]=="image/jpeg" || $key["type"]=="image/pjpeg" || $key["type"]=="image/gif" || $key["type"]=="image/bmp" ||$key["type"]=="image/png")
						{   
							# Cogemos la anchura y altura de la imagen
							$info=getimagesize($key["tmp_name"]);
						  
						   
							  $ancho = $info[0];              //Ancho
							  $alto = $info[1];               //Alto
				  

							# Escapa caracteres especiales
							$imagenEscapes=$mysqli->real_escape_string(file_get_contents($key["tmp_name"]));

							# Agregamos la imagen a la base de datos
						   
							
							
							$sql="UPDATE  `".$_GET['tabla']."` SET  `".$foto."`='".$imagenEscapes."' WHERE   `id` =".$_GET['id'].";";
							 $mysqli->query($sql);
							
		 					
	 }

	 
	 	 echo "
        <div id='subido'> 
		
	   <img id='banner'  class=' img-thumbnail'  src='".$folderAdmin."/img.php?id=".$_GET['id']."&tabla=".$_GET['tabla']."&foto=".$_GET['foto']."&".date('is')."&".rand(111,999)."' onerror=\"this.src='/admin/sin_foto.jpg';\"   >
		
		
		</div>
		
		
      ";
	}
	else
	{echo "<script>alert('Imagen no valida');</script>";}
	
	  
	
?>