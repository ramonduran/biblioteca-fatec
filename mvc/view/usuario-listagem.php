
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Login</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($dados['usuarios'] as $u) : ?>
			<tr>
				<td><?= $u->getID();?></td>
				<td><?= $u->getNome();?></td>
				<td><?= $u->getLogin();?></td>
				<td><a href="/usuario/perfil/<?= $u->getID();?>">ver perfil</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
