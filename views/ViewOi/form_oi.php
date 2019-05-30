<?php 
    require '../../connect/userDAO.php';

    $model = new UserDAO();

    $dados = $model->grid();

    session_start();    

    if (!$_SESSION['user']) {
        header('Location: ./form_oi.php');
    }
    
    //echo '<pre>';
    //var_dump($_SESSION['user']);
    //var_dump($dados);
?>

<!doctype html>
<html lang="pt-br" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/semantic/semantic.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/font-awesome/fontawesome-all.css">

    <link rel="stylesheet" type="text/css" href="../../vendor/toastr/jquery.toast.min.css">

    <link rel="stylesheet" type="text/css" href="../css/oi.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!-- CSS reset -->
    <link rel="stylesheet" href="../css/reset.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Modernizr -->
    <script src="../js/modernizr.js"></script>
    <!-- Title -->
    <title>Sistema OI | Home | Usuário</title>
</head>

<body>
    <!-- MENU -->
    <ul class="menu">
        <li class="menu-li"><a href="form_oi.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <!-- <li class="menu-li"><a href="#news"><i class="fa fa-question" aria-hidden="true"></i> Perguntas</a></li> -->
        <li class="menu-li" style="float:right">
            <a id="sair" href="../../controller/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sair</a>
        </li>
    </ul>


        <!-- cd-oi-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>   

    <script type="text/javascript" src="../js/tinymce/tinymce4.min.js"></script>
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/toastr/jquery.toast.min.js"></script>
    <script src="../js/jquery.mobile.custom.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
    <!-- SCRIPT DA PAGINA -->
    <?php include '../Template/loader.php'; ?>
    <!-- FIM SCRIPT -->

    <script>
   
        // INICIA O TINYMCE -> (TEXTAREA)
        tinyMCE.init({
            mode : "textareas",
            paste_auto_cleanup_on_paste : true,
            paste_remove_styles: true,
            paste_remove_styles_if_webkit: true,
            paste_strip_class_attributes: "all",
        });

    </script>
</body>

</html>