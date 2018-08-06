<?
include('conf.php');
$conex =  mysql_connect('localhost', $conf['dbuser'], $conf['dbpass']);
$db = mysql_select_db($conf['dbuser'], $conex);
if (!$db) {die ('Estamos actualizando este site. En unos minutos estara operativo.: ' . mysql_error());}
 
?>