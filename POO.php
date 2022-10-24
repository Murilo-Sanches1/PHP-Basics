<?php 

    /*
        Classes são blueprints de objetos, possibilita criarmos estruturas personalizadas
        com atributos e métodos próprios.
        Classe usuario pode ter atributos de email, senha e metodos de logar e trocar senha.
        Quando criamos um objeto a partir de uma classe basicamente instanciamos ela
    */ 

	class User {

		public $email;
		public $name;

		public function __construct($name, $email){
			$this->name = $name;
			$this->email = $email;
		}

		public function login(){
			echo $this->name . ' entrou';
		}

	}

	// $userOne = new User();
	
	// $userOne->login();
	// echo $userOne->name;

	$userTwo = new User('murilo', 'murilo@gmail.com');

	// echo $userTwo->email;
	$userTwo->login();

?>
