<?php
	// Verifica se há mensagem para mostrar
	// 		Se `added` for verdade
	// 		Se não se `added` for diferente de null
	if ( isset( $dados['added'] ) && $dados['added']===true ) {
		echo '<div class="msgm-sucesso">Cadastro realizado com sucesso!</div>';
	} elseif ( isset( $dados['added'] ) ) {
		echo '<div class="msgm-erro">'.$dados['added'].'</div>';
	}
?>
<form action="/livro/cadastrar" method="POST" class="pure-form">
	<label>Nome:</label><br>
	<input type="text" name="nome" required/><br><br>

	<label>Autor:</label><br>
	<input type="text" name="autor" required/><br><br>

	<label>Ano:</label><br>
	<input type="number" name="ano" required/><br><br>

	<label>Quatidade:</label><br>
	<input type="number" name="qut" value="1" required/><br><br>

	<input type="submit" value="Cadastrar" class="pure-button pure-button-primary"/>
</form>

