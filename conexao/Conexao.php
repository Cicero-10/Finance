<?php
session_start();

abstract class Conexao {

    public function __construct() {
        
    }

    public static function getInstance() {
        try {
            $pdo = new PDO
("mysql:host=localhost;dbname=financas", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } 
        
        catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}





