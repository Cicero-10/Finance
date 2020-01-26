<?php

require_once '../conexao/AuthDAO.php';

$email = addslashes($_POST['email']);
$senha =addslashes( md5($_POST['senha']));
$loginDAO = new AuthDAO();
$usuario = $loginDAO->login($email, $senha);

if (!empty($usuario)) {
    $_SESSION["usuario"] = $email;
    $_SESSION["nome_usu"] = $usuario["nome_usu"];
    $_SESSION["sobrenome_usu"] = $usuario["sobrenome_usu"];
    $_SESSION["Userid"] = $usuario["idusuario"];
    $_SESSION["picture"] = $usuario["image_usu"];
    header('location: ../view/index.php');
} else {
    header('location: ../view/login.php');
}