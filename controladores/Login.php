<?php
include '../modelos/conexion.php';
if(isset($_POST["user"]))
{
  if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"] )&&
  preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]))
  {
    $user=$_POST["user"];
    $pass=decrypt($_POST["password"]);
    $sel=$con->query("SELECT id,nombre,pass FROM usuario WHERE nombre='$user' AND pass='$pass'");
    $row = mysqli_num_rows($sel);
    if ($row == 0) {
      header('location:../extend/alerta.php?msj=No se encuentra el usuario&c=salir&p=lg&t=error');
    }
    else{
      session_start();
      foreach ($sel as $valor){
        $_SESSION["id"] = $valor["id"];
        $_SESSION["usuario"] = $valor["nombre"];
        $_SESSION["password"] = $valor["pass"];
      }
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
