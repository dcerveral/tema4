<?php

 


$user = 'garaver';//Usuario de acceso al panel de control
$pass = 'Lido19marzo';//Contraseña de acceso al panel de control
$domain = 'garaver.es';//No incluyas 'http://' ni 'www'

/*
NO NEED TO TOUCH ANYTHING BELOW HERE
*/

//retrieves the file, either .pl or .png
function getFile($fileQuery){
global $user, $pass, $domain;
return file_get_contents("https://$user:$pass@$domain:2083/".$fileQuery."&ssl=1&lang=es&framename=mainright",'r');
}

//it's a .png file...
if(strpos($_SERVER['QUERY_STRING'],'.png')!==false) {
$fileQuery = $_SERVER['QUERY_STRING'];
}
//probably first time to access page...
elseif(empty($_SERVER['QUERY_STRING'])){
$fileQuery = "awstats.pl?config=$domain";
}
//otherwise, all other accesses
else {
$fileQuery = 'awstats.pl?'.$_SERVER['QUERY_STRING'];
}
 
//now get the file
$file = getFile($fileQuery);
$file = str_replace('="<form','<form style="display:none;"',$file);
//check again to see if it was a .png file
//if it's not, replace the links
if(strpos($_SERVER['QUERY_STRING'],'.png')===false) {
$file = str_replace('awstats.pl', basename($_SERVER['PHP_SELF']), $file);
$file = str_replace('="/images','="',$file);

 


}
//if it is a png, output appropriate header
else {
header("Content-type: image/png");
}

//output the file
echo $file;
?>
 