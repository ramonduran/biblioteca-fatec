<?php

class App {
	private $controller;
	private $metodo;

	/**
	 * Recebe via GET os paramentros $controller e $metodo.
	 */
	public function __construct( $controller, $metodo ) {
		$this->controller = $controller;
		$this->metodo     = $metodo;
	}

	/**
	 * Responsável por inicial a aplicação MVC.
	 */
	public function startApp() {
		// Tratamento do parametro $controller de "usuario" para "UsuarioController".
		$controller_name = ucfirst( $this->controller ) . 'Controller';
		// Carrega a classe "UsuarioController".
		require_once 'controller/' . $controller_name . '.php';
		// Instancia um novo objeto "UsuarioController".
		$hc = new $controller_name();
		// Chama o metodo através do objeto criado. Exemplo: $hc->metodo().
		$metodo = $this->metodo;
		$hc->$metodo();
	}
}
