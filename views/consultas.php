<?php

    require '../connect/form_DAO.php';

    $model = new Form();

    $consultas = $model->consultasForm('id_circuito', 'circuito', 'velocidade', 'valor_contrato');

    session_start();    

    //var_dump($usuarioTipo); 

?>

<!DOCTYPE html>
<html lang="pt-br">
	
	 <html>
        <head>
     		<title> CONSULTAS </title>
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
    <br>
    	<center><input type=button value=" VOLTAR " OnClick="history.back()"></center>
    <hr>
    </body>
    </html>
