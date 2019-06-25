<?php

    require_once'../connect/connect_form.php';
    
    $model = new Cad_form;


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

<!-- SCRIPT DA PAGINA -->
<?php include '../views/Template/script.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- FIM SCRIPT -->

<script>

    $(document).ready(function() {
        //CHAMANDO O ACORDION DO SEMANTIC
        $('.ui.accordion').accordion();

        //ABRIR JANELA MODAL DO BOOTSTRAP
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
  

    //CONSULTAR CIRCUITO
    $('consultas.php').unbind('submit').submit(function(e) {
        e.preventDefault();
        
        $('[name="action"]').val('consultasForm');
        let id_circuito = $('id_circuito').val();
        let circuito = $('circuito').val();
        let velocidade = $('velocidade').val();
        let valor_contrato = $('valor_contrato').val();


        if (!circuito){
            return message('error', 'Campo circuito vazio!');
        } 

        $.ajax({
            method:'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType:'json',
            success: function(json) {
                if (json.type == 'success') { 
                    $('consul_web')[0].reset()
                    setTimeout(() => {
                            window.location.href = './cad_form.php';
                        }, 4500);                             
                    return message('success', json.msg);
                } else {
                    return message('error', json.msg);
                }                        
            }
        })
    });