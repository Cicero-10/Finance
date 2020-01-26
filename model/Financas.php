<?php 
	class Financa{


		// Atributos da tabela receita
		private $id_financas;

		// Atributos da tabela receita
		private $valor_rec;
		private $tipo_rec;
		private $nome_rec;
		private $doc_rec;
		private $status_rec;
		private $data_rec;
		
		// Atributos da tabela despesa
		private $categoria_desp;
		private $tipo_desp;
		private $valor_desp;
		private $nome_desp;
		private $doc_desp;
		private $qtd_parcela_desp;
		private $qtd_parcela_pg_desp;
		private $qtd_parcela_rest_desp;
		private $status_desp;
		private $vencimento_desp;
		private $pagamento_desp;

		public function getId_financas(){
			return $this->id_financas;
		}

		public function setId_financas($id_financas){
			$this->id_financas = $id_financas;
		}

		// Metodos acessores da tabela receita
		public function getValor_rec(){
			return $this->valor_rec;
		}

		public function setValor_rec($valor_rec){
			$this->valor_rec = $valor_rec;
		}

		public function getTipo_rec(){
			return $this->tipo_rec;
		}

		public function setTipo_rec($tipo_rec){
			$this->tipo_rec = $tipo_rec;
		}

		public function getNome_rec(){
			return $this->nome_rec;
		}

		public function setNome_rec($nome_rec){
			$this->nome_rec = $nome_rec;
		}

		public function getDoc_rec(){
			return $this->doc_rec;
		}

		public function setDoc_rec($doc_rec){
			$this->doc_rec = $doc_rec;
		}

		public function getStatus_rec(){
			return $this->status_rec;
		}

		public function setStatus_rec($status_rec){
			$this->status_rec = $status_rec;
		}

		public function getData_rec(){
			return $this->data_rec;
		}

		public function setData_rec($data_rec){
			$this->data_rec = $data_rec;
		}

		// Metodos acessores da tabela despesa
		public function getCategoria_desp(){
			return $this->categoria_desp;
		}

		public function setCategoria_desp($categoria_desp){
			$this->categoria_desp = $categoria_desp;
		}

		public function getTipo_desp(){
			return $this->tipo_desp;
		}

		public function setTipo_desp($tipo_desp){
			$this->tipo_desp = $tipo_desp;
		}

		public function getValor_desp(){
			return $this->valor_desp;
		}

		public function setValor_desp($valor_desp){
			$this->valor_desp = $valor_desp;
		}

		public function getNome_desp(){
			return $this->nome_desp;
		}

		public function setNome_desp($nome_desp){
			$this->nome_desp = $nome_desp;
		}

		public function getDoc_desp(){
			return $this->doc_desp;
		}

		public function setDoc_desp($doc_desp){
			$this->doc_desp = $doc_desp;
		}

		public function getQtd_parcela_desp(){
			return $this->qtd_parcela_desp;
		}

		public function setQtd_parcela_desp($qtd_parcela_desp){
			$this->qtd_parcela_desp = $qtd_parcela_desp;
		}

		public function getQtd_parcela_pg_desp(){
			return $this->qtd_parcela_pg_desp;
		}

		public function setQtd_parcela_pg_desp($qtd_parcela_pg_desp){
			$this->qtd_parcela_pg_desp = $qtd_parcela_pg_desp;
		}

		public function getQtd_parcela_rest_desp(){
			return $this->qtd_parcela_rest_desp;
		}

		public function setQtd_parcela_rest_desp($qtd_parcela_rest_desp){
			$this->qtd_parcela_rest_desp = $qtd_parcela_rest_desp;
		}

		public function getStatus_desp(){
			return $this->status_desp;
		}

		public function setStatus_desp($status_desp){
			$this->status_desp = $status_desp;
		}

		public function getVencimento_desp(){
			return $this->vencimento_desp;
		}

		public function setVencimento_desp($vencimento_desp){
			$this->vencimento_desp = $vencimento_desp;
		}

		public function getPagamento_desp(){
			return $this->pagamento_desp;
		}

		public function setPagamento_desp($pagamento_desp){
			$this->pagamento_desp = $pagamento_desp;
		}
	}
 ?>