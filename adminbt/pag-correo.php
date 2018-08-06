<?

$sendto="sent@".$conf['dominio'];


?>

<section class="content-header">
      <h1>
       Bandeja de <? echo $_GET['tipo']; ?>  
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"> Inicio</a></li>
        <li><? echo $conf['mailuser']; ?></li>
        <li class="active"><? echo $_GET['tipo']; ?></li>
		 
      </ol>
</section> 
<section class="content">
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><? echo $_SESSION['tipo']; ?></h3>
			  <div class="box-tools pull-right">
               
                <a href="/index.php?pag=correo-componer&<? echo $_GET['time']; ?>" type="button" class="btn  btn-info btn-xs" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

	<table id="example1" class="table table-bordered table-hover table-striped nowrap  ">
                <thead>
                <tr>
                  <th><i class="fa fa-envelope-o" aria-hidden="true"></i></th>
                  
				   <th>Fecha</th>
				  <th>De</th>
				 <th>Para</th>
				  
                  <th>Asunto</th>
                  <th>Mensaje</th>
                </tr>
                </thead>
                <tbody>
				
 <?
 
//$inbox = imap_open("{beryllium.cloudhosting.co.uk}INBOX", "info@greenkiwi.org", "Lido19marzo");
/* connect to gmail */

if ($_GET['tipo']=="entrada"){$carpeta="INBOX";}else{
	if ($_GET['tipo']=="salida") {$carpeta="INBOX.Sent";}
		else {$carpeta="INBOX.".$_GET['tipo'];}

}
$hostname = '{beryllium.cloudhosting.co.uk}'.$carpeta;
$username = $conf['mailuser'];
$password = $conf['mailpass'];

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) {
		
		
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,1);
		
		 	
		//copiamos mail a enviados
		if ($_GET['tipo']=="entrada"){
			
			if ($overview[0]->to == $sendto){
				 
				 imap_mail_move ($inbox,$email_number,'INBOX.Sent');
				 imap_delete ($inbox, $email_number);
				imap_expunge ($inbox);
				$mostrar="N";
			}
			
		} 
		
		
		if ($_GET['p']==$email_number){
			
			 imap_mail_move ($inbox,$email_number,'INBOX.Trash');
				 imap_delete ($inbox, $email_number);
				imap_expunge ($inbox);
				$mostrar="N";
		}
		
		$from=$overview[0]->from;
		$to=$overview[0]->to;
		
		if ($to==$sendto){$from=$conf['mailuser'];$to=$overview[0]->from;}
		
		/* output the email header information */
		$output.= '<tr data-toggle="modal" data-target="#'.$email_number.'"><td><i class="fa '.($overview[0]->seen ? 'fa-envelope-open-o' : 'fa-envelope').'"></i></td>';
		$output.= '<td> '.date("d-m-Y", strtotime($overview[0]->date)).'</td>';
		$output.= '<td>'.$from.'</td>';
		 $output.= '<td>'.$to.'</td>';
		
		$output.= '<td>'.$overview[0]->subject.'</td>';
		
		
		
	 
		
		/* output the email body */
		$output.= '<td>'.strip_tags ( substr($message,0,20)).'</td></tr> ';
		
	$output.= '
 

<!-- Modal -->
<div class="modal fade" id="'.$email_number.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel">Asunto: '.$overview[0]->subject.'</h4>
			<h5 class="modal-title" id="exampleModalLabel">Fecha: '.date("d-m-Y", strtotime($overview[0]->date)).'</h5>
			<h5 class="modal-title" id="exampleModalLabel">De: '.$from.'</h5>
			<h5 class="modal-title" id="exampleModalLabel">Para: '.$to.'</h5>
	  </div>
      <div class="modal-body">
         '.strip_tags ( $message).'
		 
		 
      </div>
      <div class="modal-footer">
		  <div class="col-sm-12">
			
				
		  </div>
			<p>&nbsp;</p>
			
        <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
		
		 <a href="/correo/'.$_GET['tipo'].'/'.$email_number.'" type="button" class="btn btn-danger" >Borrar</a>
		 
        <a   href="/index.php?pag=correo-componer&reply=s&to='.$to.'&from='.$from.'&subject='.$overview[0]->subject.'&message='.$message.'&time='.$_GET['time'].'" class="btn btn-primary">Responder</a> 
		
		
      </div</div></div>
  </div> ';
		
	  
	}
	
	echo $output;
} 

/* close the connection */
imap_close($inbox);



 
 

?></table>


    </div></div>
  </div>
</div>
</section >

 