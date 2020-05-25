<main class="container">
	<div class="row">
		<h1 class="col-12 d-flex justify-content-center">Editar Usuario</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header">
				<h2 class="m-auto">Información del Usuario</h2>
			</div>

			<div class="card-body w-100">
				<form action="?controller=user&method=update" method="post">

					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">

					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese su nombre completo" value="<?php echo $data[0]->name?>">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Ingrese su email" value="<?php echo $data[0]->email ?>">
					</div>
					<div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($roles as $role) {
                                    if ($role->id == $data[0]->role_id) {
                                ?>
                                        <option selected value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                                <?php
                                    } else { 
                                ?>
                                        <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                                <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>

					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>