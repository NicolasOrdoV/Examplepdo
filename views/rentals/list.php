<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Rentas</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Rentas</h2>
			<a href="?controller=rental&method=new" class="btn btn-success">+Agregar</a>
		</div>

		<section class="col-md-12 flex-nowrap table-responsive">
			<table class="table table-success table-borderless table-hover">
				<thead class="thead-dark">
			    <tr>
			      <th>#</th>
			      <th>Fecha de renta inicial</th>
			      <th>fecha de renta final</th>
			      <th>Estado</th>
				  <th>Total</th>
				  <th>Usuario</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($rentals as $rental) :?>
				    <tr>
				      <td><?php echo $rental->id ?></td>
				      <td><?php echo $rental->start_date ?></td>
				      <td><?php echo $rental->end_date ?></td>
				      <td><?php echo $rental->status ?></td>
					  <td><?php echo $rental->total ?></td>
					  <td><?php echo $rental->user ?></td>
				      <td>
				      	<a href="?controller=rental&method=view&id=<?php echo $rental->id ?>" class="btn btn-success">Peliculas</a>
				      	<a href="?controller=rental&method=edit&id=<?php echo $rental->id ?>" class="btn btn-warning">Editar</a>
				      	<a href="?controller=rental&method=delete&id=<?php echo $rental->id ?>" class="btn btn-secondary">Eliminar</a>

				      	<?php
				      		if($rental->status_id == 1) {
				      	?>
			      			<a href="?controller=rental&method=updateStatus&id=<?php echo $rental->id ?>" class="btn btn-danger">Inactivar</a>
			      		<?php
			      			} elseif($rental->status_id == 2) {
			      		?>
			      			<a href="?controller=rental&method=updateStatus&id=<?php echo $rental->id ?>" class="btn btn-primary">Activar</a>
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
