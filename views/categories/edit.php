<main class="container">
	<div class="row">
		<h1 class="col-12 d-flex justify-content-center mt-3">Editar Categoria</h1>
	</div>
	<section class="row mt-3">
		<div class="card w-70 m-auto">
			<div class="card-header bg-primary">
				<h2 class="m-auto">Información de la Categoria</h2>
			</div>

			<div class="card-body w-100">
				<form action="?controller=category&method=update" method="post" class="needs-validation" novalidate>

					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">

					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" value="<?php echo $data[0]->name ?>" required>
						<div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>
