<?php
/////CONEXÃO COM O BANCO DE DADOS////
try {

$pdo = new PDO("mysql:dbname=base_oi;host=localhost", "root","");
   
}

catch (PDOException $e) {
    echo "Erro com a conexão do banco de dados".$e->getMessage();
}

catch (Exception $e) 
{

    echo "Erro generico: ".$e->getMessage();;
}

////////////////////////////////// INSERIR DADOS //////////


/*$res = $pdo->prepare("INSERT INTO inventario_oi(circuito,velocidade,valor_contrato,numero_logico) 
    VALUES(:circuito,:velocidade,:valor_contrato,:numero_logico)");
$res->bindValue(":circuito","abc123456");
$res->bindValue(":velocidade","100GB");
$res->bindValue(":valor_contrato","15000");
$res->bindValue(":numero_logico","12345678910");
$res->execute(); */

///////////////////////////////// DELETE e UPDATE/////////
/*$delup =$pdo->prepare("DELETE FROM inventario_oi WHERE id_circuito =:id");
$id = 7;
$delup->bindValue(":id",$id);
$delup->execute();)

$up =$pdo->prepare("UPDATE inventario_oi SET velocidade = :velocidade WHERE id_circuito =:id");
$up->bindValue(":velocidade", "5000GB");
$up->bindValue(":id",3);
$up->execute();*/


///////////////////////////////SELECT/////////////////

$sel = $pdo->prepare("SELECT * FROM inventario_oi WHERE id_circuito = :id ");
$sel->bindValue(":id",3);
$sel->execute();
$resultado = $sel->fetch(PDO::FETCH_ASSOC);
//echo "<pre>";
//print_r($resultado);
//echo "<pre>";
foreach ($resultado as $key => $value) {
    echo $key.": ".$value."<br>";
}
 ?>
