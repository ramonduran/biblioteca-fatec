<?php
	if ( isset( $_GET['arg0'] ) && $_GET['arg0']==='erro' ) {
		echo '<div class="msgm-erro">Login ou senha incorretos.</div>';
	}
?>
<form action="/usuario/login/" method="POST" class="pure-form">
	<label>Login:</label><br>
	<input type="text" name="login" required/><br><br>

	<label>Senha:</label><br>
	<input type="text" name="senha" required/><br><br>

	<input type="submit" value="Login" class="pure-button pure-button-primary"/>
</form>
