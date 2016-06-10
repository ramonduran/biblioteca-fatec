<?php

class Carregar {

	/*
     * Inclui o arquivo view solicitado e recebe dados.
     */
	public function view( $view, $dados = null ) {
		require_once 'view/' . $view . '.php';
	}
	
	/*
     * Inclui o arquivo model solicitado.
     */
	public function model( $model ) {
		require_once 'model/' . $model . '.php';
	}
	
} // termina classe Carregar
