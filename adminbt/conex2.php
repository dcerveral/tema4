<?
include('conf.php');
# Conectamos con MySQL
$mysqli=new mysqli("localhost",$conf['dbuser'],$conf['dbpass'],$conf['dbuser']);
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
?>