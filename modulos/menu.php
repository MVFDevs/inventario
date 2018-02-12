<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú</li>
      <li class=""><a href="#" onclick="cargar('modulos/datosInventario.php');"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-cubes"></i> <span>Inventario</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#" onclick="cargar('modulos/asignacionProducto.php');"><i class="fa fa-dollar"></i>Asignación de activos</a></li>
          <li><a href="mantenedor.php"><i class="fa fa-database"></i>Mantenedor</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
