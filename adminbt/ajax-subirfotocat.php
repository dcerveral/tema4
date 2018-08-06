<?php
session_start();

include ('conf.php');
include ('conex2.php');



	 foreach ($_FILES as $key) {
	 
	 
	 //Obtenemos el nombre del archivo temporal
   $temporal = $key['tmp_name'];
    
	
 
	 }

	 
	 if (is_uploaded_file($key['tmp_name'])) {
			
			// $mysqli=new mysqli("localhost","garaver_garaver","@Lasamapolassonrojas16","garaver_garaver");
			if (mysqli_connect_errno()) {
			die("Error al conectar: ".mysqli_connect_error());
			 include ('conex2.php');
			}
					# verificamos el formato de la imagen
			if ($key["type"]=="image/jpeg" || $key["type"]=="image/pjpeg" || $key["type"]=="image/gif" || $key["type"]=="image/bmp" ||$key["type"]=="image/png")
						{   
							# Cogemos la anchura y altura de la imagen
							$info=getimagesize($key["tmp_name"]);
						  

							# Escapa caracteres especiales
							$imagenEscapes=$mysqli->real_escape_string(file_get_contents($key["tmp_name"]));

							# Agregamos la imagen a la base de datos
						   
							
							
							$sql="UPDATE  `categorias` SET  `foto`='".$imagenEscapes."' WHERE   `id` =".$_SESSION['id'].";";
							 $mysqli->query($sql);
							
 
	 }

		 echo "
        <div id='subido'> 
		
	   <img id='banner'  src='".$folderAdmin."/imgcat.php?id=".$_SESSION['id']."&".date('is')."' onerror=\"this.src='".$folderAdmin."/sin_foto.jpg';\" style=' width: 100%;   ' >
		 
		</div>
		
		
      ";
	}
	else
	{echo "<script>alert('Imagen no valida');</script>";}
	
	  
	
?>