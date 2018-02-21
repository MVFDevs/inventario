<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$datos = $conexion->query("SELECT * FROM holding");
echo '<option value="" disbaled>Seleccione Holding</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["id"].'">'.$row["descripcion"].'</option>'."\n";
}
 ?>
