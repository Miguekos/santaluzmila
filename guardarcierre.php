<?php

$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");


$cajachicacierre = $_POST['cajachicac'];
$totalventascieere = $_POST['totalventasc'];
$totalcajacierre = $_POST['totalcajac'];

if ($totalventascieere <= 0) {
	?>
	<script>
	alert("No puedes cerrar caja si no tienes Venta..!!");
	</script>
	<?php
}else{


$cajac = "insert into cierre (cajachicac, totalventasc, totalcajac) value ('$cajachicacierre','$totalventascieere','$totalcajacierre')";
//echo "$cajac";
$cajac1 = mysqli_query($con,$cajac);
//$cajac2 = mysqli_fetch_array($cajac1);
//$cajac3 = $cajac2[0]; 

$cierre = $_POST['cierre'];
echo $cierre;
$num_cierres = "insert into horadecierre (cierres) value ('$cierre')";
$result_C = mysqli_query($con,$num_cierres);
//echo "$result_C";
//$rowC = mysqli_fetch_array($result_C);
//$conteo_C = $rowC[0];
//echo "$conteo_C";
}
?>
<script> 

window.location.replace('cierre.php');

</script>