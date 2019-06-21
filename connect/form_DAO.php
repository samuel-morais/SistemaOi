<?php 

require 'conexao.php';

class Form
 {


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
  
        $this->id_circuito = $id_circuito;
        $this->circuito = $circuito;
        $this->velocidade = $velocidade;
        $this->valor_contrato = $valor_contrato;
        
       /* $existeCircuito = "SELECT * FROM inventario_oi WHERE circuito = '{$this->circuito}';";
        $query = mysqli_query($this->conexao->getConn(), $existeCircuito);
        $existe = mysqli_fetch_assoc($query);

        if ($existe) {
            echo json_encode(['type' => 'error', 'msg' => 'Circuito já está cadastrado']);
            exit;
        }*/
 
        //$sql = "INSERT INTO inventario_oi (id_circuito, circuito, velocidade, valor_contrato) VALUES ('{$this->id_circuito}','{$this->circuito}','{$this->velocidade}', '{$this->valor_contrato}');";
        
		$sql = "SELECT id_circuito, circuito, velocidade,valor_contrato FROM inventario_oi 
	    WHERE id_circuito = 1  VALUES ('{$this->id_circuito}','{$this->circuito}','{$this->velocidade}', '{$this->valor_contrato}');";
 
        $result = mysqli_query($this->conexao->getConn(), $sql);

    }
 }
 
 ?>