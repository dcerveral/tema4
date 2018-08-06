
<?

switch ($_GET['opcion']){
	
	case "guia":$h1="Guia de compras";break;
	case "garantia":$h1="Garantias";break;
	case "legal":$h1="Politica de privacidad y Cookies";break;
}
$opcion=mysql_fetch_array($sqlseo);
?>

<div class="page_section_offset">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12  ">
<h1 class="fw_light second_font color_dark tt_uppercase m_bottom_27"><? echo $h1; ?></h1>



<? echo $opcion['valor']; ?>


</div>
</div>
</div>
</div>



