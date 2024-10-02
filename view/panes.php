<body>
  <!-- Comienza Formulario panes-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Panes</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para añadir panes a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="nombrepan">Nombre</label>
                  <input type="text" name="name_pan" class="form-control" id="nombrepan" placeholder="Nombre del pan">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_PAN">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla panes -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Panes</h4>
              <p class="card-description">
                Panes Disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Pan</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($pan = $panes->fetch_object()) { ?>
                      <tr>
                        <td><?= $pan->id_pan ?></td>
                        <td><?= $pan->des_pan ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="pan_id" value="<?php echo $pan->id_pan ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_PAN" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-panes.php?pan_id=<?php echo $pan->id_pan ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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