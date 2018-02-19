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
                        <input type="text" class="form-control" id="Nombre" placeholder="Ingrese nombre de holding" required name="descripcion" value="">
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
                            <input type="text" class="form-control" id="rut" placeholder="Ingrese rut del funcionario" required pattern="[0-9]{8,9}" title="Ingresa un rut valido" maxlength="9" name="rut">
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
                            <select class="form-control select2" style="width: 100%;" required name="holding">
                              <?php
                                $datos = mysqli_query($con,"SELECT * FROM holding");
                                foreach ($datos as $item) {
                               ?>
                              <option value="<?php echo $item['id'] ?>"><?php echo $item['descripcion'] ?></option>
                            <?php } ?>
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
                        <select class="form-control select2" style="width: 100%;" required name="holding">
                          <?php
                            $datos = mysqli_query($con,"SELECT * FROM holding");
                            foreach ($datos as $item) {
                           ?>
                          <option value="<?php echo $item['id'] ?>"><?php echo $item['descripcion'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nombre">Nombre de Obra</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de obra" required name="nombreObra">
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
                            <input type="text" class="form-control" id="rut" placeholder="Ingrese rut del funcionario" required pattern="[0-9]{7,8}" title="Ingresa un rut valido" maxlength="8" name="rut">
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
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" required name="nombre">
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

        </div>
        </section>
    </div>
    <?php include 'modulos/footer.php'; ?>
  </div>
  <?php include 'modulos/scripts.php'; ?>
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
</body>
</html>
