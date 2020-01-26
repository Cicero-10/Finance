<?php
session_start();

abstract class Conexao {

    public function __construct() {
        
    }

    public static function getInstance() {
        try {
            $pdo = new PDO
("mysql:host=mysql669.umbler.com;dbname=financas", "erivan", "dhiullya26");
            $pdo->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } 
        
        catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}





