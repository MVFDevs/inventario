<?php
  include 'modelos/conexion.php';
 ?>
<header class="main-header">
  <a href="index.php" class="logo">
    <img src="img/logo.jpg" alt="" class="logo">
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php if ($_SESSION["tipo"]==4) {?>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <?php $sel=$con->query("SELECT COUNT(estado) as 'sin' FROM producto WHERE estado='0'");
            $estado = 0;
              foreach ($sel as $item) {
                if($item["sin"]>0){
                  $estado = $item["sin"];
             ?>
            <span class="label label-warning"><?php echo $item["sin"] ?></span>
          <?php }
        } ?>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Productos sin asignar</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#" onclick="cargar('modulos/asignacionProducto.php');">
                    <i class="fa fa-users text-aqua"></i><?php echo $estado ?>  producto(s) sin asignar
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      <?php } ?>
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-primary">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <h3>
                      Design some buttons
                      <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer">
              <a href="#">View all tasks</a>
            </li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="img/icono.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo ucwords($_SESSION["nombre"])?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="img/icono.png" class="img-circle" alt="User Image">
              <p>
                <?php echo ucwords($_SESSION["nombre"])?> - <?php echo $_SESSION["cargo"]?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="controladores/cerrarSesion.php" class="btn btn-danger btn-flat">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
