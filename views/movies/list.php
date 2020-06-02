<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Peliculas</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Peliculas</h2>
			<a href="?controller=movie&method=new" class="btn btn-success">+Agregar</a>
		</div>

		<section class="col-md-12 flex-nowrap table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombres</th>
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
								<?php echo $movie->description ?>
							</td>
							<td>
								<?php echo $movie->user ?>
                            </td>
                            <td>
                                <?php echo $movie->status ?>
                            </td>
							<td>
								<div class="dropdown">
									<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Lista de categorias
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<?php foreach ($categories as $category):?>
											<a class="dropdown-item" href="#"><?php echo $category->movie ?></a>
										<?php endforeach?>
									</div>
								</div>
								<a href="?controller=movie&method=edit&id=<?php echo $movie->id ?>" class="btn btn-warning">Editar</a>
								<a href="?controller=movie&method=delete&id=<?php echo $movie->id ?>" class="btn btn-danger">Eliminar</a>

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