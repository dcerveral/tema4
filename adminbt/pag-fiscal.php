
<div class='container'>
<div class='row'>
<div class='col s12 l12' style='background-color: white; padding: 10px; border: 1px solid #E8E8E8;'>

<?
				
					$consulta="select * from fiscal where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
?>
<center>
<h5> Datos fiscales</h5></center><p>

Datos de facturaci&oacute;n.

<p>&nbsp;<br>

			<div class='col s12 l3 '>CIF/NIE</div>
				<div class='col s12 l9'>
				<input type='text'   value='<? echo $not['cif']; ?>' onkeyup="llamarasincrono('/admin/ajax-mod.php?tabla=fiscal&campo=cif&valor=' + this.value ,'oculto')" >
				</div>
				
				<div class='col s12 l3 '>Nombre Fiscal</div>
				<div class='col s12 l9'>
				<input type='text'   value='<? echo $not['nombre']; ?>' onkeyup="llamarasincrono('/admin/ajax-mod.php?tabla=fiscal&campo=nombre&valor=' + this.value ,'oculto')" >
				</div>
				
				<div class='col s12 l3 '>Domicilio Fiscal</div>
				<div class='col s12 l9'>
				<input type='text'   value='<? echo $not['domicilio']; ?>' onkeyup="llamarasincrono('/admin/ajax-mod.php?tabla=fiscal&campo=domicilio&valor=' + this.value ,'oculto')" >
				</div>
				
				</div>
				
				<div class='col s12 l12'><p>
					<a href="#" onclick="Materialize.toast('Guardado',5000);" class='btn right'> <i class="fa fa-cloud"></i> Guardar</A>
				</div> 
				

</div>
</div>