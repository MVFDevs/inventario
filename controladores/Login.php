<?php
include 'modelos/conexion.php';
/**
*
*/
class Login
{

  function validaLogin()
  {
    if(isset($_POST["user"]))
    {

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"] )&&
      preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]))
      {
        $user=$_POST["user"];
        $pass=decrypt($_POST["password"]);

        $sql= "SELECT * from usuarios where usuario ='$user' and pass ='$pass'";

        $respuesta = Consulta($sql);
         $row = mysqli_num_rows($respuesta);
          if ($row == 0) {
              echo "nada";
          }

          else{
              echo "algo";

          }
        if($respuesta)
        {
          session_start();
						$_SESSION["validar"] = true;
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["password"] = $respuesta["pass"];
						header("location:inicio");
        }
        else
        {
          header('location:../extend/alerta.php?msj=No se encuentra el usuario&c=salir&p=man&t=error');
        }
      }
    }
  }
  public static function decrypt ($input)
  {
    $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))), "\0");
    return $output;
  }

  function Consulta($query)
  {
    $ins = mysqli_query($con,$sql);
    return $ins;
    $con -> close();
    $ins -> close();
  }
}
?>
