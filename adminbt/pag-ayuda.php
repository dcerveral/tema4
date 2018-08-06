
<div class='container'>
<div class='row'>
<div class='col s12 l12' style='background-color: white; padding: 20px; border: 1px solid #E8E8E8;'>


 

<? error_reporting(0);
$conex2 =  mysql_connect('localhost', 'facturas_script', 'my1.es26');
$db2 = mysql_select_db('facturas_script', $conex2);
if (!$db2) {die ('Estamos actualizando este site. En unos minutos estara operativo.: ' . mysql_error());}
mysql_set_charset('utf8',$conex2); 








if ($_GET['descripcion']){
	$consulta="SELECT idservicio FROM `servicioscli` order by  idservicio DESC limit 1";
	$sql=mysql_query($consulta,$conex2);
	$totales=mysql_fetch_array($sql);
	$total=$totales[0]+1;
	$anno=date('Y');
	$hoy=date('Y-m-d');
	$hora=date('H:m:i');
	$CONSULTA="INSERT INTO `servicioscli` (`apartado`, `prioridad`, `cifnif`, `ciudad`, `codagente`, `codalmacen`, `codcliente`, `coddir`, `coddivisa`, `codejercicio`, `codigo`, `codpago`, `codpais`, 
	`codpostal`, `codserie`, `direccion`, `editable`, `garantia`, `fecha`, `hora`, `femail`, `fechafin`, `horafin`, `fechainicio`, `horainicio`, `idservicio`, `idalbaran`, `idprovincia`, `irpf`, `neto`, `nombrecliente`, `numero`, `numero2`, `observaciones`, `descripcion`, `solucion`, `material`, `material_estado`, `accesorios`, `porcomision`, `provincia`, `recfinanciero`, `tasaconv`, `total`, `totaleuros`, `totalirpf`, `totaliva`, `totalrecargo`, `idestado`)

		VALUES (NULL, '3', NULL, 'YECLA', '1', 'ALG', '000003', NULL, 'EUR', '".$anno."', 'TICKET".$total."', 'TRANS', 'ESP',
		NULL, 'A', NULL, '1', '0', '".$hoy."', '".$hora."', NULL, NULL, NULL, '".$hoy."', '".$hora."', '".$total."', NULL, NULL, '0', '0', 'GARAVER.ES', '".$total."', NULL, '".addslashes ($_GET['descripcion'])."', NULL, NULL, NULL, NULL, NULL, '0', 'MURCIA', '0', '1', '0', '0', '0', '0', '0', '1');";

	 

	mysql_query($CONSULTA,$conex2);
	
	
	?><div class='pad'>

			<div class='h1'>Ticket de soporte</div>

			<p>
			El ticket ha sido creado.

			</p>
			<a href='/admin/index.php?pag=ayuda' class="btn  btn-green">Continuar</A>
			<p>
			
			
	</div>

<?
	
		$para      = 'daniel@my1.es';
		$titulo    = 'Ticket '.$total.' - garaver.es';
		$mensaje   = addslashes ($_GET['descripcion']);
		$cabeceras = 'From: info@garaver.es' . "\r\n" .
			'Reply-To: info@garaver.es' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($para, $titulo, $mensaje, $cabeceras);
	
	die();

	}






?>

<div class='pad'>

 
<center><h5>Ticket de soporte</h5></center>
<p>
Vea el estado de sus tickets y abre un nuevo.

</p>


		
		<ol>

<?
$consulta="SELECT * FROM `servicioscli` WHERE codcliente='000003' ORDER BY codigo DESC LIMIT 100 ";

  
	$sql=mysql_query($consulta,$conex2);
	while($campo=mysql_fetch_array($sql)){
		
		switch ($campo['idestado']) {
			case '1': $estado="<span style='color:#d90000'>Pendiente</span>";break;
			case '2': $estado="<span style='color:#00468c'>En proceso</span>";break;;
			case '100': $estado="<span style='color:#004000'>Solucionado</span>";break;;
			}
		
		echo '<li><b> '.$estado.' '.$campo['codigo'].'</b> '.$campo['fecha'].'<p>
		
			<i>Problema</i>: '.$campo['observaciones'].'<p>
			<i>Motivo</i>: '.$campo['descripcion'].'<p>
			<i>Solucion</i>: '.$campo['solucion'].'<p>
		</li>';
		
		
		
	}




?>

</ol>

&nbsp;
<p><b>Nuevo Ticket</b>
</div>
<center>
<form action='/admin/index.php'>
	<input type="hidden"  name="pag" value="ayuda">
	<table style="width:60%;"><tr><td valign="top">Ticket</td><td>
	<textarea name="descripcion"  style='max-width:100%; height: 300px; background-color: #FFFFFF; border: 1px inset #eeeeee;  padding-left:5px;' paceholder="Describa el problema"></textarea></td></tr>
	<tr><td></td><td>
	<input type="submit" class="btn btn-green " style="float:right">
	</td></tr>
	</table>
</center>
</form>
 
 
 </div></div></div>