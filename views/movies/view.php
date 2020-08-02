<main class="container">
    <div class="row">
        <h1 class="col-12 d-flex justify-content-center mt-3">Informacion Pelicula</h1>
    </div>

    <section class="row mt-3">
        <div class="card w-50 m-auto">

            <div class="card-header w-100">
                <div class="form-group">
                <h2 class="m-auto">Información de peliculas</h2>
                </div>

             <div class="card-body w-100">
                <!--<form action="?controller=movie&method=update" method="post">-->
                    <input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
                    <div class="form-group">
                        <label> Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" value="<?php echo $data[0]->name ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label> Descripción</label>
                        <input type="text" class="form-control" rows="3" name="description" placeholder="Ingrese la descripción" value="<?php echo $data[0]->description ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <select name="user_id" class="form-control" readonly>
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
                        <table class="table table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Categorias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category):?>
                                    <tr>
                                        <td><?php echo $category->name?></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                <!--</form>-->
            </div>
        </div>
    </section>
</main>
