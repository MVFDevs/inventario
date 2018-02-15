<?php
if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
header("location:../index.php");
}else {
  header('location:extend/alerta.php?msj=Debe iniciar sesion con su cuenta&c=salir&p=lg&t=error');
}
 ?>
