<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex justify-content-center mt-3">Nuevo Usuario</h1>
    </div>

    <section class="row mt-3">
        <div class="card w-50 m-auto">
            <div class="card-header container bg-primary">
                <h2 class="m-auto">Informacion Usuario</h2>
            </div>

            <div class="card-body w-100">
                <form action="?controller=user&method=save" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Ingrese su email" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="rol_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                                foreach ($roles as $role) {
                                    ?>
                                        <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Generar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
