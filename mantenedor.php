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
          <div class="box box-danger collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Inserción de datos</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <!-- ========================================== -->
              <!-- Formulario Usuario -->
              <!-- ========================================== -->

              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuarios</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insUsuario.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="Nombre">Tipo de usuario</label>
                        <select class="form-control select2" style="width: 100%;" required name="tipoUs" id="tipoUsu">
                          <?php
                            $datos = $con->query("SELECT * FROM tipo_funcionario");
                            echo '<option value="" disbaled>Seleccione Tipo de usuario</option>';
                            while($row = $datos->fetch_assoc()){
                              echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>'."\n";
                            }
                            ?>
                        </select>
                        <div class="form-group">
                          <label for="Nombre">Nombre de usuario</label>
                          <input type="text" class="form-control" id="NombreUs" placeholder="Ingrese nombre de usuario" required name="NombreUs" value="">
                        </div>
                        <div class="form-group">
                          <label for="Nombre">Contraseña de usuario</label>
                          <input type="password" class="form-control" id="ContraUs" placeholder="Ingrese contraseña de usuario" required name="ContraUs" value="">
                        </div>
                        <label for="Nombre">Funcionario</label>
                        <select class="form-control select2" style="width: 100%;" required name="FunEn" id="tipoUs">
                          <?php
                            $datos = $con->query("SELECT rut,nombre,apellido FROM funcionario WHERE not estado=1");
                            echo '<option value="" disbaled>Seleccione Funcionario</option>';
                            while($row = $datos->fetch_assoc()){
                              echo '<option value="'.$row["rut"].'">'.$row["nombre"]." ".$row["apellido"].'</option>'."\n";
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- ========================================== -->
              <!-- Formulario Holding -->
              <!-- ========================================== -->

              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Holding</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insHolding.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="Nombre">Nombre de Holding</label>
                        <input type="text" class="form-control" id="NombreHold" placeholder="Ingrese nombre de holding" required name="descripcion" value="">
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- ========================================== -->
              <!-- Formulario Mandante -->
              <!-- ========================================== -->
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Mandante</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insMandante.php">
                    <div class="box-body">
                      <div class="col-md-12">
                        <div class="col-md-6 col-xs-8">
                          <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" id="rutMan" placeholder="Ingrese rut del mandante" required pattern="[0-9]{8,9}" title="Ingresa un rut valido" maxlength="9" name="rut">
                          </div>
                        </div>
                        <div class="col-md-1 col-xs-4">
                          <div class="form-group">
                            <label for="digito" > </label>
                            <input type="text" required pattern="[0-9kK]{1}" title="Ingrese un valor correcto" id="digitoMan" class="form-control" name="digito" maxlength="1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="razon">Razón Social</label>
                            <input type="text" class="form-control" id="razon" placeholder="Ingrese la razón social" required name="razon" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Holding</label>
                            <select class="form-control select2" style="width: 100%;" required name="holdingMandante" id="holdingMandante">
                              <option value="">Seleccione Holding</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- ========================================== -->
              <!-- Formulario Obra -->
              <!-- ========================================== -->
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Obra</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insObra.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Holding</label>
                        <select class="form-control select2" style="width: 100%;" required name="holdingObra" id="holdingObra">
                          <option value="0">Seleccione Holding</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Mandante</label>
                        <select class="form-control select2" style="width: 100%;" required name="mandante" id="mandante">
                          <option value="0">Seleccione Mandante</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nombre">Nombre de Obra</label>
                        <input type="text" class="form-control" id="nombreObr" placeholder="Ingrese nombre de obra" required name="nombreObra">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha de inicio:</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="inicio" required name="fechaInicio">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fecha de termino:</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="termino" required name="fechaTermino">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
                <!-- ========================================== -->
                <!-- Formulario Funcionario -->
                <!-- ========================================== -->
              </div>
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Funcionario</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insFuncionario.php">
                    <div class="box-body">
                      <div class="col-md-12">
                        <div class="col-md-6 col-xs-8">
                          <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" id="rutFun" placeholder="Ingrese rut del funcionario" required pattern="[0-9]{7,8}" title="Ingresa un rut valido" maxlength="8" name="rut">
                          </div>
                        </div>
                        <div class="col-md-1 col-xs-4">
                          <div class="form-group">
                            <label for="digito" > </label>
                            <input type="text" required pattern="[0-9kK]{1}" title="Ingrese un valor correcto" id="digito" class="form-control" name="digito" maxlength="1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombreFun" placeholder="Nombre" required name="nombre">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido" required name="apellido">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Cargo</label>
                            <select class="form-control" required name="cargo">
                              <?php
                                $datos = mysqli_query($con,"SELECT * FROM cargo");
                                foreach ($datos as $item) {
                               ?>
                              <option value="<?php echo $item['id'] ?>"><?php echo $item['descripcion'] ?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tipo de funcionario</label>
                            <select class="form-control" required name="tipoFuncionario">
                              <?php
                                $datos = mysqli_query($con,"SELECT * FROM tipo_funcionario");
                                foreach ($datos as $item) {
                               ?>
                              <option value="<?php echo $item['id'] ?>"><?php echo $item['descripcion'] ?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingrese el correo" required name="correo">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Fecha de nombramiento:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="nombramiento" required name="nombramiento">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Supervisor</label>
                          <select class="form-control select2" style="width: 100%;" required name="supervisor">
                            <?php
                              $datos = mysqli_query($con,"SELECT * FROM supervisor");
                              foreach ($datos as $item) {
                             ?>
                            <option value="<?php echo $item['rut'] ?>"><?php echo $item['nombre'] ?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Obra</label>
                          <select class="form-control select2" style="width: 100%;" required name="obra">
                            <?php
                              $datos = mysqli_query($con,"SELECT obra.id,obra.nombre,holding.descripcion FROM obra INNER JOIN holding on obra.holding = holding.id WHERE obra.estado = '0'");
                              foreach ($datos as $item) {
                             ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['nombre'] ?> / <?php echo $item['descripcion'] ?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- ========================================== -->
              <!-- Formulario Producto -->
              <!-- ========================================== -->
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Producto</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="controladores/insProducto.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Ingrese código de producto" required name="codigo">
                      </div>
                      <div class="form-group">
                        <label>Fecha de depreciación:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="depreciacion" required name="depreciacion">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Observación</label>
                        <textarea class="form-control" rows="3" placeholder="Introduzca información necesario" name="observacion"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control pull-right" name="funcionario" value="000000000" style="visibility:hidden">
                      </div>
                      <div class="form-group">
                        <label>Tipo de producto</label>
                        <select class="form-control" required name="tipoProducto">
                          <?php
                            $datos = mysqli_query($con,"SELECT * FROM tipo_producto");
                            foreach ($datos as $item) {
                           ?>
                          <option value="<?php echo $item['id'] ?>"><?php echo $item['descripcion'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ===================================================================================================== -->
          <!-- ============================== Modificaciones de datos ============================================== -->
          <!-- ===================================================================================================== -->
          <div class="box box-danger collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Modificación de datos</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <!-- ========================================== -->
              <!-- Formulario Modificación Usuario -->
              <!-- ========================================== -->
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuario</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" action="controladores/actualizarDatos.php" method="post">
                    <select class="form-control select2" style="width: 100%;" name="UsuMod" id="UsuMod" required  >
                      <option value="">Seleccione Usuario</option>
                    </select>
                    <div class="form-group">
                      <input type="text" class="form-control pull-right" name="tipo_mod" value="usuario" style="visibility:hidden">
                    </div>
                    <div id="formularioUSuario">
                    </div>
                  </form>
              </div>
            </div>
              <!-- ========================================== -->
              <!-- Formulario Modificación Obra -->
              <!-- ========================================== -->
              <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Obra</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <form role="form" action="controladores/actualizarDatos.php" method="post">
                    <select class="form-control select2" style="width: 100%;" required name="codigo" id="ObraMod">
                      <option value="">Seleccione Obra</option>
                    </select>
                    <div class="form-group">
                      <input type="text" class="form-control pull-right" name="tipo_mod" value="obra" style="visibility:hidden">
                    </div>
                    <div id="formularioObra">
                    </div>
                  </form>
              </div>
            </div>
            <!-- ========================================== -->
            <!-- Formulario Modificación Funcionario -->
            <!-- ========================================== -->
            <div class="box box-danger collapsed-box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Funcionario</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <form role="form" action="controladores/actualizarDatos.php" method="post">
                  <div class="form-group">
                    <label>Funcionario</label>
                    <select class="form-control select2" style="width: 100%;" required id="funcionarioMod" name="funcionario">
                      <option value="">Seleccione Funcionario</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control pull-right" name="tipo_mod" value="funcionario" style="visibility:hidden">
                  </div>
                  <div id="formularioFuncionario">
                  </div>
                </form>
            </div>
          </div>
          <!-- ========================================== -->
          <!-- Formulario Modificación Producto -->
          <!-- ========================================== -->
          <div class="box box-danger collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Producto</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <form role="form" action="controladores/actualizarDatos.php" method="post">
                <div class="form-group">
                  <label>Producto</label>
                  <select class="form-control select2" style="width: 100%;" required id="producto" name="producto">
                    <option value="">Seleccione Producto</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control pull-right" name="tipo_mod" value="producto" style="visibility:hidden">
                </div>
                <div id="formularioProducto">
                </div>
              </form>
          </div>
        </div>
          </div><!-- FIN DIV BODY COLLAPSE -->
        </div><!-- FIN SECCIÓN DE MODIFICACIÓN DE DATOS -->
        </div>
        </section>
    </div>
    <?php include_once 'modulos/footer.php'; ?>
  </div>
  <?php include_once 'modulos/scripts.php'; ?>
<script type="text/javascript">
  $.fn.datepicker.dates['es'] = {
  days: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
  daysShort: [ "Dom", "Lun", "Mar", "Mier", "Jue", "Vier", "Sab" ],
  daysMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
  months: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
  monthsShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
  today: "Hoy",
  clear: "Limpiar",
  format: "dd-mm-yyyy",
  titleFormat: "MM yyyy",
  weekStart: 1
};
  $(function () {
    $('.select2').select2()
    $('#inicio').datepicker({
      language: 'es',
      autoclose: true,
      startDate: "+0d"
    })
    $('#termino').datepicker({
      autoclose: true,
      language: 'es',
      startDate: "+0d"
    })
    $('#nombramiento').datepicker({
      autoclose: true,
      language: 'es',
      startDate: "+0d"
    })
    $('#depreciacion').datepicker({
      autoclose: true,
      language: 'es',
      startDate: "+0d"
    })
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
</body>
</html>
