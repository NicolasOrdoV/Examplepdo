<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Administración de Peliculas</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

	<main class="container">
		<div class="row">
			<h1 class="col-12 d-flex justify-content-center">Iniciar Sesión</h1>
		</div>
		<section class="row mt-5">
			<div class="card w-50 m-auto">
				<div class="card-body w-100">
					<form action="?controller=login&method=login" method="post">

						<?php
							if(isset($error['errorMessage'])) {
						?>
								<div class="alert alert-danger alert-dismissable alert-width" role="alert">
									<button class="close" data-dismiss="alert">&times;</button>
									<p class="text-dark"><?php echo $error['errorMessage']; ?></p>
								</div>
						<?php
							}
						?>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="test@test.com" value="<?php echo isset($error['email']) ? $error['email'] : '' ?>">
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" name="password" class="form-control" placeholder="******">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Iniciar</button>
						</div>
					</form>
				</div>
			</div>
		</section>	
	</main>	

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>