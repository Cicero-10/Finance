<?php 
	
	require_once 'Conexao.php';


	class UsuarioDAO{
		//Salvar um novo usuario
		public function salvar(Usuario $usuario){
			try {
				$pdo = Conexao::getInstance();
				$sql = "INSERT INTO usuario(nome_usu,sobrenome_usu,email_usu,senha_usu,image_usu)
						VALUES(?,?,?,?,?)";

				$stmt = $pdo->prepare($sql);
				
            	$stmt->bindValue(1, $usuario->getNome());
            	$stmt->bindValue(2, $usuario->getSobrenome());
            	$stmt->bindValue(3, $usuario->getEmail());
            	$stmt->bindValue(4, $usuario->getSenha());
            	$stmt->bindValue(5, $usuario->getFoto());
            	
            	if($stmt->execute()){
            		$id = $pdo->lastInsertId();
            		$_SESSION["id"] = $id;
            		return true;
            	}
            	else{
            		return false;
            	}

			} catch (PDOException $exc) {
            	echo $exc->getMessage();
			}
		}

		//Alterar dados do funcionario
		public function alterarEmail(Usuario $usuario){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "UPDATE usuario SET
	                email_usu = ?
	                WHERE idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->bindValue(1, $usuario->getEmail());
	            return $stmt->execute();
	            
	        } catch (PDOException $exc) {
	            echo $exc->getMessage();
	        }
    	}
    	//Alterar dados do funcionario
		public function alterarSenha(Usuario $usuario){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "UPDATE usuario SET
	                senha_usu = ?
	                WHERE idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->bindValue(1, $usuario->getSenha());
	            return $stmt->execute();
	            
	        } catch (PDOException $exc) {
	            echo $exc->getMessage();
	        }
    	}

    	//Excluir usuario
    	public function delete($idusuario){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "DELETE FROM usuario WHERE idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->bindValue(1, $idusuario);
	            $stmt->execute();
	        } catch(PDOException $exc){
	            echo $exc->getMessage();
	        }
	    }//Excluir usuario

    	public function buscaUsuario(){
    		$email = $_SESSION["email"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT email_usu FROM usuario";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            return $stmt;
	        } catch(PDOException $exc){
	            echo $exc->getMessage();
	        }
	    }
    
	}
 ?>