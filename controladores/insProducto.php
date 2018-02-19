<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $codigo = htmlentities($_POST['codigo']);
  $tipo = htmlentities($_POST['tipoProducto']);
  $fecha_dep = htmlentities($_POST['depreciacion']);
  $fecha_dep = strtotime($fecha_dep);
  $fechaDep = date('Y-m-d',$fecha_dep);
  $observacion = htmlentities($_POST['observacion']);
  $rut_funcionario = htmlentities($_POST['funcionario']);
  $estado = 0;
  $sel=$con->query("SELECT codigo FROM producto WHERE codigo='$codigo'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $sql = "INSERT INTO producto(codigo,tipo,fecha_dep,observacion,rut_funcionario,estado) VALUES ('$codigo','$tipo','$fechaDep','$observacion','$rut_funcionario','$estado')";
    $ins = mysqli_query($con,$sql);
    if ($ins) {
      header('location:../extend/alerta.php?msj=Producto Creado&c=salir&p=man&t=success');
    }else {
      header('location:../extend/alerta.php?msj=Producto no pudo ser registrado&c=salir&p=man&t=error');
    }
  }else {
    header('location:../extend/alerta.php?msj=Producto ya se encuentra creado&c=salir&p=man&t=error');
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}
 ?>
