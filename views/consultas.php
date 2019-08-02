<?php
   require_once'../connect/connect_form.php';
   $cad = new Cad_form("base_oi","localhost","root","");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Clientes</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class='container'>
        <fieldset>

            <!-- Cabeçalho da Listagem -->
            <legend><h1>Listagem de Circuito cadastrados</h1></legend>

            <!-- Formulário de Pesquisa -->
            <form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
                <label class="col-md-2 control-label" for="termo">Pesquisar</label>
                <div class='col-md-7'>
                    <input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o número do circuito">
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
                <a href='index.php' class="btn btn-primary">Ver Todos</a>
            </form>

            <!-- Link para página de cadastro -->
            <a href='cad_form.php' class="btn btn-success pull-right">Cadastrar Circuito</a>
            <div class='clearfix'></div>

            <?php if(!empty($clientes)):?>

                <!-- Tabela de Clientes -->
                <table class="table table-striped">
                    <tr class='active'>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    <?php foreach($clientes as $cliente):?>
                        <tr>
                            <td><img src='fotos/<?=$cliente->foto?>' height='40' width='40'></td>
                            <td><?=$circuito->nome?></td>
                            <td><?=$cliente->email?></td>
                            <td><?=$cliente->celular?></td>
                            <td><?=$cliente->status?></td>
                            <td>
                                <a href='editar.php?id=<?=$cliente->id?>' class="btn btn-primary">Editar</a>
                                <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$cliente->id?>">Excluir</a>
                            </td>
                        </tr>   
                    <?php endforeach;?>
                </table>

            <?php else: ?>

                <!-- Mensagem caso não exista circuito ou não encontrado  -->
                <h3 class="text-center text-primary">Não existem circuito cadastrados!</h3>
            <?php endif; ?>
        </fieldset>
    </div>
    
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
   