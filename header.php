<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Santa Luzmila</title>

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <meta name="viewport" content="width=device-width" />
  
  <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/gsdk.css" rel="stylesheet" /> 
  <link href="assets/css/demo.css" rel="stylesheet" /> 
    
  <!--     Font Awesome     -->
  <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
  <!-- <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'> -->

  <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
  <link rel="stylesheet" href="jquery.dataTables.min.css">
  

  
  

  <!-- <script src="jquery.min.js"></script> -->
  <!-- <script src="bootstrap.min.js"></script> -->
  <!-- tabla responsive -->
  <!-- <script src="dataTables.bootstrap.min.js"></script> -->
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery.dataTables.min.js"></script>
  <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
  <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
  <!-- <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" /> -->
  
  <!-- <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
  <!-- <link href='assets/css/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->


</head>
<body>

<!-- <style>
table {
  border-collapse: collapse;
  border: 1px solid #ccc;
  margin-top: 25px;
}
table thead th {
  background-color: #f2f2f2;
  font-weight: 500;
}
table thead th,
table tbody td {
  color: #333;
  font-family: 'segoe ui';
  font-size: 14px;
  padding: .5rem .65rem;
}
table thead th:not(:last-of-type),
table tbody td:not(:last-of-type) {
  border-right: 1px solid #ccc;
}
table thead tr,
table tbody tr:not(:last-of-type) {
  border-bottom: 1px solid #ccc;
}
</style> -->



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

<!-- <style>
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
</style> -->


<div id="navbar">

    <nav class="navbar navbar-ct-azzure" role="navigation">

      <div class="container-fluid">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="index2.php">Vender</a>

        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">

            <li><a href="ventas.php">Facturas</a></li>

            <li class=""><a href="productos.php">Cierre y Control</a></li>

            <!-- <li><a href="#">Otros</a></li> -->

            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Otros <b class="caret"></b></a>

              <ul class="dropdown-menu">

                <li><a href="#">Cierre de Caja</a></li>

                <!-- <li><a href="#"></a></li> -->

                <li><a href="#">Filtrar por fechas</a></li>

                <li class="divider"></li>

                <li><a href="#">Productos</a></li>

                <li class="divider"></li>

                <li><a href="#">Facturas Anuladas</a></li>

              </ul>

            </li>

          </ul>

          <!-- Lado izquierdo de la barra de nav -->
          <ul class="nav navbar-nav pull-right">
            <li><a href="#" class="">Caja Chica: <?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?></a></a></li>
            <li><a href="#" class="">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a></li>
            <li><a href="#" class="">Total Caja + Caja Chica: <?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?></a></li>            
          </ul>

        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->

    </nav>

</div><!--  end navbar --> 

