<body>
  <!-- Comienza Formulario unidades-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Unidades</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para añadir unidades a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="nombreunidad">Nombre</label>
                  <input type="text" name="name_unidad" class="form-control" id="nombreunidad" placeholder="Nombre de la unidad de medida">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_UNIDAD">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla unidades -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Unidades de medida</h4>
              <p class="card-description">
                Unidades de medida Disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Unidad</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($unidad = $unidades->fetch_object()) { ?>
                      <tr>
                        <td><?= $unidad->id_uni ?></td>
                        <td><?= $unidad->des_uni ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="uni_id" value="<?php echo $unidad->id_uni ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_UNIDAD" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-unidades.php?uni_id=<?php echo $unidad->id_uni ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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