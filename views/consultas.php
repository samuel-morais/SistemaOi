<?php

   require_once'../connect/connect_form.php';
   $cad = new Cad_form("base_oi","localhost","root","");

    //var_dump($usuarioTipo); 

?>

<!DOCTYPE html>
<html lang="pt-br">
	
	 <html>
        <head>
     		<title> CONSULTAS </title>
            <link rel="stylesheet" href="../css/consulta.css">
    	</head>
	<body>
    	<hr>
    <center><font face="Arial" size="6" color="#FF0000"><b>Consultas</b></font>
    	<hr>
    <font face="Arial" size="5"><b>Informe o Circuito para consulta:</b></font>
    <br><br>

    	<tr>
    <form method="POST" action="consultas.php">
    <td><font face="Arial" size="6"><b></b></font></td><td><input type="text" name="consul_web" id="consul_web"maxlength="12" size="15">
    <input type="submit" value=" CONSULTAR "></td>
    </form>
 
    <section id=result_pesquisa>
        <table>
            <tr id="titulo">
                <td>CIRCUITO</td>
                <td>VELOCIDADE</td>
                <td>VALOR DO CONTRATO</td>
                <td colspan="2">NÚMERO LOGICO</td>
            </tr>
    </body>
    </html>
   