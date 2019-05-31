<?php

$hostname ="localhost";
$user = "root";
$password = "";
$database = "base_oi";
$conn = mysqli_connect($hostname, $user, $password, $database);

if(!$conn){
	echo "Falha na conexão com o banco de dados";

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

}


?>

