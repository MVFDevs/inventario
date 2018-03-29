<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id = '';
  $tipoUsuario = $_POST["tipoUs"];
  $nombreUsuario = $_POST["NombreUs"];
  $contra = md5($_POST["ContraUs"]);
  $funcionario = $_POST["FunEn"];
  $estado = 0;
  $sel= $con->query("SELECT usuario FROM usuario WHERE usuario='$nombreUsuario'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $ins = $con->query("INSERT INTO usuario VALUES('$id','$tipoUsuario','$nombreUsuario','$contra','$funcionario',$estado)");
    if ($ins) {
       header('location:../extend/alerta.php?msj=Usuario Registrado&c=salir&p=man&t=success');
    }else {
       header('location:../extend/alerta.php?msj=Usuario no pudo ser registrado&c=salir&p=man&t=error');
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
