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
    public function cadastrarForm($circuito,$velocidade,$valor_contrato,$numero_logico,$chave_dd,$chave_caixa,$contrato_caixa,$contrato_oi,$observacao,$motivos_isentos,$acesso_associado,$oficio_solicitacao,$data_homologacao,$circuito_base_cliente,$numero_atividade,$cgc_filial,$gerenciado,$regiao,$site,$uf,$ciclo,$local_lit_local,$dia_vencimento,$dt_instalacao,$chavecpct,$ddd_codigo_regiao,$ccus,$produtos_dados_tipo_circuito,$designacao_dados,$degrau_tarif_degrau,$cnpj_titular,$tp_ccus,$data_retirada,$cnpj_usuario,$local_num,$categoria,$cj_nao_tem_rii,$situacao,$r_social_titular,$contrato,$su_nao_tem_RII, $agrupador,$ativo_inativo, $servicos, $descricao_produto_sisraf, $ae, $terminal_anterior_ficticio, $ponta_a,$ponta_b)
    
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
            $cmd =$this->pdo->prepare("INSERT INTO inventario_oi(circuito,velocidade,valor_contrato,numero_logico,chave_dd,chave_caixa,contrato_caixa,contrato_oi,observacao,motivos_isentos,acesso_associado,oficio_solicitacao,data_homologacao,circuito_base_cliente,$numero_atividade,cgc_filial,gerenciado,regiao,site,uf,ciclo,local_lit_local,dia_vencimento,dt_instalacao,chavecpct,ddd_codigo_regiao,ccus,produtos_dados_tipo_circuito,designacao_dados,degrau_tarif_degrau,cnpj_titular,tp_ccus,data_retirada,cnpj_usuario,local_num,categoria,cj_nao_tem_rii,situacao,r_social_titular,contrato,su_nao_tem_RII, agrupador,ativo_inativo, servicos, descricao_produto_sisraf, ae, terminal_anterior_ficticio, ponta_a,ponta_b) VALUES(:circuito, :velocidade, :valor_contrato, :numero_logico, :chave_dd, :chave_caixa, :contrato_caixa, :contrato_oi, :observacao, :motivos_isentos, :acesso_associado, :oficio_solicitacao, :data_homologacao,:circuito_base_cliente, :numero_atividade, :cgc_filial,: gerenciado, :regiao, :site, :uf, :ciclo, :local_lit_local, :dia_vencimento, :dt_instalacao,: chavecpct, :ddd_codigo_regiao, :ccus, :produtos_dados_tipo_circuito, :designacao_dados, :degrau_tarif_degrau, :cnpj_titular, :tp_ccus, :data_retirada, :cnpj_usuario, :local_num, :categoria, :cj_nao_tem_rii, :situacao, :r_social_titular, :contrato, :su_nao_tem_RII, :agrupador, :ativo_inativo, :servicos, :descricao_produto_sisraf, :ae, :terminal_anterior_ficticio, :ponta_a, :ponta_b)");
        $cmd->bindValue(":circuito",$circuito);
        $cmd->bindValue(":velocidade",$velocidade);
        $cmd->bindValue(":valor_contrato",$valor_contrato);
        $cmd->bindValue(":numero_logico",$numero_logico);
        $cmd->bindValue(":chave_dd",$chave_dd);
        $cmd->bindValue(":chave_caixa",$chave_caixa);
        $cmd->bindValue(":contrato_caixa",$contrato_caixa);
        $cmd->bindValue(":contrato_oi",$contrato_oi);
        $cmd->bindValue(":observacao",$observacao);
        $cmd->bindValue(":motivos_isentos",$motivos_isentos);
        $cmd->bindValue(":acesso_associado",$acesso_associado);
        $cmd->bindValue(":oficio_solicitacao",$oficio_solicitacao);
        $cmd->bindValue(":data_homologacao",$data_homologacao);
        $cmd->bindValue(":circuito_base_cliente",$circuito_base_cliente);
        $cmd->bindValue(":numero_atividade",$numero_atividade);
        $cmd->bindValue(":cgc_filial",$cgc_filial);
        $cmd->bindValue(":gerenciado",$gerenciado);
        $cmd->bindValue(":regiao",$regiao);
        $cmd->bindValue(":site",$site);
        $cmd->bindValue(":uf",$uf);
        $cmd->bindValue(":ciclo",$ciclo);
        $cmd->bindValue(":local_lit_local",$local_lit_local);
        $cmd->bindValue(":dia_vencimento",$dia_vencimento);
        $cmd->bindValue(":dt_instalacao",$dt_instalacao);
        $cmd->bindValue(":chavecpct",$chavecpct);
        $cmd->bindValue(":ddd_codigo_regiao",$ddd_codigo_regiao);
        $cmd->bindValue(":ccus",$ccus);    
        $cmd->bindValue(":produtos_dados_tipo_circuito",$produtos_dados_tipo_circuito);
        $cmd->bindValue(":designacao_dados",$designacao_dados);
        $cmd->bindValue(":degrau_tarif_degrau",$degrau_tarif_degrau);
        $cmd->bindValue(":cnpj_titular",$cnpj_titular);
        $cmd->bindValue(":tp_ccus",$tp_ccus);
        $cmd->bindValue(":data_retirada",$data_retirada);
        $cmd->bindValue(":cnpj_usuario",$cnpj_usuario);
        $cmd->bindValue(":local_num",$local_num);
        $cmd->bindValue(":categoria",$categoria);
        $cmd->bindValue(":cj_nao_tem_rii",$cj_nao_tem_rii);
        $cmd->bindValue(":situacao",$situacao);
        $cmd->bindValue(":r_social_titular",$r_social_titular);
        $cmd->bindValue(":contrato",$contrato);
        $cmd->bindValue(":su_nao_tem_RII",$su_nao_tem_RII);
        $cmd->bindValue(":agrupador",$agrupador);
        $cmd->bindValue(":ativo_inativo",$ativo_inativo);
        $cmd->bindValue(":servicos",$servicos);
        $cmd->bindValue(":descricao_produto_sisraf",$descricao_produto_sisraf);
        $cmd->bindValue(":ae",$ae);
        $cmd->bindValue(":terminal_anterior_ficticio",$terminal_anterior_ficticio);
        $cmd->bindValue(":ponta_a",$ponta_a);
        $cmd->bindValue(":ponta_b",$ponta_b);
        $cmd->bindValue(":id",$id_circuito);
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

    public function atualizarDados($id_circuito,$circuito,$velocidade,$valor_contrato,$numero_logico,$chave_dd,$chave_caixa,$contrato_caixa,$contrato_oi,$observacao,$motivos_isentos,$acesso_associado,$oficio_solicitacao,$data_homologacao,$circuito_base_cliente,$numero_atividade,$cgc_filial,$gerenciado,$regiao,$site,$uf,$ciclo,$local_lit_local,$dia_vencimento,$dt_instalacao,$chavecpct,$ddd_codigo_regiao,$ccus,$produtos_dados_tipo_circuito,$designacao_dados,$degrau_tarif_degrau,$cnpj_titular,$tp_ccus,$data_retirada,$cnpj_usuario,$local_num,$categoria,$cj_nao_tem_rii,$situacao,$r_social_titular,$contrato,$su_nao_tem_RII, $agrupador,$ativo_inativo, $servicos, $descricao_produto_sisraf, $ae, $terminal_anterior_ficticio, $ponta_a,$ponta_b)
     {

        $cmd = $this->pdo->prepare("UPDATE inventario_oi SET circuito = :circuito, velocidade = :velocidade, valor_contrato = :valor_contrato, numero_logico = :numero_logico,chave_dd = :chave_dd, chave_caixa = :chave_caixa, contrato_caixa = :contrato_caixa,contrato_oi = :contrato_oi, observacao = :observacao,motivos_isentos =  :motivos_isentos,acesso_associado =  :acesso_associado, oficio_solicitacao = :oficio_solicitacao, data_homologacao = :data_homologacao, circuito_base_cliente = :circuito_base_cliente, numero_atividade =  :numero_atividade,cgc_filial = :cgc_filial, gerenciado = :gerenciado, regiao = :regiao,site = :site, uf = :uf, ciclo = :ciclo, local_lit_local =  :local_lit_local,dia_vencimento = :dia_vencimento,dt_instalacao =  :dt_instalacao, chavecpct = :chavecpct, ddd_codigo_regiao = :ddd_codigo_regiao,ccus = :ccus, produtos_dados_tipo_circuito = :produtos_dados_tipo_circuito,designacao_dados =  :designacao_dados, degrau_tarif_degrau = :degrau_tarif_degrau, cnpj_titular = :cnpj_titular,tp_ccus = :tp_ccus, data_retirada = :data_retirada,cnpj_usuario =  :cnpj_usuario,local_num = :local_num,categoria = :categoria, cj_nao_tem_rii = :cj_nao_tem_rii,situacao = :situacao, r_social_titular = :r_social_titular, contrato = :contrato,su_nao_tem_RII = :su_nao_tem_RII, agrupador = :agrupador, ativo_inativo = :ativo_inativo, servicos =  :servicos, descricao_produto_sisraf =  :descricao_produto_sisraf,ae =  :ae, terminal_anterior_ficticio = :terminal_anterior_ficticio, ponta_a = :ponta_a, ponta_b = :ponta_b WHERE id_circuito =:id");
        $cmd->bindValue(":circuito",$circuito);
        $cmd->bindValue(":velocidade",$velocidade);
        $cmd->bindValue(":valor_contrato",$valor_contrato);
        $cmd->bindValue(":numero_logico",$numero_logico);
        $cmd->bindValue(":chave_dd",$chave_dd);
        $cmd->bindValue(":chave_caixa",$chave_caixa);
        $cmd->bindValue(":contrato_caixa",$contrato_caixa);
        $cmd->bindValue(":contrato_oi",$contrato_oi);
        $cmd->bindValue(":observacao",$observacao);
        $cmd->bindValue(":motivos_isentos",$motivos_isentos);
        $cmd->bindValue(":acesso_associado",$acesso_associado);
        $cmd->bindValue(":oficio_solicitacao",$oficio_solicitacao);
        $cmd->bindValue(":data_homologacao",$data_homologacao);
        $cmd->bindValue(":circuito_base_cliente",$circuito_base_cliente);
        $cmd->bindValue(":numero_atividade",$numero_atividade);
        $cmd->bindValue(":cgc_filial",$cgc_filial);
        $cmd->bindValue(":gerenciado",$gerenciado);
        $cmd->bindValue(":regiao",$regiao);
        $cmd->bindValue(":site",$site);
        $cmd->bindValue(":uf",$uf);
        $cmd->bindValue(":ciclo",$ciclo);
        $cmd->bindValue(":local_lit_local",$local_lit_local);
        $cmd->bindValue(":dia_vencimento",$dia_vencimento);
        $cmd->bindValue(":dt_instalacao",$dt_instalacao);
        $cmd->bindValue(":chavecpct",$chavecpct);
        $cmd->bindValue(":ddd_codigo_regiao",$ddd_codigo_regiao);
        $cmd->bindValue(":ccus",$ccus);    
        $cmd->bindValue(":produtos_dados_tipo_circuito",$produtos_dados_tipo_circuito);
        $cmd->bindValue(":designacao_dados",$designacao_dados);
        $cmd->bindValue(":degrau_tarif_degrau",$degrau_tarif_degrau);
        $cmd->bindValue(":cnpj_titular",$cnpj_titular);
        $cmd->bindValue(":tp_ccus",$tp_ccus);
        $cmd->bindValue(":data_retirada",$data_retirada);
        $cmd->bindValue(":cnpj_usuario",$cnpj_usuario);
        $cmd->bindValue(":local_num",$local_num);
        $cmd->bindValue(":categoria",$categoria);
        $cmd->bindValue(":cj_nao_tem_rii",$cj_nao_tem_rii);
        $cmd->bindValue(":situacao",$situacao);
        $cmd->bindValue(":r_social_titular",$r_social_titular);
        $cmd->bindValue(":contrato",$contrato);
        $cmd->bindValue(":su_nao_tem_RII",$su_nao_tem_RII);
        $cmd->bindValue(":agrupador",$agrupador);
        $cmd->bindValue(":ativo_inativo",$ativo_inativo);
        $cmd->bindValue(":servicos",$servicos);
        $cmd->bindValue(":descricao_produto_sisraf",$descricao_produto_sisraf);
        $cmd->bindValue(":ae",$ae);
        $cmd->bindValue(":terminal_anterior_ficticio",$terminal_anterior_ficticio);
        $cmd->bindValue(":ponta_a",$ponta_a);
        $cmd->bindValue(":ponta_b",$ponta_b);
        $cmd->bindValue(":id",$id_circuito);
        $cmd->execute();
  
     } 

 }

?>

