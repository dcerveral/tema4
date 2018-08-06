<?php
 

   include ('conf.php');
	include ('conex.php');


    $sql = "SELECT pdf,pdftipo,pdfname  FROM productos WHERE id='".$_GET['id']."'";

	
	 
	
    $consulta = mysql_query($sql,$conex);

    $datos = mysql_result($consulta,0,"pdf");
    $tipo = mysql_result($consulta,0,"pdftipo");
    $nombre = mysql_result($consulta,0,"pdfname");
    
 
  header("Content-type: $tipo");
     
  // header("Content-Disposition: inline; filename=$nombre"); 
 
   echo $datos;

 
?>