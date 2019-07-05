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
	if(isset($_POST['circuito'])) //clicou no botão cadastrar ou no editar
	{
		///// EDITAR /////////////
		if(isset($_GET['id_up']) && !empty($_GET['id_up']))
		{
			$id_upd = addslashes($_GET['id_up']);
			$circuito = addslashes($_POST['circuito']);
			$velocidade = addslashes($_POST['velocidade']);
			$valor_contrato = addslashes($_POST['valor_contrato']);
			$numero_logico = addslashes($_POST['numero_logico']);
			if(!empty($circuito) && !empty($velocidade) && !empty($valor_contrato) && !empty($numero_logico))
			   {
				//Editar ou ATUALIZAR
				$cad->atualizarDados($id_upd,$circuito,$velocidade,$valor_contrato,$numero_logico);
				header("location: cad_form.php");

				}
				else
				{
					?>
		 
			  		<div class="aviso">
			  			<img src= "../images/aviso.png">
			  			<h4>Preencha todos os campos !</h4>
			  		</div>
			  	
			  		<?php 			
				}
		}		

		///// CADASTRAR/////////////
		else
		{
			$circuito = addslashes($_POST['circuito']);
			$velocidade = addslashes($_POST['velocidade']);
			$valor_contrato = addslashes($_POST['valor_contrato']);
			$numero_logico = addslashes($_POST['numero_logico']);
			if(!empty($circuito) && !empty($velocidade) && !empty($valor_contrato) && !empty($numero_logico))
			   {
				//cadastrar
				if(!$cad->cadastrarForm($circuito,$velocidade,$valor_contrato,$numero_logico))
				{

					?>
		 
			  		<div class="aviso">
			  			<img src= "../images/aviso.png">
			  			<h4>Circuito Já esta cadastrado !</h4>
			  		</div>
			  	
			  		<?php 		
				}

				}
				else
				
				{	
					?>
		 
			  		<div class="aviso">
			  			<img src= "../images/aviso.png">
			  			<h4>Preencha todos os campos !</h4>
			  		</div>
			  	
			  		<?php 			
				
				}
			} 

		 }
?>
	

