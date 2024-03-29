<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex justify-content-center mt-3">Nueva Pelicula</h1>
    </div>

    <section class="row mt-3">
        <div class="card w-50 m-auto">
            <div class="card-header bg-primary container">
                <h2 class="m-auto">Informacion Pelicula</h2>
            </div>

            <div class="card-body w-100">
            <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div id="txt" class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-images"></i></div>
                            </div>
                            <input type="file" name="img" class="form-control" required><button class="btn btn-info">+</button>
                        </div>


                    </div>
                </form>
                <?php
                if (isset($_FILES['img'])) {
                    $name_img = $_FILES['img']['name'];
                    $type_img = $_FILES['img']['type'];
                    $size_img = $_FILES['img']['size'];

                    $carpeta_destina = $_SERVER['DOCUMENT_ROOT'] . "/c/xampp/htdocs/Proyectos/Examplepdo/assets/img/";
                    if ($size_img <= 1000000) {
                        if ($type_img == "image/png" || $type_img == "image/jpeg" || $type_img == "image/jpg") {

                           // move_uploaded_file($_FILES['img']['tmp_name'], $carpeta_destina . $name_img);

                ?>
                            <img src="assets/img/<?php echo $name_img ?>" class="col-lg-4">

                        <?php
                        } else {
                        ?>
                            <script>
                                alert("Solo se permiten archivos tipo png , jpg y jpeg");
                            </script>

                        <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("El archivo no puede ser mayor a 1 mega");
                        </script>

                <?php
                    }
                }
                ?>


                <input type="hidden" id="img" name="img" value="<?php echo $name_img ?>">
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label> Descripción</label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Ingrese la descripción" required></textarea>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>

                    <div class="form-group">
						<label>Usuario</label>
						<select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                                foreach ($users as $user) {
                                    ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
					</div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <label>Categorias</label>
                            <select name ="categories" id="categories" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <?php
                                    foreach ($categories as $category) {
                                        ?>
                                            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                            <div class="valid-feedback">Campo validado correctamente.</div>
                        </div>
                        <div class="col-md-3">
                            <button id="add" class="btn btn-success mt-4">+</button>
                        </div>
                    </div>
                    <div id="list-categories"></div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                    </div>

            </div>
        </div>
    </section>
</main>
<script src="assets/js/movie.js"></script>
