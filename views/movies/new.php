<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Nueva Pelicula</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Informacion Pelicula</h2>
            </div>

            <div class="card-body w-100">
                <form action="?controller=movie&method=save" method="POST" enctype="multypart/form-data">
                    <div class="form-group" >
                        <label>Portada</label>
                        <input type="file" name="img" id="img" class="input-group-text">
                    </div>
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label> Descripción</label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Ingrese la descripción"></textarea>
                    </div>
                    
                    <div class="form-group">
						<label>Usuario</label>
						<select name="user_id" id="user_id" class="form-control">
                            <option value="">Seleccione...</option>                                
                            <?php
                                foreach ($users as $user) {
                                    ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                    <?php                                       
                                }
                            ?>
                        </select>
					</div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <label>Categorias</label>
                            <select name ="categories" id="categories" class="form-control">
                                <option value="">Seleccione...</option>                                
                                <?php
                                    foreach ($categories as $category) {
                                        ?>
                                            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                        <?php                                       
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button id="add" class="btn btn-success mt-4">+</button>
                        </div>
                    </div>
                    <div id="list-categories"></div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<script src="assets/js/movie.js"></script>