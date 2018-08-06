<?php

 

$paypal_account = "paypal@micodigophp.com"; //Mi cuenta de paypal
$paypal_currency = "USD"; //La moneda con la que estamos trabajando
 
/*
En la siguiente linea formaremos el query para mandar al servidor de paypal y verificar el pago.
*/
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
     $value = urlencode(stripslashes($value));
     $req .= "&$key=$value";
}
 
$test = 'no'; //Si estamos usando el sandbox, lo cambiamos a "si", de lo contrario lo mantendras en "no"
if($test == 'si'){
    $url="https://www.sandbox.paypal.com/cgi-bin/webscr";
}else{
    $url="https://www.paypal.com/cgi-bin/webscr";
}
 
$item_name = $_POST['item_name']; //El nombre de nuestro art�culo o producto.
$order_id = $_POST['item_number']; //El numero o ID de nuestro producto o invoice.
$payment_status = $_POST['payment_status']; //El estado del pago
$amount = $_POST['mc_gross']; //El monto total pagado
$payment_currency = $_POST['mc_currency']; //La moneda con que se ha hecho el pago
$transaction_id = $_POST['txn_id']; //EL ID o C�digo de transacci�n.
$receiver_email = $_POST['receiver_email']; //La cuenta que ha recibido el pago.
$customer_email = $_POST['payer_email']; //La cuenta que ha enviado el pago.
 
// Aqui verificamos si la cuenta que ha recibido el pago es nuestra cuenta.
if($paypal_account != $receiver_email){
   exit;
}
$res=file_get_contents($url."?".$req);
if (strcmp (trim($res), "VERIFIED") == 0) {
        // Verificamos si la moneda con la que se ha pagado es la misma que nosotros hemos configurado
	if($payment_currency != $paypal_currency) { 
		exit;
	}
 
	if($payment_status == "Completed") { 
	   //El pago ha sido recibido y completado con �xito, entonces aqui colocamos el c�digo que deseamos.
	}else{
          //El pago ha sido recibido pero no esta completado, asi que pueden poner el pedido como pendiente.
        }
}
 
?>