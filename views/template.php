<?php 
  
    require '../connect/userDAO.php';

    $model = new UserDAO();

    $usuarios = $model->gridUsuario();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./template.php');
    }

    $usuarioTipo = '';
    //var_dump($usuarioTipo); 

    


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME | SISTEMA OI</title>
    <link rel="icon" type="image/png" href="/images/Logo_oi.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<!-- =====LINK MENU CSS =====-->
<?php include '../views/Template/link_css.php'; ?>

<!--========= MENU ==========-->
<?php include '../views/Template/menu.php';?>

<!--========= NAVBAR ========-->
<?php include '../views/Template/navbar.php'; ?>

    

    <!--=========================================================-->
                        <!--CADASTRAR PLANILHAS-->
    <!--=========================================================-->
    <div id="tab-cadastro-msg" style="display:none;">
        <p class="text-p">Cadastrar Dados</p>
        <div class="container-fluid">
            <form id="form-cad-msg" class="container" id="needs-validation" method="POST" action="" >
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                <input type="hidden" name="action" value="">
                <!-- <div id="msg-valida"></div> -->
                <fieldset>
                    <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                <div class="form-group">
                    <label for="exampleInputPassword">Nome:</label>
                <div class="ui fluid disabled input">
                    <input type="text" id="nome" tabindex="-1" class="form-control" name="nome" value="<?php echo $_SESSION['user']['nome']; ?>">
                </div>
                </div>
                <table >
                
                <tr><td align="right" >Circuito *</td><td>
                    <input type="text" name="circuito" required maxlength="11">

                <tr><td align="right" >Velocidade</td><td>
                <input type="text" name="velocidade" id="velocidade" ></td>
           

                <tr><td align="right" >Valor Contrato *</td><td>
                <input type="text" name="valor_contrato *" id="valor_contrato*" >
            
                <tr><td align="right" >Número Logico *</td><td>
                <input type="text" name="numero_logico" maxlength="11" ></td> 
            
                <td align="right" >Acesso Associado</td><td>
                <input type="text" name="acesso_associado" maxlength="11" ></td>
            
                 
            </form>
            </table>
            </tr> </td>
            <br>


            <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Cadastrar</button>
            </fieldset>
        </form>
        <br>
        <center><input type=button value=" Voltar " OnClick="history.back()"></center>
    </div>
     <div id="#tab-form" style="display:none;">
     </div> 

<?php 

if(isset($_POST['circuito$']))
{

    $circuito = addcslashes($_POST['circuito']);
    $motivo_isentos = addcslashes($_POST['motivo_isentos']);
    $numero_logico = addcslashes($_POST['numero_logico']);
    $acesso_associado = addcslashes($_POST['acesso_associado']);
    //verificar se está preenchido 
    if(!empty($circuito) && !empty($motivo_isentos) && !empty($numero_logico) && !empty($acesso_associado))
    {
        $form->conectardb("base_oi","localhost","root", "");
        if($form->msgErro == "")// tudo ok
        {
            if($form->cadastrarForm($circuito,$motivo_isentos,$numero_logico,$acesso_associado))
            {

                echo "Cadastrado com sucesso!";
            }
            else
            {
                echo "Circuito já cadastrado!";
            }
        }
        else
        {
            echo "Erro: ".$form->msgErro;
        }
    }else{

        echo "Preencha todos os campos !";

    }
}




