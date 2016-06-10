<?php

abstract class Model {
	protected $carregar;

	/*
     * Instancia um objeto "carregar" para ser usado nos models extendidos.
     */
	public function __construct() {
		$this->carregar = new Carregar();
	}
}
