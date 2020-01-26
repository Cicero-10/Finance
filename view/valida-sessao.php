<?php
require_once '../conexao/Conexao.php';
// session_cache_expire(1);

if(!isset($_SESSION["usuario"])){
	header('location: login.php');    
}