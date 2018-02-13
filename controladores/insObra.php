<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id='';
  $id_holding = htmlentities($_POST['holding']);
  $obra = htmlentities($_POST['nombreObra']);
  $fecha_inicio = htmlentities($_POST['fechaInicio']);
  $fecha_termino = htmlentities($_POST['fechaTermino']);
  $estado = 0;
  $fecha_inicio = strtotime($fecha_inicio);
  $fecha_termino = strtotime($fecha_termino);
  $fechaInicio = date('Y-m-d',$fecha_inicio);
  $fechaTermino = date('Y-m-d',$fecha_termino);
  $sel= $con->query("SELECT holding,nombre FROM obra WHERE holding='$id_holding' AND nombre='$obra'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $sql= "INSERT INTO obra (id, holding, nombre, fecha_inicio, fecha_termino, estado) VALUES ('$id','$id_holding','$obra','$fechaInicio','$fechaTermino','$estado')";
    $ins = mysqli_query($con,$sql);
    if ($ins) {
      header('location:../extend/alerta.php?msj=Obra Creada&c=salir&p=man&t=success');
    }else {
      header('location:../extend/alerta.php?msj=Obra no pudo ser registrada&c=salir&p=man&t=error');
    }
  }else {
    header('location:../extend/alerta.php?msj=Obra ya se encuentra creada&c=salir&p=man&t=error');
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}
?>
