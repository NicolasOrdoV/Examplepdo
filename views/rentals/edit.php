<main class="container">
	<div class="row">
		<h1 class="col-12 d-flex justify-content-center mt-3">Editar Renta</h1>
	</div>
	<section class="row mt-3">
		<div class="card w-50 m-auto">
			<div class="card-header bg-primary">
				<h2 class="m-auto">Información de la Renta</h2>
			</div>

			<div class="card-body w-100">
                <form action="?controller=rental&method=update" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
                    <div class="form-group">
                        <label> Fecha de renta(fecha de hoy)</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo $data[0]->start_date ?>" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label> Fecha de entrega</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $data[0]->end_date ?>" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="total" class="form-control" placeholder="Ingrese el valor del alquiler" value="<?php echo $data[0]->total ?>" required>
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente</div>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <select name="user_id" class="form-control" required>
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
                        <div class="invalid-feedback">Por favor no dejar campos vacios.</div>
                        <div class="valid-feedback">Campo validado correctamente.</div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
