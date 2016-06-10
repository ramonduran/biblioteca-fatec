<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $dados['titulo']; ?> - Biblioteca Fatec</title>
		<link rel="stylesheet" href="/css/pure-min.css">
		<link rel="stylesheet" href="/css/estilos.css">
		<style>
			.pure-table {
				min-width: 100%;
			}
		</style>
	</head>
	<body>

<div id="layout">
	<!-- Menu toggle — -->
	<a href="#menu" id="menuLink" class="menu-link">
		<span></span>
	</a>

	<div id="menu">
		<div class="pure-menu">
			<a class="pure-menu-heading" href="#">Biblioteca <Br>Fatec</a>

			<?php 
			// Se não o _ID na sessão não estiver definida, então não esta logado.
			if ( ! isset( $_SESSION['_ID'] ) ) : ?>
			<ul class="pure-menu-list">
				<li class="pure-menu-item"><a href="/usuario/cadastrar" class="pure-menu-link">- Cadastrar Usuário</a></li>
				<li class="pure-menu-item"><a href="/usuario/login" class="pure-menu-link">- Login</a></li>
			</ul>
			<?php 
			// Se estiver logado, mostra o menu completo.
			else : ?>
			<ul class="pure-menu-list">
				<li class="pure-menu-item"><a href="#" class="pure-menu-link"><b>Livros</b></a></li>
				<li class="pure-menu-item"><a href="/livro/cadastrar" class="pure-menu-link">- Cadastrar Livro</a></li>
				<li class="pure-menu-item"><a href="/livro/listar" class="pure-menu-link">- Lista de Livros</a></li>

				<li class="pure-menu-item"><a href="#" class="pure-menu-link"><b>Usuários</b></a></li>
				<li class="pure-menu-item"><a href="/usuario/cadastrar" class="pure-menu-link">- Cadastrar Usuário</a></li>
				<li class="pure-menu-item"><a href="/usuario/listar" class="pure-menu-link">- Lista de Usuários</a></li>
				<li class="pure-menu-item"><a href="/usuario/perfil/<?php echo @$_SESSION['_ID']; ?>" class="pure-menu-link">- Seu Perfil</a></li>

				<li class="pure-menu-item"><a href="/usuario/sair" class="pure-menu-link">- Sair</a></li>
			</ul>
			<?php endif; ?>
			
		</div>
	</div>

	<div id="main">

		<div class="header">
			<h1><?php echo $dados['titulo']; ?></h1>
			<br>
		</div>

		<div class="content">
		<br>
