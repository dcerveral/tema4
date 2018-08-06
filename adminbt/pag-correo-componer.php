 
 
 <?
 
$to= $_GET['to'] ;
$from=$_GET['from'];
$subject=$_GET['subject'];
$message=$_GET['message'];
 if ($to==$conf['mailuser']){$to=$from;}
  if ($_GET['reply']){$subject="RE: ".$subject;}
   if ($message){$message="\n\r ----- \n\r".$message;}
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
              <h3 class="box-title">Nuevo Mensaje</h3>
            </div><form method="post" action="/correo-enviado">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input name="to" class="form-control" placeholder="To:" value="<? echo $to; ?>">
              </div>
              <div class="form-group">
                <input class="form-control" name="subject" placeholder="asunto:" value="<? echo $subject; ?>">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="message"><? echo $message; ?></textarea>
              </div>
               
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
             </form> </div>
                 </div>
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