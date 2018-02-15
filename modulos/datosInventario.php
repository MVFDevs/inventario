<?php
include '../modelos/conexion.php';
session_start();
 ?>
  <div class="box box-danger" >
        <div class="box-header">
          <h3 class="box-title">Inventario</h3>
        </div>
        <div class="box-body">
          <table id="datos" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Código Produto</th>
              <th>Tipo Producto</th>
              <th>Observación</th>
              <th>Rut Funcionario</th>
              <th>Nombre Funcionario</th>
              <th>Cargo Funcionario</th>
              <th>Sección</th>
              <th>Obra</th>
              <th>Holding</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $tipo = $_SESSION["tipo"];
              $sql = "";
              if ($tipo == 4) {
                $sql = "SELECT producto.codigo,tipo_producto.descripcion,producto.observacion,producto.rut_funcionario,funcionario.nombre,funcionario.apellido,cargo.descripcion,tipo_funcionario.descripcion,obra.nombre,holding.descripcion FROM producto INNER JOIN tipo_producto on (tipo_producto.id = producto.tipo) INNER JOIN funcionario ON (funcionario.rut = producto.rut_funcionario) INNER JOIN cargo on (cargo.id = funcionario.cargo) INNER JOIN tipo_funcionario on (tipo_funcionario.id = funcionario.tipo) INNER JOIN obra ON (obra.id = funcionario.id_obra) INNER JOIN holding ON (holding.id = obra.holding) WHERE producto.estado = '1' ";
              }else {
                  $sql = "SELECT producto.codigo,tipo_producto.descripcion,producto.observacion,producto.rut_funcionario,funcionario.nombre,funcionario.apellido,cargo.descripcion,tipo_funcionario.descripcion,obra.nombre,holding.descripcion FROM producto INNER JOIN tipo_producto on (tipo_producto.id = producto.tipo) INNER JOIN funcionario ON (funcionario.rut = producto.rut_funcionario) INNER JOIN cargo on (cargo.id = funcionario.cargo) INNER JOIN tipo_funcionario on (tipo_funcionario.id = funcionario.tipo) INNER JOIN obra ON (obra.id = funcionario.id_obra) INNER JOIN holding ON (holding.id = obra.holding) WHERE producto.estado = '1' AND funcionario.tipo='$tipo' ";
                }
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
                   <td><?php echo $array[$i][4] ?> <?php echo $array[$i][5] ?></td>
                   <td><?php echo $array[$i][6] ?></td>
                   <td><?php echo $array[$i][7] ?></td>
                   <td><?php echo $array[$i][8] ?></td>
                   <td><?php echo $array[$i][9] ?></td>
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
              <th>Rut Funcionario</th>
              <th>Nombre Funcionario</th>
              <th>Cargo Funcionario</th>
              <th>Sección</th>
              <th>Obra</th>
              <th>Holding</th>
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
