
<div class="container-scroller">
  <!-- navbar -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-2" href="show-home.php"><img src="src/images/logo.png" class="mr-" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="show-home.php"><img src="src/images/logo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="close-sesion" href="view/cerrar-sesion.php" data-toggle="dropdown" id="profileDropdown">
              <i class="icon-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="show-cerrar-sesion.php">
                <i class="ti-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
  </nav>
  <div class="container-fluid page-body-wrapper">        
    <!-- Comienza Sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="show-home.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-insumos.php">
              <i class="mdi mdi-bowl menu-icon"></i>
              <span class="menu-title">Insumos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-unidades.php">
              <i class="mdi mdi-weight-kilogram menu-icon"></i>
              <span class="menu-title">Unidades</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-panes.php">
              <i class="mdi mdi-barley menu-icon"></i>
              <span class="menu-title">Panes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-tandas.php">
              <i class="mdi mdi-code-equal menu-icon"></i>
              <span class="menu-title">Tandas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-inventario.php">
              <i class="mdi mdi-food-variant menu-icon"></i>
              <span class="menu-title">Inventario</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-usuarios.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- Termina Sidebar -->
