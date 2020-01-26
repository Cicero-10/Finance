<?php 
	
	require_once 'Conexao.php';


	class EtapasDAO{
		//metodo para salvar as receitas
		public function salvarReceita(Financa $financa){
			$id_usuario = $_SESSION["id"];
			try {
				$pdo = Conexao::getInstance();
				$sql = "INSERT INTO receita(valor_rec, tipo_rec, nome_rec, doc_rec, status_rec, data_rec,
											usuario_idusuario)		
						VALUES(?,?,?,?,?,?,$id_usuario)";

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
			$id_usuario = $_SESSION["id"];
			try {
				$pdo = Conexao::getInstance();
				$sql = " INSERT INTO despesa(valor_desp, tipo_desp, categoria_desp, nome_desp, doc_desp, qtd_parcelas_desp, qtd_parcelas_pg_desp, qtd_parcelas_rest_desp, status_desp, data_vencimento_desp,
											usuario_idusuario)		
						VALUES(?,?,?,?,?,?,?,?,?,?,$id_usuario)
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
	}
 ?>