<?php

class LivroDAO extends Model {

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
	 * Inseri livro no banco de dados
	 */
	public function insertLivro( Livro $l ) {
		// Prepara comando SQL.
		$stmt = $this->mysqli->prepare( 'INSERT INTO Book(name,year,author,qut) VALUES (?,?,?,?)' );
		// Tratamento dos parametros.
		$name   = $l->getName();
		$year   = $l->getYear();
		$author = $l->getAuthor();
		$qut    = $l->getQut();
		$stmt->bind_param('ssss', $name, $year, $author, $qut);
		// Se executar SQL sem erros, retorne true, se não retorne ERRO.
		if ( $stmt->execute() ) {
			$stmt->close();
			return true;
		} else {
			return 'ERRO: (' . $stmt->errno . ') ' . $stmt->error;
		}
	}

	/*
     * Pega livro via ID.
     */
	public function getLivro( $id ) {
		// Prepara comando SQL.
		$stmt = $this->mysqli->prepare( 'SELECT * FROM Book WHERE id=?' );
		// Tratamento dos parametros.
		$stmt->bind_param( 'i', $id );
		// Executa SQL e retorna novo objeto Livro.
		$stmt->execute();
		$stmt->bind_result( $id, $name, $year, $author, $qut );
		$stmt->fetch();
		$this->carregar->model( 'Livro' );
		$livro = new Livro( $id, $name, $year, $author, $qut );
		return $livro;
	}

	/*
     * Pega todos os livros.
     */
	public function getAll() {
		// Retorna resultado comando SQL.
		$result = $this->mysqli->query( 'SELECT * FROM Book' );
		// Se resultados for maior que zero.
		if ( $result->num_rows > 0 ) {
			// Carrega model Livro.
			$this->carregar->model( 'Livro' );
			// Enquanto tiver resultados cria objetos Livro e adiciona no array "livros[]".
			while ( $row = $result->fetch_object() ) {
				$livros[] = new Livro( $row->id, $row->name, $row->year, $row->author, $row->qut );
			}
			// Retorna array de livros e fecha conexão.
			return $livros;
			$result->close();
		} else {
			return false;
		}
	}

} // termina classe LivroDAO
