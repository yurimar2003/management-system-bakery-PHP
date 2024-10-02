<body>
    <!-- Comienza Formulario insumos-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inventario</h4>
                            <p class="card-description">
                                Formulario para modificar el inventario de su tabla
                            </p>
                            <?php
                            while ($inventario = $inventarios->fetch_object()) { ?>
                                <?php
                                if ($inventario->id_panins == $_GET['id_panins']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <?php foreach ($listPan as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Nombre del pan</label>
                                                <select class="form-control" name="new_pan" data-iduser="<?php echo $value['id_pan'] ?>" id="new_pan">
                                                    <?php foreach ($listPan as $number_pan => $pan) { ?>
                                                        <option value="<?php echo $pan['id_pan'] ?>" <?php if ($inventario->des_pan === $pan['des_pan']) echo 'selected'; ?>> <?php echo strtoupper($pan['des_pan']) ?> </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                            </div>
                                            <?php foreach ($listIns as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Nombre del insumo</label>
                                                <select class="form-control" name="new_ins" data-iduser="<?php echo $value['id_ins'] ?>" id="new_ins">
                                                    <?php foreach ($listIns as $number_ins => $ins) { ?>
                                                        <option value="<?php echo $ins['id_ins'] ?>" <?php if ($inventario->des_ins === $ins['des_ins']) echo 'selected'; ?>> <?php echo strtoupper($ins['des_ins']) ?> </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_can">Cantidad del insumos</label>
                                                <input type="number" value="<?php echo $inventario->can_ins ?>" name="new_can" class="form-control" id="new_can" placeholder="Cantidad disponible de insumos">
                                            </div>
                                            <?php foreach ($listUni as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Nombre de la unidad</label>
                                                <select class="form-control" name="new_uni" data-iduser="<?php echo $value['id_uni'] ?>" id="new_uni">
                                                    <?php foreach ($listUni as $number_uni => $uni) { ?>
                                                        <option value="<?php echo $uni['id_uni'] ?>" <?php if ($inventario->des_uni === $uni['des_uni']) echo 'selected'; ?>> <?php echo strtoupper($uni['des_uni']) ?> </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                            </div>
                                    <?php }
                            }
                                    ?>
                                    <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_INVENTARIO">Editar</button>
                                    <button onclick=" location = 'show-inventario.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>