<?

session_start();

INCLUDE ('conf.php');
INCLUDE ('conex.php');

if (!$_GET['id']){$_GET['id']="1";}

$consulta="UPDATE ".$_GET['tabla']." SET ".$_GET['campo']."= '".addslashes (str_replace("\n", " ",$_GET['valor']))."' WHERE id='".$_GET['id']."';";


 

mysql_query($consulta,$conex);

?>

		<div class="alert alert-warning alert-dismissible"   id="alert"  style="position:fixed; bottom:1px; right:15px;z-index:1000" onclick="this.style.display='none';">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-warning"></i>
                Se ha actualizado el campo <? echo $_GET['tabla']; ?>/<strong><? echo $_GET['campo']; ?></strong> 
         
		</div>
		<script type="text/javascript">
			 
			setInterval(function(){
				document.getElementById("alert").style.display='none';
			},5000,"JavaScript");
		</script>