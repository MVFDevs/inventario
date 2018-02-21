<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$id_obra = $_POST["id"];
$datos = $conexion->query("SELECT id,holding,nombre,fecha_inicio,fecha_termino,estado FROM obra WHERE id='$id_obra'");
if($row = $datos->fetch_assoc()){}
$holding = $row["holding"];
$estado = $row["estado"];
$sel_man = $conexion->query("SELECT id,razon_social FROM mandante WHERE id='$holding'");
if ($mandante = $sel_man->fetch_assoc()) {}
$fecha_inicio = new DateTime($row['fecha_inicio']);
$new_inicio = $fecha_inicio->format('d-m-Y');
$fecha_termino = new DateTime($row['fecha_termino']);
$new_termino = $fecha_termino->format('d-m-Y');
  echo '
  <div class="box-body">
    <div class="form-group">
      <label>Mandante</label>
      <select class="form-control select2" style="width: 100%;" required name="mandante" id="asd">';
      echo '
        <option value="'.$mandante["id"].'">'.$mandante["razon_social"].'</option>';
        $datos_man = $conexion->query("SELECT id,razon_social FROM mandante");
        while($d_man = $datos_man->fetch_assoc()){
          echo '<option value="'.$d_man["id"].'">'.$d_man["razon_social"].'</option>'."\n";
        }
        echo '
      </select>
    </div>
    <div class="form-group">
      <label for="nombre">Nombre de Obra</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de obra" required name="nombreObra" value="'.$row["nombre"].'">
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Fecha de inicio:</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="inicioMod" required name="fechaInicio" value="'.$new_inicio.'">
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
          <input type="text" class="form-control pull-right" id="terminoMod" required name="fechaTermino" value="'.$new_termino.'">
        </div>
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
 $('#inicioMod').datepicker({
   language: 'es',
   autoclose: true
 })
 $('#terminoMod').datepicker({
   autoclose: true,
   language: 'es',
   startDate: "+0d"
 })
 </script>
