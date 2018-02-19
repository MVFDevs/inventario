<?php
include '../modelos/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $rut = htmlentities($_POST['rut']);
  $digito = htmlentities($_POST['digito']);
  $rutCompleto = $rut.$digito;
  $nombre = htmlentities($_POST['nombre']);
  $apellido = htmlentities($_POST['apellido']);
  $cargo = htmlentities($_POST['cargo']);
  $tipoFuncionario = htmlentities($_POST['tipoFuncionario']);
  $correo = htmlentities($_POST['correo']);
  $estado = 0;
  $nombramiento = htmlentities($_POST['nombramiento']);
  $nombramiento = strtotime($nombramiento);
  $fNombramiento = date('Y-m-d',$nombramiento);
  $obra = htmlentities($_POST['obra']);
  $sel=$con->query("SELECT rut FROM funcionario WHERE rut='$rutCompleto'");
  $row = mysqli_num_rows($sel);
  if ($row == 0) {
    $sql = "INSERT INTO funcionario(rut,nombre,apellido,cargo,tipo,correo,estado,fecha_nombramiento,id_obra) VALUES ('$rutCompleto','$nombre','$apellido','$cargo','$tipoFuncionario','$correo','$estado','$fNombramiento','$obra')";

    $ins = mysqli_query($con,$sql);
    if ($ins) {
    header('location:../extend/alerta.php?msj=Funcionario Creado&c=salir&p=man&t=success');
    }else {
    header('location:../extend/alerta.php?msj=Funcionario no pudo ser registrado&c=salir&p=man&t=error');
    }
  }else {
    header('location:../extend/alerta.php?msj=Funcionario ya se encuentra creado&c=salir&p=man&t=error');
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}
 ?>
