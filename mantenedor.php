<?php include 'modulos/head.php'; ?>
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
              <form role="form" method="post" action="controladores/Holding.php">
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
            <!-- ========================================== -->
            <!-- Formulario Obra -->
            <!-- ========================================== -->
          </div>
          <div class="box box-danger collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Obra</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label>Holding</label>
                    <select class="form-control select2" style="width: 100%;" required>
                      <option>asdasd</option>
                      <option>Prueba</option>
                      <option>Pruebita</option>
                      <option>Testeo</option>
                      <option>Test</option>
                      <option>Test</option>
                      <option>Test</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre de Obra</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de obra" required>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Fecha de inicio:</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="inicio" required>
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
                        <input type="text" class="form-control pull-right" id="termino" required>
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
              <form role="form">
                <div class="box-body">
                  <div class="col-md-12">
                    <div class="col-md-6 col-xs-8">
                      <div class="form-group">
                        <label for="rut">Rut</label>
                        <input type="text" class="form-control" id="rut" placeholder="Ingrese rut del funcionario" required pattern="[0-9]{7,8}" title="Ingresa un rut valido" maxlength="8">
                      </div>
                    </div>
                    <div class="col-md-1 col-xs-4">
                      <div class="form-group">
                        <label for="digito" > </label>
                        <input type="text" name="" required pattern="[0-9kK]{1}" title="Ingrese un valor correcto" id="digito" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Nombre" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cargo</label>
                        <select class="form-control" required>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tipo de funcionario</label>
                        <select class="form-control" required>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingrese el correo" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha de nombramiento:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="nombramiento" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Obra</label>
                      <select class="form-control select2" style="width: 100%;" required>
                        <option>asdsad</option>
                        <option>Prueba</option>
                        <option>Pruebita</option>
                        <option>Testeo</option>
                        <option>Test</option>
                        <option>Test</option>
                        <option>Test</option>
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
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control" id="codigo" placeholder="Ingrese código de producto" required>
                  </div>
                  <div class="form-group">
                    <label>Fecha de depreciación:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="depreciacion" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Observación</label>
                    <textarea class="form-control" rows="3" placeholder="Introduzca información necesario"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Funcionario</label>
                    <select class="form-control select2" style="width: 100%;" required>
                      <option>asdsad</option>
                      <option>Prueba</option>
                      <option>Pruebita</option>
                      <option>Testeo</option>
                      <option>Test</option>
                      <option>Test</option>
                      <option>Test</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tipo de producto</label>
                    <select class="form-control" required>
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php include 'modulos/footer.php'; ?>
  </div>
  <?php include 'modulos/scripts.php'; ?>
  <script type="text/javascript">
  $(function () {
    $('.select2').select2()
    $('#inicio').datepicker({
      autoclose: true
    })
    $('#termino').datepicker({
      autoclose: true
    })
    $('#nombramiento').datepicker({
      autoclose: true
    })
    $('#depreciacion').datepicker({
      autoclose: true
    })
  })
</script>
</body>
</html>
