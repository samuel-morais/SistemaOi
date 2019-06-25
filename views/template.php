<?php 
    require_once'../connect/connect_form.php';
    
    $form = new Cad_form;
    
    require '../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

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

                </td><td align="right" >Motivo ísentos * </td><td>
                        <select name="motivo_isentos" size="1">
                            <option value="SELECIONE">Selecione</option>

                                        <option value="motivo1">ACESSO RETIRADO</option>
                                        <option value="motivo2">ACORDO / DECISÃO GERENCIAL</option>
                                        <option value="motivo3">FATURAMENTO MANUAL</option>
                                        <option value="motivo4">HOMOLOGAÇÃO/ACEITE CLIENTE</option>
                                        <option value="motivo5">ISENTO CONTRATUALMENTE</option>
                                        <option value="motivo6">JA FATURANDO</option>
                                        <option value="motivo7">SOLUÇÃO TÉCNICA</option>
                                        <option value="motivo8">OS DE RETIRADA ABERTA/SOLICITADA </option>
          
                                    </select></td></tr>
            
            <tr><td align="right" >Número Logico *</td><td>
                <input type="text" name="numero_logico" maxlength="11" ></td>
            
            <td align="right" >Acesso Associado</td><td>
                <input type="text" name="acesso_associado" maxlength="11" ></td></tr>
            
            <tr><td align="right" >Chave DDD *</td><td>
                <input type="text" name="chave_ddd " id="chave_ddd"  maxlength="11" ></td>

            <td align="right" >Oficio de Solicitação</td><td>
                <input type="text" name="oficio_solicitacao" id="oficio_solicitacao" maxlength="11" ></td></tr>
            
            <tr><td align="right" >Chave Caixa</td><td>
                <input type="text" name="chave_caixa" id="chave_caixa" maxlength="11" ></d>

            <td align="right" >Data Homologação</td><td>
                <input type="date" name="data_homologacao" id="data_homologacao" maxlength="8"></td></tr>
            
            <tr><td align="right" >Contrato Caixa</td><td>
                <input type="text" name="contrato_caixa" id="contrato_caixa" ></td>

            <td align="right" >Circuito na Base Cliente</td><td>
                <input type="text" name="circuito_base_cliente" id="circuito_base_cliente" ></td></tr>
            
            <tr><td align="right" >Contrato oi *</td><td>
                <select name="select" id= "contrato_oi_select" required>
                    <option value="SELECIONE">Selecione</option>
                    <option value="10394_2017">10394/2017</option>
                    <option value="10402_2017">10402/2017</option>
                    <option value="1107_2013">1107/2013</option>
                    <option value="14081_2017">14081/2017</option>
                    <option value="14084_2017">14084/2017</option>
                    <option value="14086_2017">14086/2017</option>
                    <option value="14135_2018">14135/2018</option>
                    <option value="1494_2017">1494/2017</option>
                    <option value="3907_2013">3907/2013</option>
                    <option value="6001_2014">6001/2014</option>
                    <option value="6302_2018">6302/2018</option>
                    <option value="7559_2015">7559/2015</option>                   
                </select> 

            </td><td align="right" >Numero da Atividade</td><td>
            <input type="text" name="numero_atividade" id="numero_atividade" ></td></tr>
            
            <tr><td align="right" >Valor Contrato *</td><td>

                <input SIZE=7 type="text" name="Valor Contrato *" id="Valor_Contrato_*" >
                <input type="checkbox" name="valor_negociado" value="vn">Valor Acordado </td>

            
            <tr><td align="right" >Observações</td><td>
                <textarea id="observacoesform" cols="70" rows="8"></textarea>
            
            <tr><td align="right" >UF</td><td><input type="text" name="uf" id="uf" ></td>

            <td align="right" >Ciclo</td><td>
                <input type="text" name="ciclo" id="ciclo" ></td></tr>
            
            <tr><td align="right" >Local Lit / LOCAL</td><td>
                <input type="text" name="local_lit_local" id="local_lit_local" ></td>

            <td align="right" >Dia_Vencim</td><td>
                <input type="text" name="dia_vencim" id="dia_vencim" ></td></tr>
            
            <tr><td align="right" >Meio / TERMINAL</td><td>
                <input type="text" name="meioterminal" id="meioterminal" ></td>

            <td align="right" >Aglutinador</td><td>
                <input type="text" name="aglutinador" id="aglutinador" ></td></tr>
            
            <tr><td align="right" >DT INSTALAÇÃO</td><td>
                <input type="text" name="dt_instalacao" id="dt_instalacao" ></td>

            <td align="right" >ChaveCPCT</td><td>
                <input type="text" name="chavecpct" id="chavecpct" ></td></tr>
            
            <tr><td align="right" >DDD / CODIGO REGIAO</td><td>
                <input type="text" name="ddd_codigo_regiao" id="ddd_codigo_regiao" ></td>

            <td align="right" >CCUS</td><td>
                <input type="text" name="ccus" id="ccus" ></td></tr>
            
            <tr><td align="right" >Produto DADOS / TIPO CIRCUITO</td><td>
                <input type="text" name="produtos_dados_tipo_circuito" id="produtos_dados_tipo_circuito" ></td><td align="right" >Designacao DADOS</td><td>
                    <input type="text" name="designacao_dados" id="designacao_dados" ></td></tr>
            
            <tr><td align="right" >Velocidade</td><td>
                <input type="text" name="velocidade" id="velocidade" ></td>

            <td align="right" >Degrau tarif / DEGRAU</td><td><input type="text" name="degrau_tarif_degrau" id="degrau_tarif_degrau" ></td></tr>
            
            <tr><td align="right" >CNPJ / CNPJ TITULAR</td><td>
                <input type="text" name="cnpj_titular" id="cnpj_titular" ></td>

            <td align="right" >Tp CCUS</td><td>
                <input type="text" name="tp_ccus" id="tp_ccus" ></td></tr>
            
            <tr><td align="right" >Data de Retirada</td><td>
                <input type="text" name="data_retirada" id="data_retirada" ></td>

            <td align="right" >CNPJ USUARIO</td><td>
                <input type="text" name="cnpj_usuario" id="cnpj_usuario" ></td></tr>
            
            <tr><td align="right" >Local Num</td><td>
                <input type="text" name="local_num" id="local_num" ></td>

            <td align="right" >CATEGORIA</td><td><input type="text" name="categoria" id="categoria" ></td></tr>
            
            <tr><td align="right" >CJ não tem na RII</td><td>
                <input type="text" name="cj_nao_tem_rii" id="cj_nao_tem_rii" ></td>

            <td align="right" >SITUAÇÃO</td><td>
                <input type="text" name="situacao" id="situacao" ></td></tr>
            
            <tr><td align="right" >R Social Titular / TITULAR</td><td>
                <input type="text" name="r_social_titular" id="r_social_titular" ></td>

            <td align="right" >CONTRATO</td><td>
                <input type="text" name="contrato" id="contrato" ></td></tr>
            
            <tr><td align="right" >SU - não tem na RII</td><td>
                <input type="text" name="su_nao_tem_RII" id="su_nao_tem_RII" ></td>

            <td align="right" >AGRUPADOR</td><td>
                <input type="text" name="agrupador" id="agrupador" ></td></tr>
            
            <tr><td align="right" >Ativo_Inativo</td><td>
                <input type="text" name="ativo_inativo" id="ativo_inativo" ></td>

            <td align="right" >SERVIÇOS</td><td>
                <input type="text" name="servicos" id="servicos" ></td></tr>
            
            <tr><td align="right" >Descrição Produto Sisraf</td><td>
                <input type="text" name="descricao_produto_sisraf" id="descricao_produto_sisraf" ></td><td align="right" >CICLO</td><td>
                <input type="text" name="ciclo_1" id="ciclo_1" ></td></tr>
            
            <tr><td align="right" >AE</td><td>                
                <input type="text" name="ae" id="ae" ></td>

            <td align="right" >TERMINAL ANTERIOR / FICTICIO</td><td>
                <input type="text" name="terminal_anterior_ficticio" id="terminal_anterior_ficticio" ></td></tr>
           
            <tr><td align="right" >PONTA A</td><td>
                <input type="text" name="ponta_a" id="ponta_a" ></td>

            <td align="right" >PONTA A</td><td>
                <input type="text" name="ponta_a" id="ponta_a" ></td></tr>
            
            <tr><td align="right" >PONTA B</td><td>
                <input type="text" name="pontab" id="pontab" ></td>

            <td align="right" >PONTA B</td><td>
                <input type="text" name="pontab" id="pontab" ></td></tr>

                        
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