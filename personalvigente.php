<?php include 'modulos/head.php';
  include 'modelos/conexion.php';
  $tipo =$_SESSION["tipo"];
?>
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <?php include 'modulos/header.php'; ?>
    <?php include 'modulos/menu.php'; ?>>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Inventario
          <small>Sección Inventario</small>
        </h1>        
      </section>
      <section class="content container-fluid">
        <div id="paginas">
          <div class="box box-danger" >
               <div class="box-header">
                 <h3 class="box-title">Personal Vigente</h3>
               </div>
               <div class="box-body">
                 <table id="datos" class="table table-bordered table-striped display ">
                   <thead>
                   <tr>
                     <th>Holding</th>
                     <th>Obra</th>
                     <th>Fecha de Termino</th>
                     <th>Nombre Funcionario</th>
                     <th>Rut Funcionario</th>
                     <th>Cargo Funcionario</th>
                     <th>Seccion</th>
                     <th>Fin Nombramiento</th>
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
                        $sql = "SELECT hold.descripcion , obr.nombre,date_format(obr.fecha_termino, '%d/%m/%Y') , fun.nombre, fun.apellido, fun.rut, car.descripcion , tipofun.descripcion,date_format(fun.fecha_nombramiento, '%d/%m/%Y') FROM holding hold, obra obr, funcionario fun, cargo car, tipo_funcionario tipofun WHERE fun.estado= '0' and obr.estado='0' AND fun.id_obra= obr.id AND obr.holding = hold.id and car.id = fun.cargo and tipofun.id= fun.tipo AND tipo='$tipo' order by fun.apellido ASC " ;
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
                             <td><button class"" href=""><i class="fa fa-edit"></i></button>
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
                     <th>Fin Nombramiento</th>
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
        </div>
        </section>
    </div>
    <?php include 'modulos/footer.php'; ?>
  </div>
  <?php include 'modulos/scripts.php'; ?>
  <script>
    $(document).ready(function () {
      $('#datos').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : true,
        "language": {
            "url": "js/espanol.json"
        },
        dom: 'Bfrtip',
        buttons: [
          {
               extend: 'excelHtml5',
               title: 'Personal Vigente',
               exportOptions: {
                  columns: ':visible'
              }
           },
           {
               extend: 'pdfHtml5',
               title: 'Personal Vigente',
               orientation: 'landscape',
               exportOptions: {
                    columns: ':visible'
                }
           },
           {
             extend: 'colvis',
             text: 'Visibilidad de columnas'
           }

        ]
      });
    })


  </script>

  </body>
  </html>
