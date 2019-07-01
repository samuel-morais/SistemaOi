<?php

Class Cad_form{
    private $pdo;
    

    public function __construct($dbname, $host, $user, $senha)
    {   

        try {

            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        
             } 
    
         catch (PDOException $e) {
         echo "Erro com a  conexão do banco de dados". $e->getMessage();
            exit();
        }

         catch (Exception $e) {
         echo "Erro generico com a  conexão do banco de dados". $e->getMessage();
            
           exit();
        }
      }

    public function getDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM inventario_oi ORDER BY circuito");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    //FUNÇÃO CADASTRAR CIRCUITO
    public function cadastrarForm($circuito,$velocidade,$valor_contrato,$numero_logico)
    
    //antes de cadastrar verificar se tem um circuito cadastrado

    {
        $cmd = $this->pdo->prepare("SELECT id_circuito FROM inventario_oi WHERE circuito = :c");
        $cmd->bindValue(":c","$circuito");
        $cmd->execute();
        if($cmd->rowCount() >0)
        {
            return false;

        }else //Não foi encontrado o circuito
     
        {
            $cmd =$this->pdo->prepare("INSERT INTO inventario_oi(circuito,velocidade,valor_contrato,numero_logico) VALUES(:circuito, :velocidade, :valor_contrato, :numero_logico)");
            $cmd->bindValue(":circuito","$circuito");
            $cmd->bindValue(":velocidade","$velocidade");
            $cmd->bindValue(":valor_contrato","$valor_contrato");
            $cmd->bindValue(":numero_logico","$numero_logico");
            $cmd->execute();
            return true;
        }
    }

    public function excluirForm($id_circuito)
    {
    $cmd = $this->pdo->prepare("DELETE FROM inventario_oi WHERE id_circuito = :id");
    $cmd->bindValue(":id",$id_circuito);
    $cmd->execute();

    }

    public function buscarDadosCircuito($id_circuito)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM inventario_oi WHERE id_circuito = :id");
        $cmd->bindValue(":id",$id_circuito);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function atualizarDados()
    {

    }
}
?>

