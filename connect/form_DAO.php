<?php 

require 'conexao.php';

class Form{


	private $conexao;
	private $id_circuito;
	private $circuito;
	private $velocidade;
	private $valor_contrato;



	public function __construct()
    {
        $this->conexao = new Connectdb();

    }

    public function consultasForm($id_circuito, $circuito, $velocidade, $valor_contrato)
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


}

 ?>