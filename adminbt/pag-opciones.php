<?

	if ($_POST['id']){
		
		//Grabamos todos los idiomas
		// foreach ( $_POST["valor"] as $valor ) { 
        //   $valores.=$valor."###";
		//	}
		
		
		mysql_query("UPDATE opciones SET valor='".addslashes($_POST["valor"])."' WHERE id='".$_POST['id']."' ",$conex);
		
		
		$error="Datos actualizados.";
		
	}

		$consulta="select * from opciones where id='".$_GET['id']."'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
					
					
		/*			
		//idiomas
		$consulta="SELECT idiomabase FROM empresa WHERE id=1";
		$sql=mysql_query($consulta,$conex);
		$arrayidiomas=mysql_fetch_array($sql);
		$idiomas=explode(',',$arrayidiomas[0]);
		
		$contenido=explode('###',$not['valor']);
		*/
?>


<section class="content-header">
      <h1>
         P&aacute;ginas <small><? echo $not['opcion']; ?></small> 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>P&aacute;ginas</li>
        <li class="active"><? echo $not['opcion']; ?></li>
      </ol>
    </section>
	
		
				
<!-- Main content -->
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-12">
          <div class="box">
            
			 
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-header">
            <form method='POST' >
		 
		 
		 
		
		
		<div class="form-group">
                 <input type='hidden' name='id' value='<? echo $not[0]; ?>'>
        </div>
		
		
		<?  // $a=0; foreach ($idiomas as &$valor) { if ($a==0) {$b="";} else {$b=$a;} ?>
   
		 
		<div class="form-group">
			<label for="editor" class="  control-label"><? echo ucfirst($not['opcion']); ?>  </label>
			<textarea class="form-control textarea" id="editor"   name='valor'  required><? echo $not["valor"]; ?></textarea>
		</div>
		 
	
	
		<? // $a++; } ?>
	
            </div>
            <!-- /.box-body --><button type="submit" class="btn  btn-success pull-right" > <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a></button>
        	</form>
          </div>
          <!-- /.box -->

		</div>
		
		 
		 
	</div>
 
	

 
 </section>
 