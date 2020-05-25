<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex jutify-content-center">Nueva Categoria</h1>
    </div>

    <section class="row mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Informacion Categoria</h2>
            </div>

            <div class="card-body w-100">
                <form action="?controller=category&method=save" method="POST">
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Generar</button>
                    </div>
            </div>
        </div>
        </form>
        </div>
        </div>
    </section>
</main>