<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$rut = $_POST["rut"];
$datos_fun = $conexion->query("SELECT * from funcionario WHERE rut='$rut'");
if ($d_fun = $datos_fun->fetch_assoc()) {}
$newRut = substr($d_fun["rut"],0,-1);
$digito = substr($d_fun["rut"],-1);
$fecha_nombra = new DateTime($d_fun["fecha_nombramiento"]);
$new_nombra = $fecha_nombra->format('d-m-Y');
$estado = $d_fun["estado"];
  //Buscar nombre cargo
$cargo = $d_fun["cargo"];
$sel_car = $conexion->query("SELECT * FROM cargo WHERE id='$cargo'");
if ($d_car = $sel_car->fetch_assoc()) {}
//Buscar nombre tipo funcionario
$tipo_fun = $d_fun["tipo"];
$sel_tipo = $conexion->query("SELECT * FROM tipo_funcionario WHERE id='$tipo_fun'");
if ($d_tipo = $sel_tipo->fetch_assoc()) {}
// Buscar nombre obra
$idObra = $d_fun["id_obra"];
$sel_obra = $conexion->query("SELECT id,nombre FROM obra WHERE id='$idObra'");
if ($d_obra = $sel_obra->fetch_assoc()) {}

echo '
<div class="col-md-12">
  <div class="col-md-6 col-xs-8">
    <div class="form-group">
      <label for="rut">Rut</label>
      <input type="text" class="form-control" value="'.$newRut.'" id="rut" placeholder="Ingrese rut del funcionario" required pattern="[0-9]{7,8}" title="Ingresa un rut valido" maxlength="8" name="rut">
    </div>
  </div>
  <div class="col-md-1 col-xs-4">
    <div class="form-group">
      <label for="digito" > </label>
      <input type="text" value="'.$digito.'" required pattern="[0-9kK]{1}" title="Ingrese un valor correcto" id="digito" class="form-control" name="digito" maxlength="1">
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" value="'.$d_fun["nombre"].'" id="nombre" placeholder="Nombre" required name="nombre">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" value="'.$d_fun["apellido"].'" id="apellido" placeholder="Apellido" required name="apellido">
    </div>
  </div>
</div>';
echo '
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label>Cargo</label>
      <select class="form-control" required name="cargo">';
      echo '
      <option value="'.$d_car["id"].' ">'.$d_car["descripcion"].'</option>
      ';
      $sele_car = $conexion->query("SELECT * FROM cargo");
      while($datos_car = $sele_car->fetch_assoc()){
        echo '<option value="'.$datos_car["id"].'">'.$datos_car["descripcion"].'</option>'."\n";
      }
      echo '
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Tipo de funcionario</label>
      <select class="form-control" required name="tipoFuncionario">';
      echo '
      <option value="'.$d_tipo["id"].' ">'.$d_tipo["descripcion"].'</option>
      ';
      $sele_tipo = $conexion->query("SELECT * FROM tipo_funcionario");
      while($datos_tipo = $sele_tipo->fetch_assoc()){
        echo '<option value="'.$datos_tipo["id"].'">'.$datos_tipo["descripcion"].'</option>'."\n";
      }
        echo '
      </select>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label for="email">Correo</label>
      <input type="email" class="form-control" value="'.$d_fun["correo"].'" id="email" placeholder="Ingrese el correo" required name="correo">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Fecha de nombramiento:</label>
      <div class="input-group date">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" value="'.$new_nombra.'" id="nombramientoMod" required name="nombramiento">
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
<div class="col-md-6">
<div class="form-group">
  <label>Obra</label>
  <select class="form-control select2" style="width: 100%;" required name="obra">';
  echo '
  <option value="'.$d_obra["id"].' ">'.$d_obra["nombre"].'</option>
  ';
  $sele_obra = $conexion->query("SELECT obra.id,obra.nombre,holding.descripcion FROM obra INNER JOIN holding on obra.holding = holding.id WHERE obra.estado = '0'");
  while($datos_obra = $sele_obra->fetch_assoc()){
    echo '<option value="'.$datos_obra["id"].'">'.$datos_obra["nombre"]." / ".$datos_obra["descripcion"].'</option>'."\n";
  }
  echo'
  </select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label >Estado</label>
  <select class="form-control" style="width: 100%;" required name="estado">';
  if ($estado == 0) {
    echo '<option value="0" selected>Activo</option>';
    echo '<option value="1">Desactivado</option>';
  }else {
    echo '<option value="0">Activo</option>';
    echo '<option value="1" selected>Desactivado</option>';
  }
  echo '
  </select>
</div>
</div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>
  ';
 ?>
 <script type="text/javascript">
 $('.select2').select2()
 $('#nombramientoMod').datepicker({
   autoclose: true,
   language: 'es'
 })
 </script>
