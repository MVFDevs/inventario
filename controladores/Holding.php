<?php
include 'modelos/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id = '';
  $descripcion = htmlentities($_POST['descripcion']);
  $ins = mysqli_query($con,"INSERT INTO holding values ($id,$descripcion)");
}
 ?>
