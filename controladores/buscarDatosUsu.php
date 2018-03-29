<?php
  session_start();
  $conexion = mysqli_connect("localhost","root","","inventario");
  $id = $_POST["codigo"];
  $datosUsuario = $conexion->query("SELECT * FROM usuario WHERE id='$id'");
  if ($dUsu = $datosUsuario->fetch_assoc()) {}
  $pass = $_SESSION["pass"];
  $tipoUsu = $dUsu["tipo"];
  $nombre = $dUsu["nombre"];
  $funcionario = $dUsu["rut"];
  $estado = $dUsu["estado"];
  echo '<div class="box-body">
    <div class="form-group">
      <label for="Nombre">Tipo de usuario</label>
      <select class="form-control select2" style="width: 100%;" required name="tipoUsuario" id="tipoUsu">';
          $datos = $conexion->query("SELECT * FROM tipo_funcionario");
          $sel_tipo = $conexion->query("SELECT * FROM tipo_funcionario WHERE id='$tipoUsu'");
          if ($selTipo = $sel_tipo->fetch_assoc()) {}
          echo '<option value="'.$selTipo["id"].'" disbaled>'.$selTipo["descripcion"].'</option>';
          while($row = $datos->fetch_assoc()){
            echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>'."\n";
          }
          echo '
      </select>
      <div class="form-group">
        <label for="Nombre">Nombre de usuario</label>
        <input type="text" class="form-control" id="NombreUs" placeholder="Ingrese nombre de usuario" required name="NombreUsuario" value="'.$nombre.'">
      </div>
      <div class="form-group">
        <label for="Nombre">Contraseña de usuario</label>
        <input type="password" class="form-control" id="ContraUs" placeholder="Ingrese contraseña de usuario" required name="ContraUsuario" value="'.$pass.'">
      </div>
      <label for="Nombre">Funcionario</label>
      <select class="form-control select2" style="width: 100%;" required name="FunUsu" id="tipoUs">';
          $datos = $conexion->query("SELECT rut,nombre,apellido FROM funcionario");
          $sel_fun = $conexion->query("SELECT rut,nombre,apellido FROM funcionario WHERE rut='$funcionario'");
          if ($selFun = $sel_fun->fetch_assoc()) {}
          echo '<option value="'.$selFun["rut"].'" disbaled>'.$selFun["nombre"]." ".$selFun["apellido"].'</option>';
          while($row = $datos->fetch_assoc()){
            echo '<option value="'.$row["rut"].'">'.$row["nombre"]." ".$row["apellido"].'</option>'."\n";
          }
          echo '
      </select>
    </div>
  </div>
  <div class="form-group">
    <label >Estado</label>
    <select class="form-control" style="width: 100%;" required name="estadoUsuario">';
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
  </div>';
 ?>
 <script type="text/javascript">
 $('.select2').select2();
 </script>
