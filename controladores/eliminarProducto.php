<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$codigo = $_POST['codigo'];
$rut = "";
$up = $conexion->query("UPDATE producto SET rut_funcionario='000000000', estado='0' WHERE codigo='$codigo'");
 ?>
