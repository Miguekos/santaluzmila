<?php

$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$CajaChica = $_POST['cajac'];
$cajac = "insert into control (cajachica) value ('$CajaChica')";
$cajac1 = mysqli_query($con,$cajac);
//$cajac2 = mysqli_fetch_array($cajac1);
//$cajac3 = $cajac2[0]; 



?>
<script> 

window.location.replace('cajachica.php');

</script>