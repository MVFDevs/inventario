<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$datos = $conexion->query("SELECT codigo FROM producto");
echo '<option value="" disbaled>Seleccione producto</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["codigo"].'">'.$row["codigo"].'</option>'."\n";
}
 ?>
