<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
  <link rel="stylesheet" href="style.css">
</head>



<body>


  <form onsubmit="addPerson(event)">
    <section class="group">
      <input type="text" id="" class="name" placeholder="Nombre" />
      <input type="text" id="" class="lastname" placeholder="Apellido" />
    </section>
    <button type="submit">Agregar</button>
  </form>
  
  <table style="display: inline-block">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>



<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="append.js"></script>


<script>
    function RefrescaProducto() {
            var ip = [];
            var i = 0;
            $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
            $('.iProduct').each(function(index, element) {
                i++;
                ip.push({
                    id_pro: $(this).val()
                });
            });
            // Si la lista de Productos no es vacia Habilito el Boton Guardar
            if (i > 0) {
                $('#guardar').removeAttr('disabled', 'disabled');
            }
            var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
            $('#ListaPro').val(encodeURIComponent(ipt));
        }

        function agregarProducto() {

            var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
            var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select


            var sptext = text.split();

            var newtr = '<tr class="item"  data-id="'+sel+'">';
            newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
            newtr = newtr + '<td><input class="form-control" type="text" id="cantidad[]" name="lista[]" onChange="Calcular(this);" /></td><td><input class="form-control" type="text" id="precunit[]" name="lista[]" onChange="Calcular(this);" value="2.30"/></td><td><input class="form-control" type="text" id="totalitem[]" name="lista[]" readonly /></td>';
            newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item" ><i class="fa fa-times"></i></button></td></tr>';

            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

            RefrescaProducto(); //Refresco Productos

            $('.remove-item').off().click(function(e) {
                var total = document.getElementById("total");
                total.innerHTML = parseFloat(total.innerHTML) - parseFloat(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300);
                RefrescaProducto();
                
                Calcular(e.target);
            });
            $('.iProduct').off().change(function(e) {
                RefrescaProducto();
            
            });
        }

        
        function Calcular(ele) {
            var cantidad = 0, precunit = 0, totalitem = 0 ;
            var tr = ele.parentNode.parentNode;
            var nodes = tr.childNodes;
        
            for (var x = 0; x<nodes.length;x++) {
                
                if (nodes[x].firstChild.id == 'cantidad[]') {
                    cantidad = parseFloat(nodes[x].firstChild.value,10);
                }
                if (nodes[x].firstChild.id == 'precunit[]') {
                    precunit = parseFloat(nodes[x].firstChild.value,10);
                }
                if (nodes[x].firstChild.id == 'totalitem[]') {
                    anterior = nodes[x].firstChild.value;
                    totalitem = parseFloat((precunit*cantidad),10);
                    nodes[x].firstChild.value = totalitem;
                }
            }
            // Resultado final de cada fila ERROR, al editar o eliminar una fila
            var total = document.getElementById("total");
            if (total.innerHTML == 'NaN') {
                total.innerHTML = 0;
                // 
            }
            total.innerHTML = parseFloat(total.innerHTML)+totalitem -anterior ;    
        }
    
    </script>



</body>
</html>