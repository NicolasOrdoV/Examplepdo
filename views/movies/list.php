<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Peliculas</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Peliculas</h2>
			<a href="?controller=movie&method=new" class="btn btn-success">+Agregar</a>
		</div>

		<section class="col-md-12 flex-nowrap table-responsive">
			<table class="table table-success table-borderless table-hover">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nombres</th>
						<th>Portada</th>
						<th>Descripcion</th>
                        <th>Usuario</th>
                        <th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($movies as $movie): ?>
						<tr>
							<td>
								<?php echo $movie->id ?>
							</td>
							<td>
								<?php echo $movie->name ?>
							</td>
							<td>
							<img src="assets/img/<?php echo $movie->img ?>" class="img-fluid rounded border border-ligth b" width="150">
							</td>
							<td>
								<?php echo $movie->description ?>
							</td>
							<td>
								<?php echo $movie->user ?>
                            </td>
                            <td>
                                <?php echo $movie->status ?>
                            </td>
							<td>
								<a href="?controller=movie&method=view&id=<?php echo $movie->id ?>" class="btn btn-success">Categorias</a>
								<a href="?controller=movie&method=edit&id=<?php echo $movie->id ?>" class="btn btn-warning">Editar</a>
								<a href="?controller=movie&method=delete&id=<?php echo $movie->id ?>" class="btn btn-secondary">Eliminar</a>

							<?php
				      		if($movie->status_id == 1) {
					      	?>
				      			<a href="?controller=movie&method=updateStatus&id=<?php echo $movie->id ?>" class="btn btn-danger">Inactivar</a>
				      		<?php
				      			} elseif($movie->status_id == 2) {
				      		?>
				      			<a href="?controller=movie&method=updateStatus&id=<?php echo $movie->id ?>" class="btn btn-primary">Activar</a>
				      		<?php
				      			}
				      		?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
	</section>
</main>
