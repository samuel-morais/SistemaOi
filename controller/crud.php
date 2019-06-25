<?php 

require '../connect/userDAO.php';
require '../connect/form_DAO.php';

$action = $_POST['action'];

$model = new UserDAO();

switch ($action) {
    case 'inserirUser':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model->inserirUser($nome, $email, $senha);
    break;


     case 'inserirUserAdmin':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model->inserirUserAdmin($nome, $email, $senha);
    break;

    case 'editarUser':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaAntiga = $_POST['senhaAntiga'];
        $model->editarUser($id, $nome, $email, $senha, $senhaAntiga);
    break;

    case 'excluirUser':
        $id = $_POST['id'];
        $model->excluirUser($id);
    break;

}