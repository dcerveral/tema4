<? 


if ($_SESSION['cliente']['id']){
	
	$INCLUDE="include-form-envio.php";
	
}else{


	$INCLUDE="include-form-cliente.php";


	//ENVIAR CLAVE
	if ($_POST['accion']=="recordar"){

			//Averiguamos la clave 
		
			$consulta="SELECT clave,email FROM clientes WHERE email='".$_POST['email']."'  LIMIT 1";
			 
			$sql=mysql_query($consulta,$conex);
			$cli=mysql_fetch_array($sql);
			 
			if ($cli[0]){
				
				//ENVIAMOS LA CLAVE
				
					$para  = $cli[1];  
					 

					// título
					$titulo = 'Clave de acceso a '.$dominio;

					// mensaje
					$mensaje = '
					<html>
					<head>
					  <title>Envio de clave</title>
					</head>
					<body>
					 
						La clave de acceso a nuestra web <a href="https://'.$dominio.'">'.$dominio.'</a>, es la siguiente:
						<p>&nbsp;</p>
						 <center><b>'.$cli[0].'</b></center>
						<p>&nbsp;</p>
						
						Si usted no ha solicitado esta clave, le rogamos se ponga en contacto con
						nosotros, respondiendo a este correo.
						
						<p>
						
						Gracias.
				
						 
					</body>
					</html>
					';
	 
					// Para enviar un correo HTML, debe establecerse la cabecera Content-type
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Cabeceras adicionales
					$cabeceras .= 'To: '.$_POST['nombre'].' <'.$_POST['email'].'>' . "\r\n";
					$cabeceras .= 'From: '.$dominio.' <'.$emailDef.'>' . "\r\n";
					 
					$cabeceras .= 'Bcc: '.$emailDef.'' . "\r\n";

					// Enviarlo
					mail($para, $titulo, $mensaje, $cabeceras);
				
			$error="Hemos enviado la clave a su correo ".$_POST['email'].".";
		
			}else{
			$error="El correo ".$_POST['email'].", no est&aacute; dado de alta en nuestro sistema.";

			}
	}
	//INICIAMOS SESSION
	if ($_POST['accion']=="login"){
		
		
		//Averiguamos que el usuario/clave es correcto
		
			$consulta="SELECT * FROM clientes WHERE email='".$_POST['email']."' AND clave='".$_POST['clave']."' LIMIT 1";
			$sql=mysql_query($consulta,$conex);
			$cli=mysql_fetch_array($sql);
			 
			if ($cli[0]){
				 $_SESSION['cliente']['id']=$cli['id'];
				 $_SESSION['cliente']['nombre']=$cli['nombre'];
				 $_SESSION['cliente']['cif']=$cli['cif'];
				 $_SESSION['cliente']['direccion']=$cli['direccion'];
				 $_SESSION['cliente']['cp']=$cli['cp'];
				 $_SESSION['cliente']['ciudad']=$cli['ciudad'];
				 $_SESSION['cliente']['provincia']=$cli['provincia'];
				 $_SESSION['cliente']['telefono']=$cli['telefono'];
				 $_SESSION['cliente']['email']=$cli['email'];
				 
				 $_SESSION['enviara']['nombre']=$cli['nombre'];
				 $_SESSION['enviara']['direccion']=$cli['direccion'];
				 $_SESSION['enviara']['cp']=$cli['cp'];
				 $_SESSION['enviara']['ciudad']=$cli['ciudad'];
				 $_SESSION['enviara']['provincia']=$cli['provincia'];
				  
				 $INCLUDE="include-form-envio.php";
			}
			
			else {$error="El nombre de usuario y/o clave no son correctos. <span style='float:right'><a href='/tienda/cliente/#recordarclave'><u>Recordar clave</u></a></span>";}
		
		}

	//REGISTRO NUEVO CLIENTE


	if ($_POST['accion']=="nuevo"){
		//Buscamos cliente con ese mismo correo
		$consulta="SELECT * FROM clientes WHERE email='".$_POST['email']."'  LIMIT 1";
			$sql=mysql_query($consulta,$conex);
			$cli=mysql_fetch_array($sql);
			 
			//El cliente ya existe
			if ($cli['email']==$_POST['email']){
				
				$error="El cliente ya existe con el correo ".$_POST['email'].". <a href='#logincli'><u>Inicie sesi&oacute;n</u></a>. ";
				 $_SESSION['cliente']['nombre']=$cli['nombre'];
				 $_SESSION['cliente']['cif']=$cli['cif'];
				 $_SESSION['cliente']['direccion']=$cli['direccion'];
				 $_SESSION['cliente']['cp']=$cli['cp'];
				 $_SESSION['cliente']['ciudad']=$cli['ciudad'];
				 $_SESSION['cliente']['provincia']=$cli['provincia'];
				 $_SESSION['cliente']['telefono']=$cli['telefono'];
				 $_SESSION['cliente']['email']=$cli['email'];
				 
				 $_SESSION['enviara']['nombre']=$cli['nombre'];
				 $_SESSION['enviara']['direccion']=$cli['direccion'];
				 $_SESSION['enviara']['cp']=$cli['cp'];
				 $_SESSION['enviara']['ciudad']=$cli['ciudad'];
				 $_SESSION['enviara']['provincia']=$cli['provincia'];
				 //si la clave es la misma iniciamos sesion
				 if ( $cli['clave']==$_POST['clave']){$_SESSION['cliente']['id']=$cli['id'];$INCLUDE="include-form-envio.php";}
				 
			}
			else{
				//El cliente no existe, vamos a crearlo
				
				$consulta="INSERT INTO  `clientes` (
							`id` ,
							`email` ,
							`clave` ,
							`cif` ,
							`nombre` ,
							`direccion` ,
							`cp` ,
							`ciudad` ,
							`provincia` ,
							`pais` ,
							`telefono` ,
							`activo` ,
							`fecha` ,
							`notas` ,
							`zona`
							)
							VALUES (
							NULL ,  '".$_POST['email']."',  '".$_POST['clave']."',  '".$_POST['cif']."',  '".$_POST['nombre']."',  '".$_POST['direccion']."',  '".$_POST['cp']."',
							'".$_POST['ciudad']."',  '".$_POST['provincia']."',  '',  '".$_POST['telefono']."',
							'0', 
							CURRENT_TIMESTAMP ,  'Él mismo se creo la cuenta.',  '".$_SESSION['zona']."'
							); ";
				$sql=mysql_query($consulta,$conex);
				
				 $_SESSION['cliente']['id']=mysql_insert_id();
				 $_SESSION['cliente']['nombre']=$_POST['nombre'];
				 $_SESSION['cliente']['cif']=$_POST['cif'];
				 $_SESSION['cliente']['direccion']=$_POST['direccion'];
				 $_SESSION['cliente']['cp']=$_POST['cp'];
				 $_SESSION['cliente']['ciudad']=$_POST['ciudad'];
				 $_SESSION['cliente']['provincia']=$_POST['provincia'];
				 $_SESSION['cliente']['telefono']=$_POST['telefono'];
				 $_SESSION['cliente']['email']=$_POST['email'];
				 
				 $_SESSION['enviara']['nombre']=$_POST['nombre'];
				 $_SESSION['enviara']['direccion']=$_POST['direccion'];
				 $_SESSION['enviara']['cp']=$_POST['cp'];
				 $_SESSION['enviara']['ciudad']=$_POST['ciudad'];
				 $_SESSION['enviara']['provincia']=$_POST['provincia'];
				 
				 $INCLUDE="include-form-envio.php";
				 
				 //Como la cuenta no está confirmada, le enviamos un mail para confirmar el acceso
					$para  = $_POST['email'];  
					 

					// título
					$titulo = 'Confirmar alta en '.$dominio;

					// mensaje
					$mensaje = '
					<html>
					<head>
					  <title>Confirmar alta</title>
					</head>
					<body>
					 
						Gracias por darse de alta en nuestra web <a href="https://'.$dominio.'">'.$dominio.'</a> 
						<p>
						Para completar sus pedidos e iniciar sesi&oacute;n en nuestra web,
						debes confirmar que eres el propietario de este correo.
						<p>
						Para ello, haz clic en el siguiente enlace:
						<p>
						<a href="https://'.$dominio.'/confirmar/'. $_SESSION['cliente']['id'].'/'.base64_encode($para).'">'.$dominio.'/confirmar/'. $_SESSION['cliente']['id'].'/'.base64_encode($para).'</a><p>
					 
						<p>
						Gracias por su registro.
						<p>
					</body>
					</html>
					';
	 
					// Para enviar un correo HTML, debe establecerse la cabecera Content-type
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Cabeceras adicionales
					$cabeceras .= 'To: '.$_POST['nombre'].' <'.$_POST['email'].'>' . "\r\n";
					$cabeceras .= 'From: '.$dominio.' <'.$emailDef.'>' . "\r\n";
					 
					$cabeceras .= 'Bcc: '.$emailDef.'' . "\r\n";

					// Enviarlo
					mail($para, $titulo, $mensaje, $cabeceras);
				 
			}
		
	}
}
  INCLUDE ($INCLUDE); 
 ?>
			