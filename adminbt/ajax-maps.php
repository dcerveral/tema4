<?

session_start();

INCLUDE ('conex.php');



$consulta="SELECT * FROM  empresa WHERE id='1';";
$sql=mysql_query($consulta,$conex);
$not=mysql_fetch_array($sql);
					
					
$url = "http://maps.googleapis.com/maps/api/geocode/json?address="	
						 
						.urlencode($not['direccion']).",".urlencode($not['cp']).",".urlencode($not['localidad']).",".urlencode($not['provincia'])."&language=es&sensor=true";

						echo $url;
							$data = @file_get_contents($url);
							$jsondata = json_decode($data,true);

							//print_r($jsondata); echo "<br><br>";
							if(is_array($jsondata)){
							
							$c=$jsondata['results'];
							$b=count($c);
							
								for ($a=0;$a<$b;$a++){
								$ubi[$a] = $jsondata['results'][$a]['formatted_address'];
								 $lat[$a] = $jsondata['results'][$a]['geometry']['location']['lat'];
								$lng[$a] = $jsondata['results'][$a]['geometry']['location']['lng'];
								 }
							} 

	mysql_query("UPDATE empresa SET lng='".$lng[0]."', lat='".$lat[0]."' WHERE id='1';",$conex);						
							
							
?>