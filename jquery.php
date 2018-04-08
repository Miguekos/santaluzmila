
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#boton").click(function(){
    	$("#parrafo1").after("<p>Este párrafo tiene que salir entre el párrafo 1 y 2</p>");
	}); 
});
</script>

<input type="button" id="boton" value="Añadir texto después del párrafo 1">

<p id="parrafo1">
	Inicio del párrafo 1.<br>
	Final del párrafo 1.
</p>

<p id="parrafo2">
	Inicio del párrafo 2.<br>
	Final del párrafo 2.
</p>