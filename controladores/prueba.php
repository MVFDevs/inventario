<?php
$sql = "SELECT producto.codigo,tipo_producto.descripcion,producto.observacion,producto.rut_funcionario,funcionario.nombre,funcionario.apellido,cargo.descripcion,tipo_funcionario.descripcion,obra.nombre,holding.descripcion FROM producto INNER JOIN tipo_producto on (tipo_producto.id = producto.tipo) INNER JOIN funcionario ON (funcionario.rut = producto.rut_funcionario) INNER JOIN cargo on (cargo.id = funcionario.cargo) INNER JOIN tipo_funcionario on (tipo_funcionario.id = funcionario.tipo) INNER JOIN obra ON (obra.id = funcionario.id_obra) INNER JOIN holding ON (holding.id = obra.holding) WHERE producto.estado ='1'";
echo $sql;
////include '../modelos/conexion.php';
////$funcionario = $_POST["funcionario"];
////$productos = $_POST["productos"];
////echo $funcionario;
////echo "<br><br>";
////$productosCount = count($productos);
////echo $productosCount;
////for ($i=0; $i < $productosCount; $i++) {
////  echo $productos[$i];
////  echo "<br><br>";
//}

//$row = mysqli_num_rows($sel);
//if ($row == 0) {
//  $sql = "INSERT INTO funcionario(rut,nombre,apellido,cargo,tipo,correo,estado,fecha_nombramiento,id_obra) VALUES ('$rutCompleto','$nombre','$apellido','$cargo','$tipoFuncionario','$correo','$estado','$fNombramiento','$obra')";
//  $ins = mysqli_query($con,$sql);
//  if ($ins) {
//    echo "si";
//  }else {
//    echo "no";
//  }
//}else {
//  echo "no";
//}
 ?>
