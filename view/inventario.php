<body>
    <!-- Comienza Formulario inventario-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inventario</h4>
                            <div class="text-danger mt-1" ?php if ($error) ?>
                                <?php
                                echo $error
                                ?>
                            </div>
                            <p class="card-description">
                                Formulario para añadir inventario a su tabla
                            </p>
                            <form class="forms-sample" method="POST">
                                <?php foreach ($listPan as $value) { ?>
                                    <div class="form-group">
                                        <label for="text">Nombre del pan</label>
                                        <select class="form-control" name="des_pan" data-iduser="<?php echo $value['id_pan'] ?>" id="nom_pan">
                                            <?php foreach ($listPan as $number_pan => $pan) { ?>
                                                <option value="<?php echo $pan['id_pan'] ?>" <?php if ($value['des_pan'] == $pan['des_pan']) echo 'selected'; ?>> <?php echo strtoupper($pan['des_pan']) ?> </option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                    </div>
                                    <div>
                                        <?php foreach ($listIns as $value) { ?>
                                            <div class="form-group">
                                                <label for="text">Nombre del insumo</label>
                                                <select class="form-control" name="des_ins" data-iduser="<?php echo $value['id_ins'] ?>" id="nom_ins">
                                                    <?php foreach ($listIns as $number_ins => $ins) { ?>
                                                        <option value="<?php echo $ins['id_ins'] ?>" <?php if ($value['des_ins'] == $ins['des_ins']) echo 'selected'; ?>> <?php echo strtoupper($ins['des_ins']) ?> </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="can_ins">Cantidad de insumos</label>
                                                <input type="number" name="can_ins" class="form-control" id="can_ins" placeholder="Cantidad de insumos">
                                            </div>
                                            <?php foreach ($listUni as $value) { ?>
                                                <div class="form-group">
                                                    <label for="text">Unidad</label>
                                                    <select class="form-control" name="des_uni" data-iduser="<?php echo $value['id_uni'] ?>" id="des_uni">
                                                        <?php foreach ($listUni as $number_uni => $uni) { ?>
                                                            <option value="<?php echo $uni['id_uni'] ?>" <?php if ($value['des_uni'] == $uni['des_uni']) echo 'selected'; ?>> <?php echo strtoupper($uni['des_uni']) ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                                </div>
                                    </div>
                                    <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_INVENTARIO">Añadir</button>
                                    <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Comienza Tabla inventario -->
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabla Inventario</h4>
                            <p class="card-description">
                                Inventario actual
                            </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre del pan</th>
                                            <th>Nombre del insumo</th>
                                            <th>Cantidad de insumo</th>
                                            <th>Unidad de medida</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($inventario = $inventarios->fetch_object()) { ?>
                                            <tr>
                                                <td><?= $inventario->id_panins ?></td>
                                                <td><?= $inventario->des_pan ?></td>
                                                <td><?= $inventario->des_ins ?></td>
                                                <td><?= $inventario->can_ins ?></td>
                                                <td><?= $inventario->des_uni ?></td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" name="id_panins" value="<?php echo $inventario->id_panins ?>">
                                                        <!-- BOTON BORRAR -->
                                                        <button type="submit" name="accion" value="DELETE_INVENTARIO" class="btn btn-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-delete"></i>
                                                            <!-- BOTON EDITAR -->
                                                            <button onclick=" location = 'show-edit-inventario.php?id_panins=<?php echo $inventario->id_panins ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
                                                                <i class="mdi mdi-lead-pencil"></i>
                                                    </form>
                                                </td>
                                            </tr>

                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>