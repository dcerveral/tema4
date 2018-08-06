 
 
 <?
$sendto='sent@'.$conf['dominio'];
$to= $_POST['to'] ;
 
$subject=$_POST['subject'];
$message=$_POST['message'];
 
 
 
 
	$cabeceras = 'From: '. $to . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	mail($sendto, $subject, $message, $cabeceras);

	$cabeceras = 'From: '. $conf['mailuser'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $cabeceras);
	
	
 
 
 ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Correo
        <small>Enviar correo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Correo</li>
		<li class="active">Componer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
           
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="/correo/entrada?<? echo $_GET['time']; ?>"><i class="fa fa-inbox"></i> Entrada</a></li>
                <li><a href="/correo/salida?<? echo $_GET['time']; ?>"><i class="fa fa-envelope-o"></i> Enviados</a></li>
                <li><a href="/correo/Drafts?<? echo $_GET['time']; ?>"><i class="fa fa-file-text-o"></i> Borradores</a></li>
                <li><a href="/correo/Junk?<? echo $_GET['time']; ?>"><i class="fa fa-filter"></i> Spam </a></li>
                <li><a href="/correo/Trash?<? echo $_GET['time']; ?>"><i class="fa fa-trash-o"></i> Papelera</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Correo enviado</h3>
            </div><form method="post" action="/correo-enviado">
            <!-- /.box-header -->
            <div class="box-body">
               
               El correo ha sido enviado
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->