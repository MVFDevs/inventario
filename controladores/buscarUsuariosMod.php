<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$datos = $conexion->query("SELECT id,nombre FROM usuario");
echo '<option value="" disbaled>Seleccione Usuario</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>'."\n";
}
 ?>
