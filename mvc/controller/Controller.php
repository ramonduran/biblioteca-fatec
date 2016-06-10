<?php

abstract class Controller {
	protected $carregar;

	/*
     * Instancia um objeto "carregar" para ser usado nos controllers extendidos.
     */
	public function __construct() {
		$this->carregar = new Carregar();
	}

	/*
     * Verifica se usuário esta autorizado, se não tiver redireciona para página de login.
     */
	public function areaRestrita() {
		// Se não existir o $_SESSION['_ID'] significa que o usuário não esta logado.
		if ( ! isset( $_SESSION['_ID'] ) ) {
			 header( 'Location: /usuario/login/' );
		}
	}

	/*
     * Metodo magico __call que é chamado para metodo que não existe na classe.
     */
	public function __call( $metodo, $arg ) {
		echo 'ERRO: __call(): Não foi possível encontrar o metodo: ' . $metodo;
	}
}