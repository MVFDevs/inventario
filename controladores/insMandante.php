<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id = '';
  $rut = htmlentities($_POST['rut']);
  $digito = htmlentities($_POST['digito']);
  $rutCompleto = $rut.$digito;
  $razon = htmlentities($_POST["razon"]);
  $id_holding = htmlentities($_POST['holdingMandante']);
  $sel=$con->query("SELECT rut FROM mandante WHERE rut='$rutCompleto'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $sql = "INSERT INTO mandante VALUES('$id','$rutCompleto','$razon','$id_holding')";
    $ins = mysqli_query($con,$sql);
    if ($ins) {
    header('location:../extend/alerta.php?msj=Mandante Creado&c=salir&p=man&t=success');
    }else {
    header('location:../extend/alerta.php?msj=Mandante no pudo ser registrado&c=salir&p=man&t=error');
    }
  }else {
    header('location:../extend/alerta.php?msj=Mandante ya se encuentra creado&c=salir&p=man&t=error');
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}
 ?>
