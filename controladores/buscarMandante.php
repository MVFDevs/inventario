<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$holding = $_POST['holding'];
$datos = $conexion->query("SELECT id,razon_social FROM mandante WHERE holding='$holding'");
echo '<option value="" disbaled>Seleccione Mandante</option>';
while($row = $datos->fetch_assoc()){
  echo '<option value="'.$row["id"].'">'.$row["razon_social"].'</option>'."\n";
}
 ?>
