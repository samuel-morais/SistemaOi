<?php 

require 'connect.php';

class UserDAO
{
    private $conexao;

    private $id;
    private $nome;
    private $idUsuario;
    private $pergunta;
    private $idPergunta;
    private $resposta;
    //private $idResposta;

    private $email;
    private $senha;

    public function __construct()
    {
        $this->conexao = new Connect();
    }

    public function logar($email, $senha)
    {
        $senha = md5($senha);

        $sql = "SELECT id_usuario, nome, email, senha, usuario_tipo FROM usuario WHERE email = '{$email}' AND senha = '{$senha}';";
        $executa = mysqli_query($this->conexao->getConn(), $sql);

        if (mysqli_num_rows($executa) > 0) {
            return $linha = mysqli_fetch_assoc($executa);
        } else {
            return false;
        }
    }

    public function inserirUser($nome, $email, $senha)
    {
        if (empty($senha)) {
            echo json_encode(['type' => 'error', 'msg' => 'Senha em branco']);
            exit;
        }

        $this->nome = $nome;
        $this->email = $email;
        $this->senha = md5($senha);
        $this->usuario_tipo = 'U';

        $existeEmail = "SELECT * FROM usuario WHERE email = '{$this->email}';";
        $query = mysqli_query($this->conexao->getConn(), $existeEmail);
        $existe = mysqli_fetch_assoc($query);

        if ($existe) {
            echo json_encode(['type' => 'error', 'msg' => 'Usuário já está cadastrado']);
            exit;
        }

        $sql = "INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('{$this->nome}','{$this->email}','{$this->senha}', '{$this->usuario_tipo}');";
        $result = mysqli_query($this->conexao->getConn(), $sql);
        
        if ($result) {
            echo json_encode(['type' => 'success', 'msg' => 'Usuário inserido com sucesso']);
            exit;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Erro ao inserir usuário']);
            exit;
        }
    }

    public function inserirUserAdmin($nome, $email, $senha)
    {
        if (empty($senha)) {
            echo json_encode(['type' => 'error', 'msg' => 'Senha em branco']);
            exit;
        }

        $this->nome = $nome;
        $this->email = $email;
        $this->senha = md5($senha);
        $this->usuario_tipo = 'A';

        $existeEmail = "SELECT * FROM usuario WHERE email = '{$this->email}';";
        $query = mysqli_query($this->conexao->getConn(), $existeEmail);
        $existe = mysqli_fetch_assoc($query);

        if ($existe) {
            echo json_encode(['type' => 'error', 'msg' => 'Usuário já está cadastrado']);
            exit;
        }

        $sql = "INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('{$this->nome}','{$this->email}','{$this->senha}', '{$this->usuario_tipo}');";
        $result = mysqli_query($this->conexao->getConn(), $sql);
        
        if ($result) {
            echo json_encode(['type' => 'success', 'msg' => 'Usuário inserido com sucesso']);
            exit;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Erro ao inserir usuário']);
            exit;
        }
    }

    public function editarUser($id, $nome, $email, $senha, $senhaAntiga)
    {
        if (!$senha) {
            $senha = $senhaAntiga;
        } else {
            $senha = md5($senha);
        }

        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;

        $sql = "UPDATE usuario SET nome = '{$this->nome}', email = '{$this->email}', senha = '{$this->senha}' WHERE id_usuario = '{$this->id}';";
        $result = mysqli_query($this->conexao->getConn(), $sql);

        if ($result) {
            echo json_encode(['type' => 'success', 'senha' => $senha, 'msg' => 'Dados atualizados com sucesso. Clique em sair e logue novamente para que os dados possam fazer efeito.']);
            exit;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Erro ao tentar alterar dados']);
            exit;
        }
    }
    


    public function gridUsuario()
    {
        $sql = "SELECT * FROM usuario;";
        $result = mysqli_query($this->conexao->getConn(), $sql) or die('<script>alert("Falha ao editar o registro")</script>');

        $usuarios = array();
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }

    public function editarMsg($id, $pergunta)
    {
        $this->id = $id;
        $this->pergunta = $pergunta;

        $sql = "UPDATE perguntas SET no_pergunta = '{$this->pergunta}' WHERE id_pergunta = '{$this->id}';";
        $result = mysqli_query($this->conexao->getConn(), $sql);

        if ($result) {
            echo json_encode(['type' => 'success', 'msg' => 'Pergunta editada com sucesso']);
            exit;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Erro ao tentar editar Pergunta']);
            exit;
        }
    }

    

    public function excluirUser($id)
    {
        $this->id_usuario = $id;

        $sql = "DELETE FROM usuario WHERE id_usuario = '{$id}';";
        $result = mysqli_query($this->conexao->getConn(), $sql) or die('<script>alert("Falha ao excluir o registro")</script>');

        if ($result) {
            echo json_encode(['type' => 'success', 'msg' => 'Usuário excluído com sucesso']);
            exit;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir cadastro']);
            exit;
        }
    }
}