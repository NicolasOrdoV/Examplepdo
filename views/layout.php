<!DOCTYPE html>
<html lang="es">
<head>
	<title>Software Peliculas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/img/movies.ico">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<header>		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.php">
		  	<img src="assets/img/movies.png" width="30" height="30">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
		    <ul class="navbar-nav">
		    	<?php if($_SESSION['user']->role == 'Administrador'):?>
	              <li class="nav-item">
			        <a class="nav-link" href="?controller=user">Usuarios</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-danger" href="?controller=movie">Peliculas</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-success" href="?controller=category">Categorías de producciones</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-warning" href="?controller=rental">Alquileres</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-info" href="?controller=status">Estados</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-light" href="?controller=role">Roles</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-danger" href="?controller=types">Tipos de estados</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-primary font-weigth-bold" href="?controller=login&method=logout">Cerrar sesion</a>
			      </li>
			    <?php elseif($_SESSION['user']->role == 'Empleado') :?>
			      <li class="nav-item">
			        <a class="nav-link text-danger" href="?controller=movie">Peliculas</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-success" href="?controller=category">Categorías de producciones</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-warning" href="?controller=rental">Alquileres</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-primary font-weigth-bold" href="?controller=login&method=logout">Cerrar sesion</a>
			      </li>
			    <?php else:?>
			      <li class="nav-item">
			        <a class="nav-link text-danger" href="?controller=movie">Peliculas</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-warning" href="?controller=rental">Alquileres</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-primary font-weigth-bold" href="?controller=login&method=logout">Cerrar sesion</a>
			      </li>
			    <?php endif ?>  
		    </ul>	    
		  </div>
		</nav>
	</header>
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>