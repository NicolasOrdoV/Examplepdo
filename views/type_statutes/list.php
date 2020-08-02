<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Tipos de Estados</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Tipos de Estados</h2>
			<a href="?controller=ts&method=new" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 flex-nowrap table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombres</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($ts as $t): ?>
						<tr>
							<td>
								<?php echo $t->id ?>
							</td>
							<td>
								<?php echo $t->name ?>
							</td>
							<td>
								<a href="?controller=ts&method=edit&id=<?php echo $t->id ?>" class="btn btn-warning">Editar</a>
								<a href="?controller=t&method=delete&id=<?php echo $t->id ?>" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
	</section>
</main>