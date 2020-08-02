<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Informacion Renta</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">

            <div class="card-body w-100">
                <div class="form-group">
                    <h4 class="m-auto">Fecha de renta:</h4>
                    <h5 class="m-auto">Desde <?php echo $mr[0]->dstart ?> hasta <?php echo $mr[0]->dend  ?></h5>
                </div>
                <div class="form-group">
                    <h4 class="m-auto">Usuario:</h4>
                    <h5 class="m-auto"><?php echo $mr[0]->user ?></h5>
                </div>
                <section class="form-group">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Peliculas</th>
                                <th>Precio</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($mr as $m) : ?>
                                <tr>
                                    <td>
                                        <?php echo $m->movie ?>
                                    </td>
                                    <td>
                                        <?php echo $m->unit_price ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </section>
                <div class="form-group">
                    <h4 class="m-auto">Total:</h4>
                    <h3 class="m-auto"><?php echo $mr[0]->total ?></h3>
                </div>
            </div>

        </div>
    </section>
</main>