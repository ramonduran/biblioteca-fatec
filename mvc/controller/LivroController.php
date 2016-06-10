<?php

class LivroController extends Controller {

	/*
     * Carrega página de cadastrar de livro.
     *
     * @link /livro/cadastrar
     */
	public function cadastrar() {
		// Necessita estar logado.
		$this->areaRestrita();
		// Configura dados para views.
		$dados['titulo'] = 'Cadastrar Livro';
		// Verifica se recebe dados via POST, se sim, inseri o livro no banco através do model LivroDAO.
		if ( $_POST ) {
			// Recebe os parametos via POST
			$nome  = $_POST['nome'];
			$autor = $_POST['autor'];
			$ano   = $_POST['ano'];
			$qut   = $_POST['qut'];
			// Carrega e Cria objeto Livro
			$this->carregar->model( 'Livro' );
			$livro = new Livro( 0, $nome, $ano, $autor, $qut );
			// Carrega e Cria objeto LivroDAO e passa o objeto Usuario para função de inserir no banco.
			$this->carregar->model( 'LivroDAO' );
			$livroDAO = new LivroDAO();
			$dados['added'] = $livroDAO->insertLivro( $livro );
		}
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'livro-cadastro', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Mostra página de perfil do usuário, através do (id) passado via GET.
     *
     * @link /livro/perfil/$id
     */
	public function perfil() {
		// Necessita estar logado
		$this->areaRestrita();
		// Recebe o paramento 'arg0' via GET que será o ID do livro.
		$id = $_GET['arg0'];
		// Carrega e Cria objeto LivroDAO e pega o livro através do ID solicitado.
		$this->carregar->model( 'LivroDAO' );
		$livroDAO = new LivroDAO();
		$livro = $livroDAO->getLivro( $id );
		// Configura dados para views
		$dados['titulo'] = 'Perfil do Livro';
		$dados['livro']  = $livro;
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'livro-perfil', $dados );
		$this->carregar->view( 'footer', $dados );
	}

	/*
     * Mostra lista de todos os livros.
     *
     * @link /livro/listar
     */
	public function listar() {
		// Necessita estar logado
		$this->areaRestrita();
		// Carrega e Cria objeto LivroDAO e pega o livro através do ID solicitado.
		$this->carregar->model( 'LivroDAO' );
		$livroDAO = new LivroDAO();
		$livros = $livroDAO->getAll();
		// Configura dados para views
		$dados['titulo'] = 'Listagem de Livros';
		$dados['livros'] = $livros;
		// Carrega views e passa os dados
		$this->carregar->view( 'header', $dados );
		$this->carregar->view( 'livro-listagem', $dados );
		$this->carregar->view( 'footer', $dados );
	}

} // termina classe LivroController
