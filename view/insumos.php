<body>
  <!-- Comienza Formulario insumos-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Insumos</h4>

              <?php if (array_key_exists('errorform', $_GET)) { ?>
                <div class="text-danger mt-1">
                  <?php
                  echo $_GET['errorform']
                  ?>
                </div>
              <?php } ?>


              <p class="card-description">
                Formulario para añadir insumos a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="des_ins">Nombre del insumo</label>
                  <input type="text" name="des_ins" class="form-control" id="des_ins" placeholder="Nombre del insumo">
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
                  <div class="form-group">
                    <label for="exi_men">Existencia mínima</label>
                    <input type="text" name="exi_min" class="form-control" id="exi_men" placeholder="Existencia mínima de insumos">
                  </div>
                  <div class="form-group">
                    <label for="exi_max">Existencia máxima</label>
                    <input type="text" name="exi_max" class="form-control" id="exi_max" placeholder="Existencia máxima de insumos">
                  </div>
                  <div class="form-group">
                    <label for="can_dis">Cantidad disponible</label>
                    <input type="text" name="can_disp" class="form-control" id="can_dis" placeholder="Cantidad disponible de insumos">
                  </div>
                  <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_INSUMO">Añadir</button>
                  <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
              <div>

              </div>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla usuarios -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Insumos</h4>
              <p class="card-description">
                Insumos disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre del insumo</th>
                      <th>Unidad</th>
                      <th>Existencia mínima</th>
                      <th>Existencia máxima</th>
                      <th>Cantidad disponible</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($insumo = $insumos->fetch_object()) { ?>
                      <tr>
                        <td><?= $insumo->id_ins ?></td>
                        <td><?= $insumo->des_ins ?></td>
                        <td><?= $insumo->des_uni ?></td>
                        <td><?= $insumo->exi_min ?></td>
                        <td><?= $insumo->exi_max ?></td>
                        <td><?= $insumo->can_disp ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_ins" value="<?php echo $insumo->id_ins ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_INSUMO" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-insumos.php?id_ins=<?php echo $insumo->id_ins ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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