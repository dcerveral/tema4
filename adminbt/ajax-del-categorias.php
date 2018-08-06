<?

session_start();


if ($_SESSION['admin']=="1"){

include ('conex.php');


	mysql_query("DELETE FROM categorias where id=".$_GET['id']."",$conex);
	echo "<script>Materialize.toast('Eliminada',3000);</script>"	;			
}

else
{
	echo "<script>Materialize.toast('No tiene Acceso',3000);</script>"	;	
	
}	
?>