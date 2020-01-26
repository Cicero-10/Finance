<?php 
	
	require_once 'Conexao.php';
	
	class FinancaDAO{
		//metodo para salvar as despesas
		public function salvarReceita(Financa $financa){
			$id = $_SESSION["Userid"];
			try {
				$pdo = Conexao::getInstance();
				$sql = "INSERT INTO receita(valor_rec, tipo_rec, nome_rec, doc_rec, status_rec, data_rec,
											usuario_idusuario)		
						VALUES(?,?,?,?,?,?,$id)";

				$stmt = $pdo->prepare($sql);
				
            	$stmt->bindValue(1, $financa->getValor_rec());
            	$stmt->bindValue(2, $financa->getTipo_rec());
            	$stmt->bindValue(3, $financa->getNome_rec());
            	$stmt->bindValue(4, $financa->getDoc_rec());
            	$stmt->bindValue(5, $financa->getStatus_rec());
            	$stmt->bindValue(6, $financa->getData_rec());
            	return $stmt->execute();

			} catch (PDOException $exc) {
            	echo $exc->getMessage();
			}
		}
		//metodo para salvar as despesas
		public function salvarDespesa(Financa $financa){
			$id = $_SESSION["Userid"];
			try {
				$pdo = Conexao::getInstance();
				$sql = " INSERT INTO despesa(valor_desp, tipo_desp, categoria_desp, nome_desp, doc_desp, qtd_parcelas_desp, qtd_parcelas_pg_desp, qtd_parcelas_rest_desp, status_desp, data_vencimento_desp,
											usuario_idusuario)		
						VALUES(?,?,?,?,?,?,?,?,?,?,$id)
						";

				$stmt = $pdo->prepare($sql);
	 
            	$stmt->bindValue(1, $financa->getValor_desp());
            	$stmt->bindValue(2, $financa->getTipo_desp());
            	$stmt->bindValue(3, $financa->getCategoria_desp());
            	$stmt->bindValue(4, $financa->getNome_desp());
            	$stmt->bindValue(5, $financa->getDoc_desp());
            	$stmt->bindValue(6, $financa->getQtd_parcela_desp());
            	$stmt->bindValue(7, $financa->getQtd_parcela_pg_desp());
            	$stmt->bindValue(8, $financa->getQtd_parcela_rest_desp());
            	$stmt->bindValue(9, $financa->getStatus_desp());
            	$stmt->bindValue(10, $financa->getVencimento_desp());
            	return $stmt->execute();

			} catch (PDOException $exc) {
            	echo $exc->getMessage();
			}
		}
		//metodo para listar todos dados de saldos e despesas do usuário por id
		public function getReceitaUserID(){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT sum(valor_rec) FROM receita WHERE usuario_idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            
	            $usuario_fin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	            return $usuario_fin;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }
	    //metodo para listar todos dados de saldos e despesas do usuário por id
		public function getDespesaUserID(){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT sum(valor_desp) FROM despesa WHERE usuario_idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            
	            $usuario_fin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	            return $usuario_fin;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }

	    //metodo para listar todos dados de saldos e despesas do usuário por id
		public function getDespesa(){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT * FROM despesa WHERE usuario_idusuario = $id";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            return $stmt;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }
	    //metodo para listar todos dados de saldos e despesas do usuário por id
		public function getReceita(){
			$id = $_SESSION["Userid"];
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT sum(valor_rec), tipo_rec, nome_rec, doc_rec, status_rec, data_rec  FROM receita WHERE usuario_idusuario = $id";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            
	            $usuario_fin = $stmt->fetchAll(PDO::FETCH_ASSOC);
	            return $usuario_fin;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }
	     //metodo para listar todos dados de saldos e despesas do usuário por id
		public function getReceitaMes(){
			$id = $_SESSION["Userid"];
			$mes =  date("m");
	        try{
	            $pdo = Conexao::getInstance();
	            // $sql = "SELECT sum(valor_rec) FROM receita 
	            // 		WHERE MONTH(data_rec) = $mes AND usuario_idusuario = $id"; 
	            $sql = "SELECT * FROM receita WHERE  usuario_idusuario = $id ";
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            
	            return $stmt;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }
	      //metodo para listar todos dados de saldos e despesas do usuário por id
		public function getDespesaMes(){
			$id = $_SESSION["Userid"];
			$mes =  date("m");
	        try{
	            $pdo = Conexao::getInstance();
	            $sql = "SELECT valor_desp, categoria_desp, nome_desp FROM despesa 
	                    WHERE MONTH(data_vencimento_desp) = $mes AND usuario_idusuario = $id"; 
	            $stmt = $pdo->prepare($sql);
	            $stmt->execute();
	            return $stmt;     
	    	}catch (PDOException $exc){
	        	echo $exc->getMessage();
	        }
	    }

	}
 ?>