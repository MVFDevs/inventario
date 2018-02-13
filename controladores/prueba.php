<?php
include '../modelos/conexion.php';
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
$comprobacion = "SELECT nombre FROM obra WHERE nombre='$obra'";
$c = mysqli_query($con,$comprobacion);
if (!$c) {
  $sql= "INSERT INTO obra (id, holding, nombre, fecha_inicio, fecha_termino, estado) VALUES ('$id','$id_holding','$obra','$fechaInicio','$fechaTermino','$estado')";
  echo "Si";
}else {
  echo "no";
}
 ?>
