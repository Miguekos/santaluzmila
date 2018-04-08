<?php 
  date_default_timezone_set('America/Lima');
  // $dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
  // $meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 

  // $fcs = $dias_S[date('w')]." ".date('j').", ".$meses_S[date('n')-1]. "  ".date('Y'). ", " .date('g:i a');
  // $fcs1 = $dias_S[date('w')]." ".date('j');
  // $fechaS = $dias_S[date('w')];
  // $fechaS = date('w');

  // echo $fcs;
  // echo $fechaS;
  // echo $fcs1;
  // echo $fechaS;
?>

<?php 
//CConexion a la base de datos. 
$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");

$TotalCaja = "Select sum(total) from ventas";
$totalc = mysqli_query($con,$TotalCaja);
$rowTC = mysqli_fetch_array($totalc);
$total_caja = $rowTC[0];
// echo $conteo_f;

$cajachica1 = "Select cajachica from control";
$caja2 = mysqli_query($con,$cajachica1);
$caja3 = mysqli_fetch_array($caja2);
$tcaja = $caja3[0];
// echo $tcaja;

$totaltt = $total_caja + $tcaja;


?>



<style>
/*body {margin:0;}*/

.topnav {
  overflow: hidden;
  background-color: #f1f1f1;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

  .topnav a:hover {
    border-bottom: 3px solid blue;
  }

.topnav a.active {
  border-bottom: 3px solid grey;
}
</style>

