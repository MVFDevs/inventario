<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id = '';
  $descripcion = htmlentities($_POST['descripcion']);
  $sel= $con->query("SELECT descripcion FROM holding WHERE descripcion='$descripcion'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $sql= "INSERT INTO holding (id, descripcion) VALUES ('$id','$descripcion')";
    $ins = mysqli_query($con,$sql);
    if ($ins) {
       header('location:../extend/alerta.php?msj=Holding Registrado&c=salir&p=man&t=success');
    }else {
       header('location:../extend/alerta.php?msj=Holding no pudo ser registrado&c=salir&p=man&t=error');
    }
    $ins->close();
    $con->close();    
  }else {
    header('location:../extend/alerta.php?msj=Holding ya se encuentra creado&c=salir&p=man&t=error');
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}
?>
