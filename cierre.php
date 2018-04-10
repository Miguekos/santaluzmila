<?php include 'header.php'; ?>

<!-- <style>
table {
	border-radius: 6px;
    border-collapse: collapse;
    width: 100%;
}

th, td {
	border-radius: 6px;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
	border-radius: 6px;
    background-color: #4CAF50;
    color: white;
}
</style> -->
<?php 

//Conexion a la base de datos.	
$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");


$num_cierres = "Select id from horadecierre order by id desc limit 1";
$result_C = mysqli_query($con,$num_cierres);
$rowC = mysqli_fetch_array($result_C);
$conteo_C = $rowC[0];
//echo "cierres: ".$conteo_C;

?>

<form action="guardarcierre.php" method="POST" accept-charset="utf-8">
	<div class="container">
		<h2 class="text-center">Cierre de Caja</h2>
		<h6 class="text-center">Cierre N°: <?php echo $conteo_C + 1; ?></h6>
		<input type="hidden" name="cierre" value="<?php echo $conteo_C + 1; ?>">
			
		<div class="form-group col-lg-3">
		</div>	
		<div class="form-group col-lg-2">
			<label>Caja Chica</label>
			<input type="text" class="form-control" readonly value="<?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?>" name="cajachicac">
		</div>
		<div class="form-group col-lg-2">
			<label>Total En Ventas</label>
			<input type="text" class="form-control" readonly value="<?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?>" name="totalventasc">
		</div>
		<div class="form-group col-lg-2">
			<label>Total En Caja</label>
			<input type="text" class="form-control" readonly value="<?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?>" name="totalcajac">
		</div>
		<div class="form-group col-lg-3">
		</div>
	</div>
	<div class="text-center form-group col-lg-12">
		<button class="btn btn-info">Cerrar</button>
	</div>
</form>

<?php 

$num_facturas = "Select id from cierre order by id desc limit 1";
$result_N_F = mysqli_query($con,$num_facturas);
$row = mysqli_fetch_array($result_N_F);
$conteo_f = $row[0];
//echo "conteo: ".$conteo_f;

?>

<div class="container">
  <h2 class="text-center">Cierres</h2>
  	<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th data-field="" class="text-center">id</th>
        <th data-field="" class="text-center">Caja Chica</th>
        <th data-field="" class="text-center">Total en Ventas</th>
        <th data-field="" class="text-center">Total En caja</th>
        <th data-field="" class="text-center">Fecha</th>
      </tr>
    </thead>
    <tbody>

<?php

$x = 1;
while ($conteo_f >= $x) {
	$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
	$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	//Obtengo las facturas que tengan el mismo id de factura
	$ventas = "Select * from cierre where id = ".$x."";
	$ventas_1 = mysqli_query($con,$ventas);
	$row = mysqli_fetch_array($ventas_1);
	//Sumo todos los resultados de los productos por id de factura para obtener el total de la factura
	//$sum_facturas = "Select sum(total) from ventas where id_factura = $x";
	//$result_S_F = mysqli_query($con,$sum_facturas);
	//$rowS = mysqli_fetch_array($result_S_F);
	$item1 = $row[0];
	$item2 = $row[1];
	$item3 = $row[2];
	$item4 = $row[3];
	$item5 = $row[4];

	$date = date_create("$item5");
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
	
	//$num3 = $rowS[0];
	//$num4 = number_format($num3, 2, '.', '') ." S/";
	echo "<tr>";
    echo "<td class='text-center'>".$item1."</td>";
    echo "<td class='text-center'>".$item2."</td>";
    echo "<td class='text-center'>".$item3."</td>";
    echo "<td class='text-center'>".$item4."</td>";
    echo "<td class='text-center'>".$dia1." ".$dia2.", ".$mes." ".$ano.", ".$hora."</td>";
    
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
