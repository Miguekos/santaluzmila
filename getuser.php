
<style>
.tableta {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 3px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','sl');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
// $sql="SELECT * FROM productos WHERE id = '".$q."' or nombre = '".$q."'";
// $sql='SELECT * FROM productos WHERE id = ."$q". or nombre LIKE ."$q".';
$sql="SELECT * FROM productos WHERE id = '".$q."' or nombre LIKE '%".$q."%' or categoria LIKE '%".$q."%'";
// $sql="SELECT * FROM productos WHERE nombre LIKE '%".$q."%'";
// echo $sql;
// $sql="SELECT * FROM productos";
$result = mysqli_query($con,$sql);

echo "<table class='tableta'>
<tr>
<th class=''>ID</th>
<th class=''>Categoria</th>
<th class=''>Nombre</th>
<th class=''>Peso</th>
<th class='text-center'>Precio</th>
</tr>";
$j = 1;
while($row = mysqli_fetch_array($result)) {    
    echo "<tr>";
    echo "<td class='' id='idP".$j."'>" . $row['id'] . "</td>";
    echo "<td class='' onclick='agregarNombre(".$j."),enter5();' id='categoria'>" . $row['categoria'] . "</td>";
    echo "<td class='' onclick='agregarNombre(".$j."),enter5();' id='nombre".$j."'>" . $row['nombre'] . "</td>";
    echo "<td class='' onclick='agregarNombre(".$j."),enter5();' id='peso'>" . $row['peso'] . "</td>";
    echo "<td class='text-center' id='precio".$j."'>" . $row['precio'] . "</td>";
    // echo "<td id='cantidad'><input type='text' class='form-control' name='cantidad' value=''></td>";
    // echo "<td>" . $row['Hometown'] . "</td>";
    // echo "<td>" . $row['Job'] . "</td>";
    // echo "<td><a class='text-center' onclick='agregarNombre(".$j."),enter5();'>Agregar</a></td>";
    echo "</tr>";
    // echo count($row['id']);
    $j = $j + 1;

}
echo "</table>";
mysqli_close($con);
// while($row = mysqli_fetch_array($result)) {
    
//     echo "<div id='idP'>" . $row['id'] . "</div>";
//     echo "<div id='nombre'>" . $row['nombre'] . "</div>";
//     echo "<div id='precio'>" . $row['precio'] . "</div>";
// }
// mysqli_close($con);
?>
</body>
</html>