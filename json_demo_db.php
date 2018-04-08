<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "root", "", "tupac");
$result = $conn->query("SELECT * FROM ".$obj->table." LIMIT ".$obj->limit);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

// header("Content-Type: application/json; charset=UTF-8");
// $obj = json_decode($_GET["x"], false);
// $conn = new mysqli("localhost", "root", "", "tupac");
// $result = $conn->query("SELECT * FROM productos WHERE id = $obj");
// $outp = array();
// $outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>