<?php include 'header.php'; ?>

<form action="filtro.php" method="POST" accept-charset="utf-8">
	<div class="container">
		<h2 class="text-center">Filtrar Por Fechas</h2>
		
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