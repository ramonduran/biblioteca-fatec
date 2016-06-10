
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Autor</th>
			<th>Ano</th>
			<th>Quantidade</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($dados['livros'] as $l) : ?>
			<tr>
				<td><?= $l->getID();?></td>
				<td><?= $l->getName();?></td>
				<td><?= $l->getAuthor();?></td>
				<td><?= $l->getYear();?></td>
				<td><?= $l->getQut();?></td>
				<td><a href="/livro/perfil/<?= $l->getID();?>">ver perfil</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
