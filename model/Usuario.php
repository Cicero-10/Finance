<?php 
	
	class Usuario{
		private $idusuario;
		private $nome;
		private $sobrenome;
		private $email;
		private $senha;
		private $foto;
	

		//métodos acessores
		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getSobrenome(){
			return $this->sobrenome;
		}

		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getFoto(){
			return $this->foto;
		}

		public function setFoto($foto){
			$this->foto = $foto;
		}
	}
 ?>