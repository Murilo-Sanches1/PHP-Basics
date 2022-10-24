<?php

	class User {

		private $email;
		private $name;

		public function __construct($name, $email){

			$this->name = $name;
			$this->email = $email;
		}

		public function login(){
			echo $this->name . ' entrou';
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			if(is_string($name) && strlen($name) > 1){
				$this->name = $name;
				return "nome atualizado para $name";
			} else {
				return 'nome inválido';
			}
		}

	}

	$userTwo = new User('murilo', 'murilo@gmail.com');

	// $userTwo->name = 'mario';
	// echo $userTwo->name;

	// echo $userTwo->getName();
	// echo $userTwo->setName('shaun');
	// echo $userTwo->getName();

?>