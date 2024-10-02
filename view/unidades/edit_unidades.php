<body>
    <!-- Comienza Formulario editar unidades-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Unidades</h4>
                            <p class="card-description">
                                Formulario para modificar unidades de su tabla
                            </p>
                            <?php
                            while ($unidad = $unidades->fetch_object()) { ?>
                                <?php
                                if ($unidad->id_uni == $_GET['uni_id']){
                                ?>
                                <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <label for="nombreunidad">Nombre</label>
                                    <input type="text" value="<?php echo $unidad->des_uni ?>" name="new_uni" class="form-control" id="nombreunidad" placeholder="Nombre de la unidad">
                                </div>
                                
                            <?php }}
                            ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_UNIDAD">Editar</button>
                                <button onclick=" location = 'show-unidades.php'" type="button" class="btn btn-light">Volver</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>