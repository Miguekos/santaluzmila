<?php 
include 'header.php';
?>

<!-- <div class="topnav">
  <a href="index2.php">Caja</a>
  <a class="active" href="ventas.php">Facturas</a>
  <a href="productos.php">Cierre y Control</a>
  <a class="">Caja Chica: <?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?></a></a>
  <a class="">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a>
  <a class="">Total Caja + Caja Chica: <?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?></a>
</div> -->

<?php 
//Conexion a la base de datos.	
$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");

$num_facturas = "Select id_factura from ventas order by id_factura desc limit 1";
$result_N_F = mysqli_query($con,$num_facturas);
$row = mysqli_fetch_array($result_N_F);
$conteo_f = $row[0];
// echo $conteo_f;

?>

<div class="container">
  <h2 class="text-center">Facturas</h2>
  <!-- <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->

  <!-- <table id="customers" class="table"> -->
<!-- <div class="fresh-table full-color-blue"> -->
 
  <!-- <table id="customers" class="table"> -->
  <!-- <table id="example" class="display" style="width:100%"> -->
	<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th data-field="Factura" class="text-center">Factura</th>
        <th data-field="Fecha" class="text-center">Fecha</th>
        <th data-field="Total S/." class="text-center">Total S/.</th>
        <th data-field="Accion" class="text-center">Accion</th>
      </tr>
    </thead>
    <tbody>

<?php

$x = 1;
while ($conteo_f >= $x) {
	$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
	$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	//Obtengo las facturas que tengan el mismo id de factura
	$ventas = "Select id_factura, hora from ventas where id_factura = ".$x."";
	$ventas_1 = mysqli_query($con,$ventas);
	$row = mysqli_fetch_array($ventas_1);
	//Sumo todos los resultados de los productos por id de factura para obtener el total de la factura
	$sum_facturas = "Select sum(total) from ventas where id_factura = $x";
	$result_S_F = mysqli_query($con,$sum_facturas);
	$rowS = mysqli_fetch_array($result_S_F);
	$num1 = $row[0];
	$num2 = $row[1];
	$date = date_create("$num2");
	$diaL1 = date_format($date,"w");
	$diaN1 = date_format($date,"j");
	$mes1 = date_format($date,"n")-1;
	$ano1 = date_format($date,"Y");
	$hora = date_format($date,"g:i a");
	$dia1 = $dias_S["$diaL1"];
	$dia2 = $diaN1;
	$mes =  $meses_S["$mes1"];
	$ano =  $ano1;
	$hora = $hora;

	// $fecha = date_format($date,"$dias_S['n']");
	
	$num3 = $rowS[0];
	$num4 = number_format($num3, 2, '.', '') ." S/";
		echo "<tr>";
    echo "<td class='text-center'>".$num1."</td>";
    echo "<td class='text-center'>".$dia1." ".$dia2.", ".$mes." ".$ano.", ".$hora."</td>";
    echo "<td class='text-center'>".$num4."</td>";
    echo "<td class='text-center'><a href='' class=''>Anular</a></td>";
    echo "</tr>";
	// echo "<div class='text-center'>".$num1." ".$num2."</div>";
	// echo "<div class='text-center'>".$num2."</div><br>";
	$x = $x + 1;
}
?>
    </tbody>
  </table>
 <!-- </div> -->
</div>

<?php include 'footer.php'; ?>