?>


        <!-- /.container -->
    </div>
    <!--=========================================================-->
                    <!--LISTAR USUÁRIO/ADMINISTRADOR-->
    <!--=========================================================-->
    <div id="tab-usuario" style="display:none;">
        <p class="text-p">Usuários</p>
        <div class="ui primary button" id="botao-novo" data-content="Cadastrar novo administrador">
            <i class="fa fa-plus" aria-hidden="true"></i> Novo
        </div>
        <br><br>
        <table class="ui very basic table">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo Usúario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $value) :  
                     $usuarioTipo = $value['usuario_tipo'];

                    if ($usuarioTipo == 'A') {
                        $nomeTipoUsuario = '<b style="color:#fff;">Administrador</b>';
                        $tipoUsuarioCor = 'black';
                    } else {
                        $nomeTipoUsuario = '<b style="color:#fff;">Usuário</b>';
                        $tipoUsuarioCor = 'blue';
                    } 
                ?>
                <tr data-id="<?php echo $value['id_usuario'] ?>">
                    <td class="about" data-name="nome"><?php echo $value['nome']; ?></td>
                    <td class="about" data-name="email"><?php echo $value['email']; ?></td>
                    <td class="about" data-name="tipo"><a class="ui <?php echo $tipoUsuarioCor; ?> label"><?php echo $nomeTipoUsuario; ?> </a></td>
                    <td>
                        <?php var_dump($value['id_usuario']); ?>
                        <button class="tiny ui red button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                    </td>
                </tr>

                <!--=========================================================-->
                                    <!--JANELA MODAL-->
                <!--=========================================================-->
                    <div class="modal fade bd-example-modal-sm" data-id="<?php echo $value['id_usuario'] ?>" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel"><b class="button-modal">Deseja realmente Excluir?</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
                                <button type="button" class="tiny ui red button btn-excluir-user" action="../controller/crud.php"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM MODAL -->

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--=========================================================-->
                        <!--ADMINISTRADOR-->
    <!--=========================================================-->
    <div id="tab-usuario-admin" style="display:none;">
        <p class="text-p">Cadastrar Administrador</p>
        <button id="botao-voltar" class="ui black basic button" style="margin-bottom: 15px; margin-left: 65px;">
            <i class="fa fa-reply" aria-hidden="true"></i> Voltar
        </button>
        <div class="container-fluid">
            <form name="formuser" id="form-perfil-admin" class="container" id="needs-validation">
                <!-- <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id_usuario']; ?>"> -->
                <input type="hidden" name="action" value="">
                <fieldset>
                    <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" id="admin-nome" name="nome" value="">
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="text" class="form-control" id="admin-email" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <div class="ui fluid action input">
                            <input type="password" class="form-control" id="senha-admin" name="senha">
                            <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="button-senha" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                      <div class="form-group">
                        <label>Confirme sua senha:</label>
                        <div class="ui fluid action input">
                            <input type="password" class="form-control" id="conf-senha-admin" name="rep-senha">
                            <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="button-conf-senha" class="ui button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <button class="positive ui button" type="submit" ><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                </fieldset>
            </form>
            <br>
        
        </div>
    </div>

    <!--=========================================================-->
                            <!--MEU PERFIL-->
    <!--=========================================================-->
    <div id="tab-perfil">
        <p class="text-p">Meu Perfil</p>
            <div class="container-fluid">
                <form id="form-perfil" class="container" id="needs-validation">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id_usuario']; ?>">
                    <input type="hidden" name="action" value="">
                    <div class="alert alert-success" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-check"></i> 
                        <strong></strong>
                    </div>
                    <fieldset>
                            <legend style="width:auto; font-size: 1.3em; color: black; font-weight: bolder;">Dados</legend>
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $_SESSION['user']['nome']; ?>">
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Senha:</label>
                            <div class="ui fluid action input">
                                <input type="password" class="form-control" id="password" name="senha">
                                <input type="hidden" class="form-control" name="senhaAntiga">                       
                            <a type="button" id="showPassword" class="ui button" value="Mostrar"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                        </div>
                        <button class="positive ui button" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                    </fieldset>
                </form>
                <br>
                <center><input type=button value=" Voltar " OnClick="history.back()"></center>
            </div>
        </div>
    </div>
<!--=========================================================-->
                    <!--FIM CONTEÚDO-->
