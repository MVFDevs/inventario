<?php
require '../modelos/conexion.php';
if(isset($_POST["user"]))
{
  if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"] )&&
  preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]))
  {
    $pass_re = $_POST["password"];
    $user=$_POST["user"];
    $pass=decrypt($_POST["password"]);
    $sel=$con->query("SELECT id,tipo,nombre,pass,rut FROM usuario WHERE nombre='$user' AND pass='$pass' AND estado='0'");
    $row = mysqli_num_rows($sel);
    if ($row == 0) {
      header('location:../extend/alerta.php?msj=No se encuentra el usuario o usuario bloqueado&c=salir&p=lg&t=error');
    }
    else{
      session_start();
      foreach ($sel as $valor){
        $_SESSION["id"] = $valor["id"];
        $_SESSION["tipo"] = $valor["tipo"];
        $_SESSION["usuario"] = $valor["nombre"];
        $_SESSION["rut"] = $valor["rut"];
      }

      $_SESSION["pass"] = $pass_re;
      $rut = $_SESSION["rut"];
      $sel=$con->query("SELECT funcionario.nombre,funcionario.apellido,cargo.descripcion FROM usuario INNER JOIN funcionario ON funcionario.rut = usuario.rut INNER JOIN cargo ON cargo.id = funcionario.cargo WHERE usuario.rut ='$rut'");
      $row = mysqli_num_rows($sel);
      if ($row > 0) {
        foreach ($sel as $item) {
          $_SESSION["nombre"] = $item["nombre"]." ".$item["apellido"];
          $_SESSION["cargo"] = $item["descripcion"];
          }
        }
        $_SESSION["start"] = time();
        $_SESSION["expired"] = $_SESSION["start"] + (5 * 60);
      header("location:../index.php");
    }
  }
}
function decrypt ($input)
{
  $output = md5($input);
  return $output;
}
?>
