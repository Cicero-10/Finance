<?php 
	require_once '../model/Financas.php';
	require_once '../conexao/FinancaDAO.php';
	
	
	//Adicionar depesas
	//Recuperar dados do formulário
	$valor = addslashes($_POST['valor']);
	$data_desp = addslashes($_POST['data_desp']);
	$desc = addslashes($_POST['desc']);
	// $pgto = addslashes($_POST['pgto']);
	$categoria = addslashes($_POST['categoria']);
	// $anexo = addslashes($_POST['anexo']);

	$financa = new Financa();

	$financa->setDespesa($valor);
	$financa->setData_despesa($data_desp);
	$financa->setDescricao($desc);
	// $financa->setNome($pgto);
	$financa->setTipo($categoria);
	// $financa->setNome($anexo);

	$financaDAO = new FinancaDAO();

	$verificar = $financaDAO->salvarDespesa($financa);

	if($verificar){
		header('location: ../view/index.php');
	}
 ?>