<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Administración de Peliculas</title>
    <link rel="icon" href="assets/img/movies.ico">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

<main class="container">
        <section class="row mt-5">
            <div class="card w-70 ml-auto mr-auto mt-5 border-success">
                <div class="card-body table-dark w-100">
					<div class="row">
						<h1 class="col-12 d-flex justify-content-center pb-4">Iniciar Sesión</h1>
					</div>
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
							<input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
						</div>
						<div class="form-group">
							<button class="btn btn-success m-auto">Ingresar</button>
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