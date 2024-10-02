<body>
    <!-- Comienza Formulario insumos-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Insumos</h4>
                            <p class="card-description">
                                Formulario para modificar insumos de su tabla
                            </p>
                            <?php
                            while ($insumo = $insumos->fetch_object()) { ?>
                                <?php
                                if ($insumo->id_ins == $_GET['id_ins']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="fec_tan">Nombre del insumo</label>
                                            <input type="text" name="new_ins" value="<?php echo $insumo->des_ins ?>" class="form-control" id="new_ins">
                                        </div>
                                        <?php foreach ($listUni as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Unidad</label>
                                                <select class="form-control" name="new_uni" data-iduser="<?php echo $value['id_uni'] ?>" id="new_uni">
                                                    <?php foreach ($listUni as $number_uni => $uni) { ?>
                                                        <option value="<?php echo $uni['id_uni'] ?>" <?php if ($insumo->des_uni === $uni['des_uni']) echo 'selected'; ?>> <?php echo strtoupper($uni['des_uni']) ?> </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="new_min">Existencia mínima</label>
                                                <input type="number" value="<?php echo $insumo->exi_min ?>" name="new_min" class="form-control" id="new_min" placeholder="Existencia mínima de insumos">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_max">Existencia máxima</label>
                                                <input type="number" value="<?php echo $insumo->exi_max ?>" name="new_max" class="form-control" id="new_max" placeholder="Existencia máxima de insumos">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_can">Cantidad disponible</label>
                                                <input type="number" value="<?php echo $insumo->can_disp ?>" name="new_can" class="form-control" id="new_can" placeholder="Cantidad disponible de insumos">
                                            </div>
                                    <?php }
                            }
                                    ?>
                                    <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_INSUMO">Editar</button>
                                    <button onclick=" location = 'show-insumos.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>