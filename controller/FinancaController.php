<?php 
	require_once '../model/Financas.php';
	require_once '../conexao/FinancaDAO.php';

	define("PASTA_DOC_REC", "../vendor/receitas/");
    define("PASTA_DOC_DESP", "../vendor/despesas/");


	$financa = new Financa();
	$financaDAO = new FinancaDAO();

	if (isset($_POST['salvarRec'])) {
		//Recuperar dados do formulário
		$valor_rec = addslashes($_POST['valor_rec']);
		$data_rec = addslashes($_POST['data_rec']);
		$nome_rec = addslashes($_POST['nome_rec']);
	    $status_rec = addslashes($_POST['status_rec']);
		$tipo_rec = addslashes($_POST['tipo_rec']);
		$doc_rec      = $_FILES['doc_rec']['name'];
	    $temp      = $_FILES['doc_rec']['tmp_name'];
	    
	    move_uploaded_file($temp, PASTA_DOC_REC . $doc_rec);

	    $financa->setValor_rec($valor_rec);
		$financa->setTipo_rec($tipo_rec);
		$financa->setNome_rec($nome_rec);
		$financa->setDoc_rec($doc_rec);
		$financa->setStatus_rec($status_rec);
		$financa->setData_rec($data_rec);

		$verificar = $financaDAO->salvarReceita($financa);

		if($verificar){
			header('location: ../view/index.php');
		}

	}

	if (isset($_POST['salvarDesp'])) {

		if ($_POST['tipo_desp'] == "Despesa Fixa") {
			$tipo_desp = "Despesa Fixa";

	    }
	    else if($_POST['tipo_desp'] == "Despesa Financiada"){
			$tipo_desp = "Despesa Financiada";
	    }
	    else{
			$tipo_desp = "Despesa Extra";
	    }

	    
	    if (!empty($_POST['status_desp'])) {
			$status_desp = " Pago";
	    }
	    else{
			$status_desp = " Pendente";
	    }

		//Recuperar dados do formulário
		$valor_desp = addslashes($_POST['valor_desp']);
		$categoria_desp = addslashes($_POST['categoria_desp']);
		$nome_desp = addslashes($_POST['nome_desp']);
		$qtd_parc_desp = addslashes($_POST['qtd_parc_desp']);
		$qtd_parc_pg_desp = addslashes($_POST['qtd_parc_pg_desp']);
		$vencimento_desp = addslashes($_POST['vencimento_desp']);
		$doc_desp      = $_FILES['doc_desp']['name'];
	    $temp      = $_FILES['doc_desp']['tmp_name'];

	    move_uploaded_file($temp, PASTA_DOC_DESP . $doc_desp);

	  	$tot_rest_par = $qtd_parc_desp - $qtd_parc_pg_desp;


		$financa->setValor_desp($valor_desp);
		$financa->setTipo_desp($tipo_desp);
		$financa->setCategoria_desp($categoria_desp);
		$financa->setNome_desp($nome_desp);
		$financa->setDoc_desp($doc_desp);
		$financa->setQtd_parcela_desp($qtd_parc_desp);
		$financa->setQtd_parcela_pg_desp($qtd_parc_pg_desp);
		$financa->setQtd_parcela_rest_desp($tot_rest_par);
		$financa->setStatus_desp($status_desp);
		$financa->setVencimento_desp($vencimento_desp);

		$verificar = $financaDAO->salvarDespesa($financa);

		if($verificar){
			header('location: ../view/index.php');
		}
	}
	


 ?>