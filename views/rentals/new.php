<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Nuevo alquiler</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Información de alquileres</h2>
            </div>

            <div class="card-body w-100">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label> Fecha de renta(fecha de hoy)</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label> Fecha de entrega</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="total" id="total" class="form-control" placeholder="Ingrese el valor del alquiler" required>
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
                            <label>Peliculas</label>
                            <select name="movies" id="movies" class="form-control" required>
                                <option value="">Seleccione...</option>                                
                                <?php
                                    foreach ($movies as $movie) {
                                        ?>
                                            <option value="<?php echo $movie->id ?>"><?php echo $movie->name ?></option>
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
                    <div id="list-movies"></div>
                    <div class="form-group">
                        <button id="submit" class="btn btn-primary" type="submit">Generar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<script src="assets/js/rental.js"></script>