<?php 
    require_once '../conexao/Conexao.php';
	session_destroy();

 	header('location: ../index.php');
 ?>
