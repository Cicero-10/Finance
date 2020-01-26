<?php
require_once 'Conexao.php';

class AuthDAO{
    public function login($email, $senha){
      try {
            
            $pdo = Conexao::getInstance(); 
            $sql = "SELECT idusuario, nome_usu, sobrenome_usu, image_usu FROM usuario WHERE email_usu = ? AND senha_usu = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }  
    
}
}
