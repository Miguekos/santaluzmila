<?php include 'header.php'; ?>
<?php include 'style.php'; ?>
<script src="caja.js"></script>
<div class="topnav">
  <a class="active" href="index2.php">Caja</a>
  <a href="ventas.php">Facturas</a>
  <a href="productos.php">Cierre y Control</a>
  <a class="pull-right">Caja Chica: <?php echo number_format($tcaja, 2, ',', '.') ." S/"; ?></a></a>
  <a class="pull-right">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a>
  <a class="pull-right">Total Caja + Caja Chica: <?php echo number_format($totaltt, 2, ',', '.') ." S/"; ?></a>
</div>


<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<div class="container text-center col-lg-12">
<?php 

    $con = mysqli_connect('localhost','root','','sl');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"ajax_demo");
    $id_factura = "Select id_factura from ventas order by id_factura desc limit 1";
    $resultF = mysqli_query($con,$id_factura);
    $row = mysqli_fetch_array($resultF);
    $fact = $row[0] + 1;
?>
    
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <h1 class=""><p><b>Caja Registradora</b></p></h1>

                <h1 id="titulo"><p><b></b></p></h1>
                <!-- <form>  -->
                <div class="col-lg-6">
                    Producto / ID: <input autocomplete="off" class="form-control" autofocus type="text" id="id" onkeyup="showHint(this.value)">
                                    <input autocomplete="off" class="form-control" type="hidden" id="precioP">
                                    <input autocomplete="off" class="form-control" type="hidden" id="idPP">
                </div>
                <div class="col-lg-6">
                    Cantidad: <input class="form-control" onkeydown="enter2()" type="number" name="cantidad" id="monto">
                </div>
                
                <!-- <input type="submit" value="Agregar" onclick="agregarProducto(),clean(),operar('multiplicar')" class="btn btn-lg btn-default"></input> -->
                
                
                <div style="padding-bottom: 2%;">
                    <!-- <a class="btn btn-info" type="button" onclick="agregarProducto(),clean(),operar('multiplicar')">email me</a> -->
                    <button id="btn" onkeyup="agregarProducto(),operar('multiplicar'),nombres(),clean(),enter6()" style="border-top-width: 1px; margin-top: 10px;" class="btn btn-success">Factura No: <?php echo $fact; ?> </button>
                </div>
                <!-- <div class="col-lg-4"> -->
                    
                <!-- </div> -->
                <!-- </form> -->
            </div>
            
            <p> <span id="txtHint"></span></p>
            
            <!-- Imprimir total de productos prueba-->
            <!-- <p> <span id="demo"></span></p> -->
            <form action="guardar.php" method="POST" >
                <input type="hidden" name="Nfactura" value="<?php echo $fact; ?>">
                  
            <!-- <h2>Productos Agregados</h2> -->
            

            <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
            <table id="TablaPro" class="table">
                <thead>
                    <tr>
                        <th style="width:80%">Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="ProSelected">
                    <!--Ingreso un id al tbody-->
                    <tr>

                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td><input type="hidden" class="form-control" id="items" name="items" /></td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" id="total_1" name="total_1" value="0" /> <span class="form-control" type="" id="total_final" name="total_final" value="0" readonly> </span>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="pull-right form-group" style="width: 100%;">
                
            
            <label>Pago del Cliente</label>
            <input type="number" name="pagado" class="form-control">
            </div>
            <div class="form-group">

                <button type="text" id="imprimir" class="btn btn-lg btn-success pull-right">Imprimir</button>

            </div>
        </from>
        <a class="btn btn-lg btn-danger pull-left" href="index2.php">Limpiar</a>

        <!-- <a onclick="procesar()">email me</a> -->
        <a class="btn btn-lg btn-info" onclick="nombres()">Calcular</a>
        <!-- <button id="guardar"  name="guardar" class="btn btn-lg btn-danger pull-right">Calcular</button>  -->

        </div>
        </div>

    

<div class="col-lg-3"></div>
<!-- <script>
function procesar() {
    // var txt;
    var pago = prompt("Cantidad con que pagara :" , "");
    console.log(pago);
    // document.getElementById("pago").innerHTML = pago;

}
</script> -->