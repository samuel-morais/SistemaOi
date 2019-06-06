<?php

require_once("connect/conexao.php")

$circuito = $_POST['circuito'];
$numero_logico = $_POST['numero_logico'];


$sql = "INSERT INTO inventario_oi(id_circuitos, numero_logico) VALUES ('$circuito', '$numero_logico')";
$result = mysql_query($sql);

if(!$result) {
	echo("Ocorreu um erro durante a inserção na tabela!");
} else {
	echo("Dados inseridos com sucesso!");
}


?>