<!--=========================================================-->

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

        //MENSAGEM TOASTR
        function message(type, msg) {
            if (msg) {
                //CONFIG MENSAGEM
                toastr.options = {
                    //"closeButton": true,
                    "closeButton": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "showDuration": "600",
                    "progressBar": true,
                    "hideDuration": "500",
                    "timeOut": "4500",
                    "extendedTimeOut": "1000",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "positionClass": "toast-top-center",
                }
            }
        
        }

    // CAMPO VISUALIZAR SENHA (MEU PERFIL)
    $('[href="#tab-visualiza-msg"]').click();
        $('#showPassword').on('click', function(){
    
        var passwordField = $('#password, #senha-admin, #conf-senha-admin');
        var passwordFieldType = passwordField.attr('type');

        if(passwordFieldType == 'password')
        {   
            passwordField.attr('type', 'text');
            $('#showPassword i').removeClass('fa-eye');
            $('#showPassword i').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#showPassword i').removeClass('fa-eye-slash');
            $('#showPassword i').addClass('fa-eye');
        }
    });

    // CAMPO VISUALIZAR SENHA (SENHA 1)
    $('#button-senha').on('click', function(){
    
        var passwordField = $('#senha-admin');
        var passwordFieldType = passwordField.attr('type');

        if(passwordFieldType == 'password')
        {   
            passwordField.attr('type', 'text');
            $('#button-senha i').removeClass('fa-eye');
            $('#button-senha i').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#button-senha i').removeClass('fa-eye-slash');
            $('#button-senha i').addClass('fa-eye');
        }
    });

    // CAMPO VISUALIZAR SENHA (CONFIRMAR SENHA)
    $('#button-conf-senha').on('click', function(){
    
        var passwordField = $('#conf-senha-admin');
        var passwordFieldType = passwordField.attr('type');

        if(passwordFieldType == 'password')
        {   
            passwordField.attr('type', 'text');
            $('#button-conf-senha i').removeClass('fa-eye');
            $('#button-conf-senha i').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $('#button-conf-senha i').removeClass('fa-eye-slash');
            $('#button-conf-senha i').addClass('fa-eye');
        }
    });
    
  
    //EDITAR USUARIO/ADMIN
    $('#form-perfil').unbind('submit').submit(function(e) {
        e.preventDefault();
        $('[name="action"]').val('editarUser');
        let dadosForm = $(this).serialize();
        let senha_admin = $('#password').val();

         if (!senha_admin){
            return message('error', 'Campo senha vazio!');
        }

        $.ajax({
            type: 'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {                
                    $('[name="senhaAntiga"]').val(json.senha);
                    return message('success', json.msg);
                } else {
                    return message('error', json.msg);
                    }            
                }
            });
        });
    

    //CADASTRAR ADMINISTRADOR
    $('#form-perfil-admin').unbind('submit').submit(function(e) {
        e.preventDefault();
        
        $('[name="action"]').val('inserirUserAdmin');
        let nome = $('#admin-nome').val();
        let email = $('#admin-email').val();
        let senha1 = $('#senha-admin').val();
        let senha2 = $('#conf-senha-admin').val();

        if (!nome){
            return message('error', 'Campo nome vazio!');
        }
        if (!email){
            return message('error', 'Campo e-mail vazio!');
        }
        if (senha1 != senha2) {
            return message('error', 'Senhas diferentes');
        } 

        $.ajax({
            method:'POST',
            url: '../controller/crud.php',
            data: $(this).serialize(),
            dataType:'json',
            success: function(json) {
                if (json.type == 'success') { 
                    $('#form-perfil-admin')[0].reset()
                    setTimeout(() => {
                            window.location.href = './template.php';
                        }, 4500);                             
                    return message('success', json.msg);
                } else {
                    return message('error', json.msg);
                }                        
            }
        })
    });

    //EXCLUIR USUARIO
    $('.btn-excluir-user').unbind('click').click(function(e) {
        e.preventDefault();
        var idUser = $(e.target).closest('#exampleModal').attr('data-id');

        $.ajax({
            type: 'POST',
            url: $('.btn-excluir-user').attr('action'),
            data: {
                id: idUser,
                action: 'excluirUser'
            },
            dataType: 'json',
            success: function(json) {
                if (json.type == 'success') {
                    //$(e.target).closest('#exampleModal').hide()
                    $('#exampleModal').modal('hide');
                    setTimeout(() => {
                        window.location.href = './template.php';
                    }, 4000);                                     
                    return message('success', json.msg);
                } else {
                    return message('error', json.msg);
                    }
                }
            });
        });
    });

    //TAB-CADASTRO
    $('[href="#tab-cadastro-msg"]').click(function(){
        $('#tab-cadastro-msg').css('display', 'block');
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-perfil').hide();
    });

    
    //BOTAO-NOVO-USUARIO
    $('#botao-novo').click(function(){
        $('#tab-usuario-admin').css('display', 'block');
        $('#tab-usuario').hide();
    });

    //BOTAO-VOLTAR
    $('#botao-voltar').click(function(){
        $('#tab-usuario').css('display', 'block');
        $('#tab-usuario-admin').hide();
        $('#form-perfil-admin')[0].reset();
    });

     //TAB-USUARIO
    $('[href="#tab-usuario"]').click(function(){
        $('#tab-usuario').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-perfil').hide();
    });

    //TAB-BOTAO
    $('[href="#botao-modal"]').click(function(){
        $('#modal-excluir').css('display', 'block');
        $('.mini.modal').modal('show');
    });

    //TAB-USUARIO/ADMIN
    $('[href="#tab-usuario-admin"]').click(function(){
        $('#tab-usuario-admin').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-visualiza-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-perfil').hide();
    });

    //TAB-PERFIL
    $('[href="#tab-perfil"]').click(function(){
        $('#tab-perfil').css('display', 'block');
        $('#tab-cadastro-msg').hide();
        $('#tab-usuario').hide();
        $('#tab-usuario-admin').hide();
        $('#tab-visualiza-msg').hide();
    });

</script>

</body>
</html>