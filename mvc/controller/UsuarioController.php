<?php

class UsuarioController extends Controller {

	/*
     * Carrega página de cadastrar de usuário.
     *
     * @link /usuario/cadastrar
     */
	public function cadastrar() {
		// Necessita estar logado
		# $this->areaRestrita();
		// Configura dados para views
		$dados['titulo'] = 'Cadastrar Usuário';
		// Verifica se recebe dados via POST, se sim, inseri o usuário no banco através do model UsuarioDAO.
		if ( $_POST ) {
			// Recebe os parametos via POST
			$nome   = $_POST['nome'];
			$login  = $_POST['login'];
			$senha  = $_POST['senha'];
			// Carrega e Cria objeto Usuario
			$this->carregar->model( 'Usuario' );
			$usuario = new Usuario( 0, $nome, $login, $senha );
			// Carrega e Cria objeto UsuarioDAO e passa o objeto Usuario para função de inserir no banco.
			$this->carregar->model( 'UsuarioDAO' );
			$usuarioDAO = new UsuarioDAO();
			$dados['added'] = $usuarioDAO->insertUsuario( $usuario );
		}
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'usuario-cadastro', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Mostra página de perfil do usuário, através do (id) passado via GET.
     *
     * @link /usuario/perfil/$id
     */
	public function perfil() {
		// Necessita estar logado
		$this->areaRestrita();
		// Recebe o paramento 'arg0' via GET que será o ID do usuario.
		$id = $_GET['arg0'];
		// Carrega e Cria objeto UsuarioDAO e pega o usuario através do ID solicitado.
		$this->carregar->model( 'UsuarioDAO' );
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->getUsuario( $id );
		// Configura dados para views
		$dados['titulo'] = 'Perfil do Usuário';
		$dados['usuario']  = $usuario;
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'usuario-perfil', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Mostra lista de todos os usuários.
     *
     * @link /usuario/listar
     */
	public function listar() {
		// Necessita estar logado
		$this->areaRestrita();
		// Carrega e Cria objeto UsuarioDAO e pega o usuario através do ID solicitado.
		$this->carregar->model( 'UsuarioDAO' );
		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->getAll();
		// Configura dados para views
		$dados['titulo'] = 'Listagem de Usuários';
		$dados['usuarios'] = $usuarios;
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'usuario-listagem', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Mostra página de login.
     *
     * @link /usuario/login
     */
	public function login() {
		// Configura dados para views
		$dados['titulo'] = 'Tela de Login';
		// Verifica se recebe dados via POST, se sim, inseri o usuário no banco através do model UsuarioDAO.
		if ( $_POST ) {
			// Recebe os parametos via POST
			$login  = $_POST['login'];
			$senha  = $_POST['senha'];
			// Carrega e Cria objeto UsuarioDAO e passa login e senha para autenticar.
			$this->carregar->model( 'UsuarioDAO' );
			$usuarioDAO = new UsuarioDAO();
			$usuarioID = $usuarioDAO->authUsuario( $login, $senha );
			// Se autenticar com login e senha
			if ( $usuarioID ) {
				$_SESSION['_ID'] = $usuarioID;
				header( 'Location: /usuario/listar' );
			} else {
				header( 'Location: /usuario/login/erro' );
			}
		}
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'usuario-login', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Destroi a sessão atual.
     *
     * @link /usuario/sair/
     */
	public function sair() {
		// Necessita estar logado.
		$this->areaRestrita();
		// Destroi a sessão ID;
		unset( $_SESSION['_ID'] );
		// Redireciona para login.
		header( 'Location: /usuario/login' );
	}
} // termina classe UsuarioController