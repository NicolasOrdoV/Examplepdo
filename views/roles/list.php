<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Roles</h1>

		<div class="col-md-12 m-2 d-flex justify-content-center">
			<h2>Roles</h2>
		</div>

		<section class="col-md-12">
			<table class="table table-success table-borderless table-hover">
				<thead class="thead-dark">
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($roles as $role) :?>
				    <tr>
				      <td><?php echo $role->id ?></td>
				      <td><?php echo $role->name ?></td>
				      <td><?php echo $role->status ?></td>
				      <td>
				      	<?php
				      		if($role->status_id == 1) {
				      	?>
			      			<a href="?controller=role&method=updateStatus&id=<?php echo $role->id ?>" class="btn btn-danger">Inactivar</a>
			      		<?php
			      			} elseif($role->status_id == 2) {
			      		?>
			      			<a href="?controller=role&method=updateStatus&id=<?php echo $role->id ?>" class="btn btn-primary">Activar</a>
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
