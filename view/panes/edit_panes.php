<body>
    <!-- Comienza Formulario panes-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Panes</h4>
                            <p class="card-description">
                                Formulario para modificar panes de su tabla
                            </p>
                            <?php
                            while ($pan = $panes->fetch_object()) { ?>
                                <?php
                                if ($pan->id_pan == $_GET['pan_id']){
                                ?>
                                <form class="forms-sample" method="POST">
                                <div class="form-group">
                                    <label for="nombrepan">Nombre</label>
                                    <input type="text" value="<?php echo $pan->des_pan ?>" name="new_pan" class="form-control" id="nombrepan" placeholder="Nombre del pan">
                                </div>
                            <?php }}
                            ?>
                                <button type="submit" name="accion" class="btn btn-success mr-2" value="EDIT_PAN">Editar</button>
                                <button onclick=" location = 'show-panes.php'" type="button" class="btn btn-light">Volver</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>