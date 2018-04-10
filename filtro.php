<?php include 'header.php'; ?>
<?php 
	//CConexion a la base de datos. 
	$fecha_i = $_POST['fecha1'];
	//echo "$fecha_i"."<br>";
	$fecha_f = $_POST['fecha2'];
	//echo "$fecha_f"."<br>";
	$con = mysqli_connect('localhost','root','','sl');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"ajax_demo");

	$filtrarD = "Select sum(total) from ventas WHERE hora BETWEEN '$fecha_i 00:00:59' AND '$fecha_f 23:59:59'";
	// echo "$filtrarD";
	$filtrarD1 = mysqli_query($con,$filtrarD);
	$filtrarD2 = mysqli_fetch_array($filtrarD1);
	$filtrarD3 = $filtrarD2[0];
	// echo $filtrarD3;

	// $filtrar1D = "Select * from ventas WHERE hora BETWEEN '$fecha_i 00:00:59' AND '$fecha_f 23:59:59'";
	// $filtrar1D = "Select * from ventas WHERE id_factura = '1'";
	$filtrar1D = "Select * from ventas WHERE hora BETWEEN '$fecha_i 00:00:59' AND '$fecha_f 23:59:59'";
	// echo "$filtrar1D";
	$filtrar1D1 = mysqli_query($con,$filtrar1D);
	$filtrar1D2 = mysqli_fetch_array($filtrar1D1);
	$filtrar1D3 = $filtrar1D2[0];
	// echo $filtrarD3;
?>
<div>
	<h2 class="text-center">Monto total <?php echo "del dia<b> ". $fecha_i . " </b>al dia <b>" .$fecha_f . "</b>"; ?></h2>
	<h3 class="text-center"><?php echo "Total de Busqueda: <b>".number_format($filtrarD3, 2, ',', '.') ." S/</b>"; ?></h3>
</div>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <!-- <th data-field="Factura" class="text-center">Factura</th> -->
        <th data-field="Fecha" class="text-center">N. Factura</th>
        <th data-field="Total S/." class="text-center">Producto</th>
        <th data-field="Accion" class="text-center">Cantidad</th>
		<th data-field="Precio Unidad" class="text-center">Precio Unidad</th>
        <th data-field="Total S/." class="text-center">Precio Total S/.</th>
		<th data-field="Total S/." class="text-center">Fecha</th>
      </tr>
    </thead>
    <tbody>
<?php
	while($row = mysqli_fetch_array($filtrar1D1)) {
		echo "<tr>";
		// echo "<td class='text-center'>".$row[0]."</td>";
		echo "<td class='text-center'>".$row[1]."</td>";
		echo "<td class='text-center'>".$row[2]."</td>";
		echo "<td class='text-center'>".$row[3]."</td>";
		echo "<td class='text-center'>".$row[4]." S/.</td>";
		echo "<td class='text-center'>".$row[5]." S/.</td>";
		echo "<td class='text-center'>".$row[6]."</td>";
		echo "</tr>";

	}
?>
    </tbody>
  </table>



