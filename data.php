<!DOCTYPE html>
<html>
<body>

<h2>Get data as JSON from a PHP file on the server.</h2>

<p id="demo"></p>

<script>
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"productos", "limit":10 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        txt = "Nombre" + " " + "Precio" + "<br>";
        for (x in myObj) {
            txt += myObj[x].nombre + " " + myObj[x].precio + "<br>";
        }
        document.getElementById("demo").innerHTML = txt;
    }
};
xmlhttp.open("GET", "json_demo_db.php?x=" + dbParam, true);
xmlhttp.send();

</script>

<p>Try changing the "table" property from "customers" to "products".</p>

</body>
</html>