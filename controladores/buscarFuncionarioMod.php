<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$datos = $conexion->query("SELECT rut,nombre,apellido FROM funcionario");
echo '<option value="" disbaled>Seleccione Funcionario</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["rut"].'">'.$row["nombre"].' '.$row["apellido"].'</option>'."\n";
}
 ?>
