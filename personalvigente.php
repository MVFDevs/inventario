<?php
include 'modelos/conexion.php';
session_start();
  $tipo = $_SESSION["tipo"];
?>
<body class="hold-transition skin-red sidebar-mini">
<div class"wrapper">
   <div class="box box-danger" >
        <div class="box-header">
          <h3 class="box-title">Inventario</h3>
        </div>
        <div class="box-body">
          <table id="datos" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Holding</th>
              <th>Obra</th>
              <th>Fecha de Termino</th>
              <th>Nombre Funcionario</th>
              <th>Rut Funcionario</th>
              <th>Cargo Funcionario</th>
              <th>Seccion</th>
              <th>Termino de Nombramiento</th>
              <?php
              if ($tipo == 4){?>
                <th>Editar</th>
                <?php   }?>
            </thead>
            <tbody>
            <?php
             if ($tipo == 4) {
                $sql = "SELECT hold.descripcion , obr.nombre,date_format(obr.fecha_termino, '%d/%m/%Y') , fun.nombre, fun.apellido, fun.rut, car.descripcion , tipofun.descripcion,date_format(fun.fecha_nombramiento, '%d/%m/%Y') FROM holding hold, obra obr, funcionario fun, cargo car, tipo_funcionario tipofun WHERE fun.estado= '0' and obr.estado='0' AND fun.id_obra= obr.id AND obr.holding = hold.id and car.id = fun.cargo and tipofun.id= fun.tipo order by fun.apellido ASC" ;
              }else {
                 $sql = "SELECT hold.descripcion , obr.nombre, obr.fecha_termino, fun.nombre, fun.apellido, fun.rut, car.descripcion , tipofun.descripcion,fun.fecha_nombramiento FROM holding hold, obra obr, funcionario fun, cargo car, tipo_funcionario tipofun WHERE fun.estado= '0' and obr.estado='0' AND fun.id_obra= obr.id AND obr.holding = hold.id and car.id = fun.cargo and tipofun.id= fun.tipo order by fun.apellido ASC AND funcionario.tipo='$tipo' ";
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
                  <td><?php echo $array[$i][3] ?> <?php echo $array[$i][4] ?></td>
                   <td><?php echo $array[$i][5] ?></td>
                   <td><?php echo $array[$i][6] ?></td>
                   <td><?php echo $array[$i][7] ?></td>
                   <td><?php echo $array[$i][8] ?></td>
                   <?php
                    if ($tipo == 4){?>
                      <td><a class"btn btn-app" href=""><i class="fa fa-edit"></i>
                      </a>
                      </td>
                      <?php   }?>
                        </tr>
                <?php
              }
             ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Holding</th>
              <th>Obra</th>
              <th>Fecha de Termino</th>
              <th>Nombre Funcionario</th>
              <th>Rut Funcionario</th>
              <th>Cargo Funcionario</th>
              <th>Seccion</th>
              <th>Termino de Nombramiento</th>
              <?php
              if ($tipo == 4){?>
                <th>Editar</th>
                <?php   }?>
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
</body>
