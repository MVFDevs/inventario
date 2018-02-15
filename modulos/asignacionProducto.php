<?php include '../modelos/conexion.php'; ?>
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Asignación de producto</h3>
  </div>
  <form role="form" method="post" action="controladores/asignar_producto.php">
    <div class="box-body">
      <div class="form-group">
        <label>Funcionario</label>
        <select class="form-control select2" style="width: 100%;" required id="funcionario" name="funcionario">
          <?php
            $datos = mysqli_query($con,"SELECT rut,nombre,apellido FROM funcionario WHERE estado='0'");
            foreach ($datos as $item) {
           ?>
          <option value="<?php echo $item['rut'] ?>"><?php echo $item['nombre'] ?> <?php echo $item['apellido'] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Productos a asignar</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecciona los productos"
        style="width: 100%;" name="productos[]">
        <?php
          $datos = mysqli_query($con,"SELECT producto.codigo , tipo_producto.descripcion FROM producto INNER JOIN tipo_producto ON tipo_producto.id = producto.tipo WHERE estado = '0'");
          foreach ($datos as $item) {
         ?>
        <option value="<?php echo $item['codigo'] ?>"><?php echo $item['codigo'] ?> - <?php echo $item['descripcion'] ?></option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
<div class="box box-danger" >
      <div class="box-header">
        <h3 class="box-title">Productos sin asignar</h3>
      </div>
      <div class="box-body">
        <table id="datos" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Código Produto</th>
            <th>Tipo Producto</th>
            <th>Observación</th>
            <th>Sección</th>
          </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT producto.codigo,tipo_producto.descripcion,producto.observacion,tipo_funcionario.descripcion FROM producto INNER JOIN tipo_producto on (tipo_producto.id = producto.tipo) INNER JOIN funcionario ON funcionario.rut = producto.rut_funcionario INNER JOIN tipo_funcionario on (tipo_funcionario.id = funcionario.tipo)   WHERE producto.estado = '0'";
            $datos = mysqli_query($con,$sql);
            $row = mysqli_num_rows($datos);
            $array = $datos->fetch_all();
            for ($i=0; $i < $row ; $i++) {
              ?>
              <tr>
                 <td><?php echo $array[$i][0] ?></td>
                 <td><?php echo $array[$i][1] ?></td>
                 <td><?php echo $array[$i][2] ?></td>
                 <td><?php echo $array[$i][3] ?></td>
                </tr>
              <?php
            }
           ?>
          </tbody>
          <tfoot>
          <tr>
            <th>Código Produto</th>
            <th>Tipo Producto</th>
            <th>Observación</th>
            <th>Sección</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
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
</div>
<script type="text/javascript">
$(function () {
  $('.select2').select2()
})
</script>
