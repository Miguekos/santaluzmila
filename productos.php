<?php include 'header.php'; ?>

<!-- <div class="topnav">
  <a href="index2.php">Caja</a>
  <a href="ventas.php">Facturas</a>
  <a class="active" href="productos.php">Cierre y Control</a>
  <a class="pull-right">Caja Chica: <?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?></a></a>
  <a class="pull-right">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a>
  <a class="pull-right">Total Caja + Caja Chica: <?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?></a>
</div> -->




<!-- <div>
	<h2>Monto total del dia 2018-Abril-02</h2><h2><small><?php echo number_format($filtrarD3, 2, ',', '.') ." S/"; ?></small></h2>
</div>

 -->
<div class="container">
	<h2 class="text-center">Filtrar Por Fechas</h2>
<form action="filtro.php" method="POST" accept-charset="utf-8">

	<div class="form-group col-lg-3">
		<!-- <input type="date" class="form-control" name="fecha1"> -->
	</div>
	<div class="form-group col-lg-3">
		<label>Fecha Inicio</label>
		<input type="date" class="form-control" name="fecha1">
	</div>
	<div class="form-group col-lg-3">
		<label>Fecha Fin</label>
		<input type="date" class="form-control" name="fecha2">
	</div>
</div>
	<div class="text-center form-group col-lg-12">
		<button class="btn btn-info">Buscar</button>
	</div>
</form>

<?php include 'footer.php'; ?>