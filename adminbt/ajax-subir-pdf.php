<?php
session_start();

include ('conf.php');
include ('conex2.php');


if (!$_GET['id']){$_GET['id']=$_SESSION['id'];}
	 foreach ($_FILES as $key) {
	 
	 
	 //Obtenemos el nombre del archivo temporal
   $temporal = $key['tmp_name'];
    
	
 
	 }

	 
	 if (is_uploaded_file($key['tmp_name'])) {
			
			 
			if (mysqli_connect_errno()) {
			die("Error al conectar: ".mysqli_connect_error());
			 
			}
				 
			 
		//$binario_contenido = addslashes(fread(fopen($key['tmp_name'], "rb"), filesize($key['tmp_name'])));				   
							
							
		//$sql="UPDATE  `productos` SET  `pdf`='".$binario_contenido."',`pdfname`='".$key['name']."',`pdftipo`='".$key['type']."'   WHERE   `id` =".$_GET['id'].";";
		//$mysqli->query($sql);
							
		 	# Escapa caracteres especiales
			$imagenEscapes=$mysqli->real_escape_string(file_get_contents($key["tmp_name"]));

			
			
			$sql="UPDATE  `productos` SET  `pdf`='".$imagenEscapes."', `pdftipo`='".$key['type']."'   WHERE   `id` =".$_GET['id'].";";
			$mysqli->query($sql);
											
	 
		echo $key['name'];
		 
	 	  
	}
	else
	{echo "<script>alert('Imagen no valida');</script>";}
	
	  
	
?>