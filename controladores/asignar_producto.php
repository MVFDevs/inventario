<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $funcionario = $_POST["funcionario"];
  $productos = $_POST["productos"];
  foreach ($productos as $item) {
    $up = mysqli_query($con,"UPDATE producto SET rut_funcionario='$funcionario', estado ='1' WHERE codigo='$item'");
  }
  if ($up) {
    header('location:../extend/alerta.php?msj=Activos Asignados&c=salir&p=man&t=success');
  }else {
    header('location:../extend/alerta.php?msj=No se pudieron asignar los activos&c=salir&p=man&t=error');
  }
  $up->close();
  $con->close();
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}

 ?>
