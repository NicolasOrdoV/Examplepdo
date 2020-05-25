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
                <form action="?controller=movie&method=save" method="POST">
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label> Descripción</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Ingrese la descripción"></textarea>
                    </div>
                    
                    <div class="form-group">
						<label>Usuario</label>
						<select name="user_id" class="form-control">
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
                    <div class="form-group">
                        <button class="btn btn-primary">Generar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>