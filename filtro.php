<?php 
include 'header.php';
include "style.php";
?>
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
?>


<div>
	<h2>Monto total del dia <?php echo "Del dia ". $fecha_i . " al dia " .$fecha_f; ?></h2><h2><small><?php echo number_format($filtrarD3, 2, ',', '.') ." S/"; ?></small></h2>
</div>

<div class="container text-center">
	<a href="productos.php" class="btn btn-success">Volver</a>
</div>