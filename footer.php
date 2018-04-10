<?php
// echo "<p>Copyright &copy; " . date("Y") . " Miguekos1233@gmail.com</p>";
?>

</body>
    
    <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/gsdk-checkbox.js"></script>
    <script src="assets/js/gsdk-radio.js"></script>
    <script src="assets/js/gsdk-bootstrapswitch.js"></script>
    <script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>


</html>
<!-- <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->
<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
        	"sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		        }
    } );
	} );
</script>