<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Informacion Pelicula</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">

            <div class="card-body w-100">
                <div class="form-group">
                    <h2 class="m-auto">Nombre:</h2>
                    <h3 class="m-auto"><?php echo $cm[0]->movie ?></h3>
                </div>
                <div class="form-group">
                    <h2 class="m-auto">Descripción:</h2>
                    <h3 class="m-auto"><?php echo $cm[0]->desm ?></h3>
                </div>
                <section class="form-group">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Categorias</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cm as $c) : ?>
                                <tr>
                                    <td>
                                        <?php echo $c->category ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </section>

            </div>
        </div>
    </section>
</main>