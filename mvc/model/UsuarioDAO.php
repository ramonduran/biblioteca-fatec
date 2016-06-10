<?php

class UsuarioDAO extends Model {

	private $mysqli;

	/*
     * Faz a conexão com o Banco de dados ao instanciar Classe
     */
	public function __construct() {
		// Chama o constructor da classe Model
        parent::__construct();
        // Cria conexão MYSQL com o banco de dados
		$this->mysqli = new mysqli( BANCO_HOST, BANCO_USUARIO, BANCO_SENHA, BANCO_NOME );
		// Mostra erros se não conseguir conexão com o banco.
		if ( $this->mysqli->connect_errno ) {
			return 'ERRO: Falha no MySQL: (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error;
		}
	}

	/*
     * Inseri usuário no banco de dados
     */
	public function insertUsuario( Usuario $u ) {
		// Prepara comando SQL.
		$stmt = $this->mysqli->prepare( 'INSERT INTO User(name,login,senha) VALUES (?,?,?)' );
		// Tratamento dos parametros.
		$nome  = $u->getNome();
		$login = $u->getLogin();
		$senha = $u->getSenha();
		$stmt->bind_param( 'sss', $nome, $login, $senha );
		// Se executar SQL sem erros, retorne true, se não retorne ERRO.
		if ( $stmt->execute() ) {
			$stmt->close();
			return true;
		} else {
			return 'ERRO: (' . $stmt->errno . ') ' . $stmt->error;
		}
	}

	/*
     * Pega usuário via ID.
     */
	public function getUsuario( $id ) {
		// Prepara comando SQL.
		$stmt = $this->mysqli->prepare( 'SELECT * FROM User WHERE id=?' );
		// Tratamento dos parametros.
		$stmt->bind_param( 'i', $id );
		// Executa SQL e retorna novo objeto Usuario.
		$stmt->execute();
		$stmt->bind_result( $id, $nome, $login, $senha );
		$stmt->fetch();
		$this->carregar->model( 'Usuario' );
		$usuario = new Usuario( $id, $nome, $login, $senha );
		return $usuario;
	}

	/*
     * Pega todos os usuários.
     */
	public function getAll() {
		// Retorna resultado comando SQL.
		$result = $this->mysqli->query( 'SELECT * FROM User' );
		// Se resultados for maior que zero.
		if ( $result->num_rows > 0 ) {
			// Carrega model Usuario.
			$this->carregar->model( 'Usuario' );
			// Enquanto tiver resultados cria objetos Usuario e adiciona no array "usuarios[]".
			while ( $row = $result->fetch_object() ) {
				$usuarios[] = new Usuario( $row->id, $row->name, $row->login, $row->senha );
			}
			// Retorna array de usuarios e fecha conexão.
			return $usuarios;
			$result->close();
		} else {
			return false;
		}
	}

	/*
     * Autentica usuário através de $login e $senha.
     */
	public function authUsuario( $login, $senha ) {
		// Prepara comando SQL.
		$stmt = $this->mysqli->prepare( 'SELECT id FROM User WHERE login=? AND senha=?' );
		// Tratamento dos parametros.
		$stmt->bind_param( 'ss', $login, $senha );
		// Executa SQL
		$stmt->execute();
		$stmt->bind_result( $id );
		$stmt->fetch();
		// Se encontrar o usuário com login e senha correspondentes retorna $id se não false.
		if ( $id > 0 ) {
			return $id;
		} else {
			return false;
		}
	}

} // termina classe UsuarioDAO
