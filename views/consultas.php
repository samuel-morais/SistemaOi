<?php

$servidor ="localhost";
$usuario = "root";
$senha = "";
$dbname = "base_oi";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


?>

<!DOCTYPE html>
<html lang="pt-br">
	
	 <html>
        <head>
     		<title> CONSULTAS </title>
    	</head>
	<body>
    	<hr>
    <center><font face="Arial" size="5" color="#008000"><b>Consultas</b></font>
    	<hr>
    <font face="Arial" size="2"><b>Informe o Circuito para consulta:</b></font>
    <br><br>

    	<tr>
    <form method="POST" action="consultas.php">
    <td><font face="Arial" size="2"><b></b></font></td><td><input type="text" name="consul_web" maxlength="12" size="13">
    <input type="submit" value=" Ok "></td>
    </form>
    <br>
    	<center><input type=button value=" Voltar " OnClick="history.back()"></center>
    <hr>
    </body>
    </html>
