<?php

 class Cad_form{

    private $pdo;
    public $msgErro = "";

    public function conectardb($db_name, $host, $usuario, $pass)
    {

        global $pdo;
        try {
        
            $pdo = new PDO("msql:dbname=".$db_name.";host=".$host,$usuario,$pass);

        } catch (PDOException $e) {
   
            $msgErro = $e->getMessage();          
        }
        


    }
 

    public function cadastrarForm($circuito,$motivo_isentos,$numero_logico,$acesso_associado)
    {
        global $pdo;
        //verificar se já circuito cadastrado
        $sql =$pdo->prepare("SELECT id_circuito from inventario_oi  WHERE circuito = :c");
        $sql->bindValue(":c",$circuito);
        $sql->execute();
    
        if($sql->rowCount() > 0)
        {
            return false;
        }

        else {

            //caso nao, Cadastrar     
            $sql= $pdo->prepare("INSERT INTO inventario_oi (circuito, motivo_isentos, numero_logico, acesso_associado) VALUES(:c, :m, :n, :a)");

            $sql->bindValue(":c",$circuito);
            $sql->bindValue(":m",$motivo_isentos);
            $sql->bindValue(":n",$numero_logico);
            $sql->bindValue(":a",$acesso_associado);
            $sql->execute();

            return true;
        }

        

    }



    public function consultar($consultar)
    {

         global $pdo;
         $sql= $pdo->prepare("SELECT circuito, velocidade,valor_contrato FROM inventario_oi  WHERE id_circuito = 1 VALUES($circuito, $motivo_isentos, $numero_logico,$acesso_associado)");
         $sql->bindValue(":c",$circuito);
         $sql->bindValue(":v",$velocidade);
         $sql->bindValue(":valor_contrato",$valor_contrato);
         $sql->execute();
         
         if($sql->rowCount() > 0)
         
         {
            //RECEBER DADOS DO ID pelo ARRAY
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_circuito'] = $dado['id_circuito'];
            
            return true;             
         }
         else
         {
            return false;
         }
     }
}

 ?>

