<?php
include '../modelos/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $tipo_mod = $_POST["tipo_mod"];
  switch ($tipo_mod) {
    case 'obra':
      $codigoObra = htmlentities($_POST["codigo"]);
      $mandante = htmlentities($_POST["mandante"]);
      $nombreObra = htmlentities($_POST["nombreObra"]);
      $fecha_inicio = htmlentities($_POST["fechaInicio"]);
      $fecha_termino = htmlentities($_POST["fechaTermino"]);
      $fecha_inicio = strtotime($fecha_inicio);
      $fecha_termino = strtotime($fecha_termino);
      $fechaInicio = date('Y-m-d',$fecha_inicio);
      $fechaTermino = date('Y-m-d',$fecha_termino);
      $estado = htmlentities($_POST["estado"]);
      $up = $con->query("UPDATE obra SET id='$codigoObra',holding='$mandante',nombre='$nombreObra',fecha_inicio='$Fe$fechaInicio',fecha_termino='$fechaTermino',estado='$estado' WHERE id='$codigoObra'");
      if ($up) {
        header('location:../extend/alerta.php?msj=Obra actualizada&c=salir&p=man&t=success');
      }else {
        header('location:../extend/alerta.php?msj=No se pudo actualizar obra&c=salir&p=man&t=error');
      }
      
      break;
    case 'funcionario':
      # code...
      break;
    case 'producto':
      # code...
      break;
    default:
      # code...
      break;
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}

 ?>
