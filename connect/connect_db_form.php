<?php 

$conn = new PDO("mysql:dbname=base_oi;host=localhost","root","");


$stmt = $conn -> prepare("SELECT * FROM inventario_oi ORDER BY ");

$stmt ->execute();

$results = $stmt ->fetchall(PDO::FETCH_ASSOC);

var_dump($results);

 ?>
