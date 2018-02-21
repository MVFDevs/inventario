<?php include 'modulos/head.php';
  include 'modelos/conexion.php';
  if ($_SESSION["tipo"]==4) {
  }else {
    header('location:extend/alerta.php?msj=No posees privilegios para ingresar a esta pagina&c=salir&p=in&t=error');
  }
?>
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <?php include 'modulos/header.php'; ?>
    <?php include 'modulos/menu.php'; ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Inventario
          <small>Sección Inventario</small>
        </h1>
      </section>
      <section class="content container-fluid">
        <div id="paginas">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Modificación de datos</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Funcionario</label>
                <select class="form-control select2" style="width: 100%;" required id="funcionario" name="funcionario">
                  <option value="">Seleccione Funcionario</option>
                </select>
              </div>
              <!----- TABLA productos ------>
              <table id="datos" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código Produto</th>
                  <th>Tipo Producto</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody id="productos">
                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Código Produto</th>
                  <th>Tipo Producto</th>
                  <th>Acción</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
          </div>

      </section>
    </div>
  </div>
  <?php include 'modulos/footer.php'; ?>
<?php include 'modulos/scripts.php'; ?>
</body>
<script type="text/javascript">
$(function () {
  $('.select2').select2()
})
</script>
<script>
  $(function () {
    $('#datos').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "language": {
          "url": "js/espanol.json"
      }
    })
  })
</script>
