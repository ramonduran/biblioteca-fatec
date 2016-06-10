<?php

// Inicia a sessão para poder manipular dados via sessão (login).
session_start();

// Configura constante do sistema MVC.
define( 'BANCO_HOST' , '127.0.0.1');
define( 'BANCO_USUARIO' , 'ramonduran');
define( 'BANCO_SENHA' , '');
define( 'BANCO_NOME' , 'bancobiblioteca');

// Carrega arquivos do sistema MVC.
require_once 'class-app.php';
require_once 'class-carregar.php';
require_once 'model/Model.php';
require_once 'controller/Controller.php';

// Instancia novo objeto, passa os GETs para construtor.
$controller = $_GET['controller'];
$metodo     = $_GET['metodo'];
$app        = new App( $controller, $metodo );

// Chama o metodo startApp().
$app->startApp();
