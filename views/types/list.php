<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Tipos de Estados</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Estados</h2>
			<a href="?controller=status&method=new" class="btn btn-success">+Agregar</a>
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
					<?php foreach($types as $type): ?>
						<tr>
							<td>
								<?php echo $type->id ?>
							</td>
							<td>
								<?php echo $type->name ?>
							</td>
							<td>
								<a href="?controller=status&method=edit&id=<?php echo $status->id ?>" class="btn btn-warning disabled" role="button">Editar</a>
								<a href="?controller=status&method=delete&id=<?php echo $status->id ?>" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
	</section>
</main>