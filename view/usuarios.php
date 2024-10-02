<body>
  <!-- Comienza Formulario usuarios-->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Usuarios</h4>
              <div class="text-danger mt-1" ?php if ($error) ?>
                <?php
                echo $error
                ?>
              </div>
              <p class="card-description">
                Formulario para añadir usuarios a su tabla
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <label for="nombreusuario">Usuario</label>
                  <input type="text" name="name_usuario" class="form-control" id="nombreusuario" placeholder="Nombre del usuario">
                </div>
                <div class="form-group">
                  <label for="email">Correo</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                </div>
                <button type="submit" name="accion" class="btn btn-success mr-2" value="ADD_USUARIO">Añadir</button>
                <button type="submit" name="accion" value="Limpiar" class="btn btn-light">Limpiar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Comienza Tabla usuarios -->
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tabla Usuarios</h4>
              <p class="card-description">
                Usuarios disponibles
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Usuario</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($usuario = $usuarios->fetch_object()) { ?>
                      <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->usuario ?></td>
                        <td><?= $usuario->email ?></td>
                        <td>
                          <form method="post">
                            <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                            <!-- BOTON BORRAR -->
                            <button type="submit" name="accion" value="DELETE_USUARIO" class="btn btn-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                              <!-- BOTON EDITAR -->
                              <button onclick=" location = 'show-edit-usuarios.php?id=<?php echo $usuario->id ?>'" type="button" class="btn btn-warning btn-rounded btn-icon">
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
