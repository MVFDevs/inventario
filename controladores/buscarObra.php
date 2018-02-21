<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$datos = $conexion->query("SELECT id,nombre FROM obra WHERE estado='0'");
echo '<option value="" disbaled>Seleccione Obra</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>'."\n";
}
 ?>
