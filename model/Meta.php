<?php 
	class Meta{
		private $idmeta;
		private $categoria;
		private $nome;
		private $descricao;
		private $valor_inicial;
		private $valor_objetivo;
		private $cor;
		private $icone;

		//metodos acessores
		public function getIdmeta(){
			return $this->idmeta;
		}

		public function setIdmeta($idmeta){
			$this->idmeta = $idmeta;
		}

		public function getCategoria(){
			return $this->categoria;
		}

		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getValor_inicial(){
			return $this->valor_inicial;
		}

		public function setValor_inicial($valor_inicial){
			$this->valor_inicial = $valor_inicial;
		}

		public function getValor_objetivo(){
			return $this->valor_objetivo;
		}

		public function setValor_objetivo($valor_objetivo){
			$this->valor_objetivo = $valor_objetivo;
		}

		public function getCor(){
			return $this->cor;
		}

		public function setCor($cor){
			$this->cor = $cor;
		}

		public function getIcone(){
			return $this->icone;
		}

		public function setIcone($icone){
			$this->icone = $icone;
		}
	}
 ?>