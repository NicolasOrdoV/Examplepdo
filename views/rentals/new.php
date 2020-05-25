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
                <form action="?controller=rental&method=save" method="POST">
                    <div class="form-group">
                        <label> Fecha de renta(fecha de hoy)</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Fecha de entrega</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="total" class="form-control" placeholder="Ingrese el valor del alquiler">
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