<?php 
if(isset($_GET['id_up'])) //SE A PESSOA CLICOU EM EDITAR
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

			<label for = "chave_dd">Chave DDD</label>
			<input type="text" name="chave_dd" id="chave_dd" value="<?php if(isset($res)){echo $res['chave_dd'];} ?>"> 
			
			<label for = "chave_caixa">Chave Caixa</label>
			<input type="text" name="chave_caixa" id="chave_caixa" value="<?php if(isset($res)){echo $res['chave_caixa'];} ?>"> 

			<label for = "contrato_caixa"> Contrato Caixa</label>
			<input type="text" name="" id="contrato_caixa" value="<?php if(isset($res)){echo $res['contrato_caixa'];} ?>"> 

			<label for = "contrato_oi"> Contrato Oi </label>
			<input type="text" name="contrato_oi" id="contrato_oi" value="<?php if(isset($res)){echo $res['contrato_oi'];} ?>"> 

			<label for = "valor_contrato"> Valor Contrato </label>
			<input type="text" name="valor_contrato" id="valor_contrato" value="<?php if(isset($res)){echo $res['valor_contrato'];} ?>"> 
			
			<label for = "observacao"> Observação </label>
			<input type="text" name="observacao" id="observacao" value="<?php if(isset($res)){echo $res['observacao'];} ?>"> 
			
			<label for = "motivos_isentos"> Motivo Isentos</label>
			<input type="text" name="motivos_isentos" id="motivos_isentos" value="<?php if(isset($res)){echo $res['motivos_isentos'];} ?>"> 
			
			<label for = "acesso_associado"> Acesso Associado </label>
			<input type="text" name="acesso_associado" id="acesso_associado" value="<?php if(isset($res)){echo $res['acesso_associado'];} ?>"> 

			<label for = "oficio_solicitacao"> Ofício de Solicitação </label>
			<input type="text" name="oficio_solicitacao" id="oficio_solicitacao" value="<?php if(isset($res)){echo $res['oficio_solicitacao'];} ?>"> 

			<label for = "data_homologacao"> Data de Homologação</label>
			<input type="text" name="data_homologacao" id="data_homologacao" value="<?php if(isset($res)){echo $res['data_homologacao'];} ?>"> 

			<label for = "circuito_base_cliente"> Circuito base Cliente </label>
			<input type="text" name="circuito_base_cliente" id="circuito_base_cliente" value="<?php if(isset($res)){echo $res['circuito_base_cliente'];} ?>"> 

			<label for = "numero_atividade"> Número Atividade</label>
			<input type="text" name="numero_atividade" id="numero_atividade" value="<?php if(isset($res)){echo $res['numero_atividade'];} ?>"> 

			<label for = "uf"> Uf </label>
			<input type="text" name="uf" id="uf" value="<?php if(isset($res)){echo $res['uf'];} ?>"> 

			<label for = "ciclo"> Ciclo</label>
			<input type="text" name="ciclo" id="ciclo" value="<?php if(isset($res)){echo $res['ciclo'];} ?>"> 

			<label for = "local_lit_local">Local Lit / LOCAL</label>
			<input type="text" name="" id="local_lit_local" value="<?php if(isset($res)){echo $res['local_lit_local'];} ?>"> 

			<label for = "dia_vencim"> Dia Vencimento</label>
			<input type="text" name="dia_vencim" id="dia_vencim" value="<?php if(isset($res)){echo $res['dia_vencim'];} ?>"> 

			<label for = "dt_instalacao">DT INSTALAÇÃO</label>
			<input type="text" name="dt_instalacao" id="dt_instalacao" value="<?php if(isset($res)){echo $res['dt_instalacao'];} ?>"> 

			<label for = "chavecpct"> ChaveCPCT </label>
			<input type="text" name="chavecpct	" id="chavecpct" value="<?php if(isset($res)){echo $res['chavecpct'];} ?>"> 

			<label for = "ddd_codigo_regiao">DDD / CODIGO REGIAO</label>
			<input type="text" name="ddd_codigo_regiao" id="ddd_codigo_regiao" value="<?php if(isset($res)){echo $res['ddd_codigo_regiao'];} ?>"> 

			<label for = "ccus"> CCUS </label>
			<input type="text" name="ccus" id="ccus" value="<?php if(isset($res)){echo $res['ccus'];} ?>"> 

			<label for = "produtos_dados_tipo_circuito"> Produto DADOS / TIPO CIRCUITO </label>
			<input type="text" name="produtos_dados_tipo_circuito" id="produtos_dados_tipo_circuito" value="<?php if(isset($res)){echo $res['produtos_dados_tipo_circuito'];} ?>"> 

			<label for = "designacao_dados"> Designação de  Dados </label>
			<input type="text" name="designacao_dados" id="designacao_dados" value="<?php if(isset($res)){echo $res['designacao_dados'];} ?>"> 

			<label for = "degrau_tarif_degrau">Degrau tarif / DEGRAU </label>
			<input type="text" name="degrau_tarif_degrau" id="degrau_tarif_degrau" value="<?php if(isset($res)){echo $res['degrau_tarif_degrau'];} ?>"> 

			<label for = "cnpj_titular"> CNPJ / CNPJ TITULAR </label>
			<input type="text" name="cnpj_titular" id="cnpj_titular" value="<?php if(isset($res)){echo $res['cnpj_titular'];} ?>"> 

			<label for = "tp_ccus"> Tp CCUS </label>
			<input type="text" name="tp_ccus" id="tp_ccus" value="<?php if(isset($res)){echo $res['tp_ccus'];} ?>"> 

			<label for = "data_retirada">Data de Retirada </label>
			<input type="text" name="data_retirada" id="data_retirada" value="<?php if(isset($res)){echo $res['data_retirada'];} ?>"> 

			<label for = "cnpj_usuario">CNPJ USUARIO</label>
			<input type="text" name="cnpj_usuario" id="cnpj_usuario" value="<?php if(isset($res)){echo $res['cnpj_usuario'];} ?>"> 

			<label for = "local_num"> Local Num </label>
			<input type="text" name="local_num" id="local_num" value="<?php if(isset($res)){echo $res['local_num'];} ?>"> 

			<label for = "categoria"> CATEGORIA </label>
			<input type="text" name="categoria" id="categoria" value="<?php if(isset($res)){echo $res['categoria'];} ?>"> 

			<label for = "cj_nao_tem_rii"> CJ não tem na RII </label>
			<input type="text" name="cj_nao_tem_rii" id="cj_nao_tem_rii" value="<?php if(isset($res)){echo $res['cj_nao_tem_rii'];} ?>"> 

			<label for = "situacao"> SITUAÇÃO </label>
			<input type="text" name="situacao" id="situacao" value="<?php if(isset($res)){echo $res['situacao'];} ?>"> 

			<label for = "r_social_titular"> R Social Titular / TITULAR </label>
			<input type="text" name="r_social_titular" id="r_social_titular" value="<?php if(isset($res)){echo $res['r_social_titular'];} ?>"> 

			<label for = "contrato"> CONTRATO </label>
			<input type="text" name="contrato" id="contrato" value="<?php if(isset($res)){echo $res['contrato'];} ?>"> 

			<label for = "su_nao_tem_RII">SU - não tem na RII  </label>
			<input type="text" name="su_nao_tem_RII" id="su_nao_tem_RII" value="<?php if(isset($res)){echo $res['su_nao_tem_RIIAGRUPADOR'];} ?>"> 

			<label for = "agrupador"> AGRUPADOR </label>
			<input type="text" name="agrupador" id="agrupador" value="<?php if(isset($res)){echo $res['agrupador'];} ?>"> 

			<label for = "ativo_inativo"> Ativo Inativo </label>
			<input type="text" name="ativo_inativo" id="ativo_inativo" value="<?php if(isset($res)){echo $res['ativo_inativo'];} ?>"> 


			<label for = "servicos"> SERVIÇOS </label>
			<input type="text" name="servicos" id="servicos" value="<?php if(isset($res)){echo $res['servicos'];} ?>"> 


			<label for = "descricao_produto_sisraf"> Descrição Produto Sisraf </label>
			<input type="text" name="descricao_produto_sisraf" id="descricao_produto_sisraf" value="<?php if(isset($res)){echo $res['descricao_produto_sisraf'];} ?>"> 

			<label for = ""> CICLO </label>
			<input type="text" name="ciclo_1" id="ciclo_1" value="<?php if(isset($res)){echo $res['ciclo_1'];} ?>"> 

			<label for = "AE"> AE </label>
			<input type="text" name="ae" id="ae" value="<?php if(isset($res)){echo $res['ae'];} ?>"> 

			<label for = "terminal_anterior_ficticio"> TERMINAL ANTERIOR / FICTICIO  </label>
			<input type="text" name="terminal_anterior_ficticio" id="terminal_anterior_ficticio" value="<?php if(isset($res)){echo $res['terminal_anterior_ficticio'];} ?>"> 

			<label for = "ponta_a"> PONTA A </label>
			<input type="text" name="ponta_a" id="ponta_a" value="<?php if(isset($res)){echo $res['ponta_a'];} ?>"> 

			<label for = "ponta_b"> PONTA B </label>
			<input type="text" name="ponta_b" id="ponta_b" value="<?php if(isset($res)){echo $res['ponta_b'];} ?>"> 

			<input type ="submit"  value="<?php if(isset($res)){echo "ATUALIZAR";}else{echo "CADASTRAR";} ?>">
	</form>
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
		?>
		</table>
		 
	  	<div class="aviso">
	  		<h4>Ainda não há circuito cadastrado !</h4>
	  	</div>
	  	
	  	<?php 

	  }
	
		?>
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