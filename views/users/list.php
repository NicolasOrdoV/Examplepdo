<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Usuarios</h1>

		<div class="col-md-12 m-2 d-flex justify-content-between">
			<h2>Usuarios</h2>
			<a href="?controller=user&method=new" class="btn btn-success">+Agregar</a>
		</div>

		<section class="col-md-12">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Email</th>
			      <th>Estado</th>
				  <th>Role</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($users as $user) :?>
				    <tr>
				      <td><?php echo $user->id ?></td>
				      <td><?php echo $user->name ?></td>
				      <td><?php echo $user->email ?></td>
				      <td><?php echo $user->status ?></td>
					  <td><?php echo $user->role ?></td>
				      <td>
				      	<a href="?controller=user&method=edit&id=<?php echo $user->id ?>" class="btn btn-warning">Editar</a>	
				      	<a href="?controller=user&method=delete&id=<?php echo $user->id ?>" class="btn btn-danger">Eliminar</a>

				      	<?php
				      		if($user->status_id == 1) { 
				      	?>
			      			<a href="?controller=user&method=updateStatus&id=<?php echo $user->id ?>" class="btn btn-danger">Inactivar</a>
			      		<?php
			      			} elseif($user->status_id == 2) { 
			      		?>
			      			<a href="?controller=user&method=updateStatus&id=<?php echo $user->id ?>" class="btn btn-primary">Activar</a>
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