<body>
  <!-- Comienza Formulario tandas-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tandas</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para añadir tandas a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="fec_tan">Fecha de Elaboración</label>
                  <input type="datetime-local" name="fec_tan" class="form-control" id="fec_tan" placeholder="Fecha de Elaboración de la tanda">
                </div>
                <?php foreach ($listPan as $value) { ?>
                <div class="form-group">
                <label for="text">Nombre del pan</label>
                <select class="form-control" name="nom_pan" data-iduser="<?php echo $value['id_pan']?>" id="nom_pan">
                        <?php foreach ($listPan as $number_pan => $pan) { ?>
                          <option  value="<?php echo $pan['id_pan'] ?>" <?php if($value['des_pan']==$pan['des_pan']) echo 'selected';?>> <?php echo strtoupper($pan['des_pan'])?> </option>
                        <?php } ?>
                        </select> 
                <?php } ?>
                </div>
                <div class="form-group">
                  <label for="can_pie">Cantidad de piezas</label>
                  <input type="number" name="can_pie" class="form-control" id="can_pie" placeholder="Cantidad de piezas de la tanda">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_TANDA">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla usuarios -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Tandas</h4>
              <p class="card-description">
                Tandas disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Fecha de Elaboración</th>
                      <th>Nombre del pan</th>
                      <th>Cantidad de piezas</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($tanda = $tandas->fetch_object()) { ?>
                      <tr>
                        <td><?= $tanda->id_tan ?></td>
                        <td><?= $tanda->fec_tan ?></td>
                        <td><?= $tanda->des_pan ?></td>
                        <td><?= $tanda->can_pie ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id_tan" value="<?php echo $tanda->id_tan ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_TANDA" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-tandas.php?id_tan=<?php echo $tanda->id_tan ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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