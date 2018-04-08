<?php 
//CConexion a la base de datos.	
$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");

$fac = $_GET['fac'];
// echo $fac;

$num_facturas = "Select * from ventas where id_factura = $fac";
$result_N_F = mysqli_query($con,$num_facturas);
$row = mysqli_fetch_array($result_N_F);
$sum_facturas = "Select sum(total) from ventas where id_factura = $fac";
$result_S_F = mysqli_query($con,$sum_facturas);
$rowS = mysqli_fetch_array($result_S_F);
$conteo_f1 = $row[0];
$conteo_f2 = $row[1];
$conteo_f3 = $row[2];
$conteo_f4 = $row[3];
$conteo_f5 = $rowS[0];

echo $conteo_f1;
echo $conteo_f2;
echo $conteo_f3;
echo $conteo_f4;
echo $conteo_f5;

?>