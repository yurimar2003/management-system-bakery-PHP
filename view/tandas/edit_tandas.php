<body>
    <!-- Comienza Formulario tandas-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tandas</h4>
                            <p class="card-description">
                                Formulario para modificar tandas de su tabla
                            </p>
                            <?php
                            while ($tanda = $tandas->fetch_object()) { ?>
                                <?php
                                if ($tanda->id_tan == $_GET['id_tan']) {
                                ?>
                                    <form class="forms-sample" method="POST">
                                        <div class="form-group">
                                            <label for="fec_tan">Fecha de Elaboración</label>
                                            <input type="datetime-local" name="new_fec" value="<?php echo $tanda->fec_tan ?>" class="form-control" id="nombrepan">
                                        </div>

                                        <div class="form-group">
                                            <label for="text">Nombre del pan</label>
                                            <select class="form-control" name="id_pan" data-iduser="<?php echo $value['id_pan'] ?>" id="new_pan">
                                                <?php foreach ($listPan as $number_pan => $pan) { ?>
                                                    <option value="<?php echo $pan['id_pan'] ?>" <?php if ($tanda->des_pan === $pan['des_pan']) echo 'selected'; ?>> <?php echo strtoupper($pan['des_pan']) ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="can_pie">Cantidad de piezas</label>
                                            <input type="number" value="<?php echo $tanda->can_pie ?>" name="new_can" class="form-control" id="nombrepan" placeholder="Nombre del pan">
                                        </div>
                                <?php }
                            }
                                ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_TANDA">Editar</button>
                                <button onclick=" location = 'show-tandas.php'" type="button" class="btn btn-light">Volver</button>
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>