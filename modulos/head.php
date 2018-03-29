<?php
//$now = time();
//if ($now > $_SESSION["expired"]) {
//  header('location:extend/alerta.php?msj=Sesion caducada, vuelva a iniciar sesion&c=salir&p=lg&t=error');
//}
session_start();
if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventario</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <link rel="stylesheet" href="css/custom.css"/> -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/jquery.jOrgChart.css"/> -->
  <link rel="stylesheet" href="css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/skins/skin-red.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">

</head>
<?php }else {
  header('location:extend/alerta.php?msj=Debe iniciar sesion con su cuenta&c=salir&p=lg&t=error');
} ?>
