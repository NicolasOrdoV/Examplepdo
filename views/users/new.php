<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Nuevo Usuario</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Información Usuario</h2>
            </div>

            <div class="card-body w-100">
                <form action="?controller=user&method=save" method="POST">
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="_email" class="form-control" placeholder="Ingrese su nombre">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="_name" class="form-control" placeholder="Ingrese su email">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="_password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="_rolId" class="form-control">
                            <option value="">Seleccione...</option>                                
                            <?php
                                foreach ($roles as $role) {
                                    ?>
                                        <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
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