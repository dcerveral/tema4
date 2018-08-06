<? 



//ACTUALIZAMOS CLIENTE

if ($_POST['accion']=="actualizarcliente"){
	
	
	mysql_query("UPDATE clientes SET 
					nombre='".$_POST['nombre']."',  
					cif='".$_POST['cif']."',  
					direccion='".$_POST['direccion']."', 
					cp='".$_POST['cp']."', 
					ciudad='".$_POST['ciudad']."', 
					provincia='".$_POST['provincia']."', 
					telefono='".$_POST['telefono']."'
				WHERE id='".$_SESSION['cliente']['id']."'
				LIMIT 1;
			",$conex);
				 $_SESSION['cliente']['nombre']=$_POST['nombre'];
				 $_SESSION['cliente']['cif']=$_POST['cif'];
				 $_SESSION['cliente']['direccion']=$_POST['direccion'];
				 $_SESSION['cliente']['cp']=$_POST['cp'];
				 $_SESSION['cliente']['ciudad']=$_POST['ciudad'];
				 $_SESSION['cliente']['provincia']=$_POST['provincia'];
				 $_SESSION['cliente']['telefono']=$_POST['telefono'];
				 				 
				 $_SESSION['enviara']['nombre']=$_POST['nombre'];
				 $_SESSION['enviara']['direccion']=$_POST['direccion'];
				 $_SESSION['enviara']['cp']=$_POST['cp'];
				 $_SESSION['enviara']['ciudad']=$_POST['ciudad'];
				 $_SESSION['enviara']['provincia']=$_POST['provincia'];
				 
	$error="Datos actualizados";
}


//ENVIAR CLAVE ACCESO
	if ($_POST['accion']=="recordar"){

			//Averiguamos la clave 
		
			$consulta="SELECT clave,email FROM clientes WHERE (email='".$_POST['email']."' OR cif='".$_POST['cif']."' )  LIMIT 1";
			 
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
				
			$error="Hemos enviado la clave a su correo ".$cli['email'].".";
		
			}else{
			$error="El correo/cif, no est&aacute; dado de alta en nuestro sistema.";

			}
	}

//CAMBIAMOS USUARIO Y CLAVE CON REENVIO DE EMAIL

if ($_POST['cambiarclave'] && $_POST['cambiaremail'])
	{
		$error="Datos actualizados, recuerde que debe de confirmar el nuevo correo.";
		//Actualizamos correo/clave y ponemos activo=0
		mysql_query("UPDATE clientes SET email='".$_POST['cambiaremail']."' , clave='".$_POST['cambiarclave']."' , activo='0' WHERE id='".$_SESSION['cliente']['id']."' LIMIT 1",$conex);
		
			$_SESSION['cliente']['email']=$_POST['cambiaremail'];
			
		//ENVIAMOS MAIL DE CONFIRMACION:
					
					$para  = $_SESSION['cliente']['email'];  
					 

					// título
					$titulo = 'Confirmar cambio de correo en '.$dominio;

					// mensaje
					$mensaje = '
					<html>
					<head>
					  <title>Confirmar nuevo correo</title>
					</head>
					<body>
					 
						 
						Para completar sus pedidos e iniciar sesi&oacute;n en nuestra web,
						debes confirmar que eres el propietario de este nuevo correo.
						<p>
						Para ello, haz clic en el siguiente enlace:
						<p>
						<a href="https://'.$dominio.'/confirmar/'. $_SESSION['cliente']['id'].'/'.base64_encode($para).'">'.$dominio.'/confirmar/'. $_SESSION['cliente']['id'].'/'.base64_encode($para).'</a><p>
					 
						<p>
						Gracias.
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



//CONFIRMAMOS CORREO

if ($_GET['idcliente'] && $_GET['correo']){
	
	
			$_GET['correo']=base64_decode($_GET['correo']);
			
			if ( mysql_query("UPDATE clientes SET activo='1' WHERE id='".$_GET['idcliente']."' AND email='".$_GET['correo']."' LIMIT 1",$conex) ) {
				
				$error="Gracias por confirmar su cuenta.";
				
				
			} else{$error="Su cuenta no ha podido ser confirmada.";}
			
			$_SESSION['cliente']['email']= $_GET['correo'];
			
			
			
			
			}



//CERRAMOS SESION

if ($_GET['salir']=="Y"){$_SESSION['cliente']['id']=null;}

// INICIAMOS SESION
if ($_POST['accion']=="login"){
	
	//Vamos a iniciar sesion
	
	$consulta="SELECT * FROM clientes WHERE email='".$_POST['email']."' AND clave='".$_POST['clave']."' LIMIT 1";
	$sql=mysql_query($consulta,$conex);
	$cli = mysql_fetch_array($sql);


		if ($cli[0])
		
		{
			
			$_SESSION['cliente']['id']=$cli[0];
			  
				 $_SESSION['cliente']['nombre']=$cli['nombre'];
				 $_SESSION['cliente']['cif']=$cli['cif'];
				 $_SESSION['cliente']['direccion']=$cli['direccion'];
				 $_SESSION['cliente']['cp']=$cli['cp'];
				 $_SESSION['cliente']['ciudad']=$cli['ciudad'];
				 $_SESSION['cliente']['provincia']=$cli['provincia'];
				 $_SESSION['cliente']['telefono']=$cli['telefono'];
				 $_SESSION['cliente']['email']=$cli['email'];
				 $_SESSION['cliente']['clave']=$cli['clave'];
				 
				 
				 
				 $_SESSION['enviara']['nombre']=$cli['nombre'];
				 $_SESSION['enviara']['direccion']=$cli['direccion'];
				 $_SESSION['enviara']['cp']=$cli['cp'];
				 $_SESSION['enviara']['ciudad']=$cli['ciudad'];
				 $_SESSION['enviara']['provincia']=$cli['provincia'];
				 
				 
			if ($cli['activo']==0)
		
			{	 
			// SI LA CUENTA NO ESTA CONFIRMADA LE ENVIAMOS OTRO MAIL
			//Como la cuenta no está confirmada, le enviamos un mail para confirmar el acceso
					$para  = $_SESSION['cliente']['email'];  
					 

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
					
					$error="Su correo no est&aacute; confirmado, le hemos enviado un mail con las instrucciones,
					para verificar que usted es el propietario del correo.";
			}
		}
		
		//NO HAY ACCESO
		else {$error="El correo/clave no son correctos.";}
	
	
}


//si no es cliente no entramos
if (!$_SESSION['cliente']['id']) {
	
	INCLUDE ('include-login.php');
}
else {INCLUDE ('include-area-clientes.php');}

?>