<?php

require_once("connect/conexao.php")


$circuito = $_POST['Circuito'];
$numero_logico = $_POST['Numero_Logico'];


$sql = "INSERT INTO 'inventario_oi' ('id_circuitos', 'numero_logico') VALUES ('$circuito', '$numero_logico')";
$result = mysql_query($sql);

if(!$result) {
	echo("Ocorreu um erro durante a inserção na tabela!");
} else {
	echo("Dados inseridos com sucesso!");
}


?>