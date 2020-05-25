<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Actualizar alquiler</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Información de alquileres</h2>
            </div>

            <div class="card-body w-100">
                <form action="?controller=rental&method=update" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
                    <div class="form-group">
                        <label> Fecha de renta(fecha de hoy)</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $data[0]->start_date ?>">
                    </div>
                    <div class="form-group">
                        <label> Fecha de entrega</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $data[0]->end_date ?>">
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="total" class="form-control" placeholder="Ingrese el valor del alquiler" value="<?php echo $data[0]->total ?>">
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <select name="user_id" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php
                                foreach($users as $user){
                                    if($user->id==$data[0]->user_id){
                                    ?>
                                    <option selected value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                    <?php
                                    }else{?>
                                        <option  value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                    <?php }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>