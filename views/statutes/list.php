<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Estados</h1>

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
					<?php foreach($statuses as $status): ?>
						<tr>
							<td>
								<?php echo $status->id ?>
							</td>
							<td>
								<?php echo $status->status ?>
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