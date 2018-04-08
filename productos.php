<?php include 'header.php'; ?>
<?php include 'style.php'; ?>

<div class="topnav">
  <a href="index2.php">Caja</a>
  <a href="ventas.php">Facturas</a>
  <a class="active" href="productos.php">Cierre y Control</a>
  <a class="pull-right">Caja Chica: <?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?></a></a>
  <a class="pull-right">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a>
  <a class="pull-right">Total Caja + Caja Chica: <?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?></a>
</div>

<br>
<br>
<br>
<br>
<br>


<!-- <div>
	<h2>Monto total del dia 2018-Abril-02</h2><h2><small><?php echo number_format($filtrarD3, 2, ',', '.') ." S/"; ?></small></h2>
</div>

 -->
<form action="filtro.php" method="POST" accept-charset="utf-8">

<div class="container">
	

	<div class="form-group col-lg-6">
		<input type="date" class="form-control" name="fecha1">
	</div>
	<div class="form-group col-lg-6">
		<input type="date" class="form-control" name="fecha2">
	</div>
<div class="text-center">
	

	<button class="btn btn-info">Buscar</button>

</div>

<div>

	<input type="text" name="">
	
</div>


</div>





</form>