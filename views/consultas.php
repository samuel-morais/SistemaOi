<?php

$servidor ="localhost";
$usuario = "root";
$senha = "";
$dbname = "base_oi";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$consultas = $_POST['Circuito'];

echo " Circuitos: $consultas";

?>

	
