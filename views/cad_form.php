<?php 

require_once'../connect/connect_form.php';
$cad = new Cad_form("base_oi","localhost","root","");

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CADASTRAR</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php 
	if(isset($_POST['circuito']))
	{
		$circuito = addslashes($_POST['circuito']);
		$velocidade = addslashes($_POST['velocidade']);
		$valor_contrato = addslashes($_POST['valor_contrato']);
		$numero_logico = addslashes($_POST['numero_logico']);
		if(!empty($circuito) && !empty($velocidade) && !empty($valor_contrato) && !empty($numero_logico))
			//cadastrar
			if(!$cad->cadastrarForm($circuito,$velocidade,$valor_contrato,$numero_logico))
			{
	
				echo "Circuito Já esta cadastrado !";
			}

			}
			else
			{
				echo "Preencha todos os campos !";
		
	}
 	
?>
	

<?php 
if(isset($_GET['id_up']))
	{
		$id_update = addslashes ($_GET['id_up']);
		$res = $cad->buscarDadosCircuito($id_update);

	}

?>

	<section id=esquerda>
		<form method="POST">
			<h2>CADASTRAR CIRCUITO</h2>
			<label for="circuito">Circuito</label>
			<input type="text" name="circuito" id="circuito" value=
				"<?php if(isset($res)){echo $res['circuito'];} ?>">
			
			<label for="velocidade">Velocidade</label>
			<input type="text" name="velocidade" id="velocidade" value="<?php if(isset($res)){echo $res['velocidade'];} ?>">
			
			<label for="valor_contrato">Valor de Contrato</label>
			<input type="text" name="valor_contrato" id="valor_contrato" value="<?php if(isset($res)){echo $res['valor_contrato'];} ?>">
			
			<label for = "numero_logico">Numero Lógico</label>
			<input type="text" name="numero_logico" id="numero_logico" value="<?php if(isset($res)){echo $res['numero_logico'];} ?>">

			<input type ="submit"  value="<?php if(isset($res)){echo "ATUALIZAR";}else{echo "CADASTRAR";} ?>">
	</section>
	
	<section id=direita>
		<table>
			<tr id="titulo">
				<td>CIRCUITO</td>
				<td>VELOCIDADE</td>
				<td>VALOR DO CONTRATO</td>
				<td colspan="2">NÚMERO LOGICO</td>
			</tr>
		<?php 

			$dados = $cad->getDados();
		 	if(count($dados) >0) // se tem circuito cad no banco
		 	{
		 		for ($i=0; $i < count($dados); $i++)
		 		{ 
		 			echo "<tr>";
		 			foreach ($dados[$i] as $k => $v) 
		 			{
		 				if($k != "id_circuito")
		 				{
		 					echo "<td>".$v."</td>";
		 				}
		 			} 
		 			?>
		<td>
 			<a href="cad_form.php?id_up=<?php echo $dados[$i]['id_circuito'];?>">Editar</a
 			><a href="cad_form.php?id_circuito=<?php echo $dados[$i]['id_circuito'];?>">Excluir </a>
		</td>
		 		<?php 
		 			echo "</tr>";
		 		}		 		
		 		 
		  }
		  else //o banco esta vazio
		  {
		  	echo "Ainda não há circuito cadastrado";
		  }
		?>
		
		</table>
		
	</section>
</body>
</html>
<?php 
	
	if(isset($_GET['id_circuito']))
	{
		$id_cad_circuito = addslashes($_GET['id_circuito']);
		$cad->excluirForm($id_cad_circuito);
		header("location: ../views/cad_form.php");
	}

 ?>