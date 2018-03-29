<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$codigo = $_POST['codigo'];
$datos_prod = $conexion->query("SELECT * FROM producto WHERE codigo='$codigo'");
if ($d_prod = $datos_prod->fetch_assoc()) {}
$codigo = $d_prod["codigo"];
$fecha_depre = new DateTime($d_prod["fecha_dep"]);
$newDepre = $fecha_depre->format('d-m-Y');
$obs = $d_prod["observacion"];
$tipo = $d_prod["tipo"];
$estado = $d_prod["estado"];
$tipos_prod = $conexion->query("SELECT * FROM tipo_producto WHERE id='$tipo'");
if ($tipos = $tipos_prod->fetch_assoc()) {}

echo '
<div class="form-group">
  <label for="codigo">Código</label>
  <input type="text" class="form-control" id="codigo" placeholder="Ingrese código de producto" value="'.$codigo.'" required name="codigo">
</div>
<div class="form-group">
  <label>Fecha de depreciación:</label>
  <div class="input-group date">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
    <input type="text" class="form-control pull-right" id="depreciacionMod" value="'.$newDepre.'" required name="depreciacion">
  </div>
</div>
<div class="form-group">
  <label>Observación</label>
  <textarea class="form-control" rows="3" placeholder="Introduzca información necesaria" name="observacion">'.$obs.'</textarea>
</div>
<div class="form-group">
  <label>Tipo de producto</label>
  <select class="form-control" name="tipoProducto">';
  echo '<option value="'.$tipos["id"].'">'.$tipos["descripcion"].'</option>';
  $sel_tipo = $conexion->query("SELECT * FROM tipo_producto");
  while($datos_tipo = $sel_tipo->fetch_assoc()){
    echo '<option value="'.$datos_tipo["id"].'">'.$datos_tipo["descripcion"].'</option>'."\n";
  }
  echo '
  </select>
</div>
</div>
  <div class="form-group">
    <label >Estado</label>
    <select class="form-control" style="width: 100%;" required name="estado">
    ';
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
<div class="box-footer">
<button type="submit" class="btn btn-primary">Enviar</button>
</div>
';
 ?>
<script type="text/javascript">
$('#depreciacionMod').datepicker({
  autoclose: true,
  language: 'es',
  startDate: "+0d"
})
</script>
