<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/icono.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Hola <?php echo ucwords($_SESSION["nombre"])?></p>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú</li>
      <li class=""><a href="#" onclick="cargar('modulos/datosInventario.php');"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
      <?php if ($_SESSION["tipo"] == 4){ ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-cubes"></i> <span>Inventario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="mantenedor.php"><i class="fa fa-database"></i>Mantenedor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-dollar"></i> <span>Activos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="cargar('modulos/asignacionProducto.php');"><i class="fa fa-dollar"></i>Asignación de activos</a></li>
            <li><a href="modificacionActivos.php" ><i class="fa fa-edit"></i>Modificación de activos</a></li>
          </ul>
        </li>
      <?php } ?>
      <li class=""><a href="personalvigente.php" ><i class="fa fa-home"></i> <span>Personal Vigente</span></a></li>
    </ul>
  </section>
</aside>
