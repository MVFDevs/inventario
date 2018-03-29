<?php
include '../modelos/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $tipo_mod = $_POST["tipo_mod"];
  switch ($tipo_mod) {
    case 'usuario':
    $idUsuario = htmlentities($_POST["UsuMod"]);
    $tipoUsuario = htmlentities($_POST["tipoUsuario"]);
    $nombreUsuario = htmlentities($_POST["NombreUsuario"]);
    $contraUsuario = md5(htmlentities($_POST["ContraUsuario"]));
    $funUsuario = htmlentities($_POST["FunUsu"]);
    $estadoUsuario = htmlentities($_POST["estadoUsuario"]);
    $ver = $con->query("SELECT id FROM usuario WHERE nombre='$nombreUsuario'");
    $rows = mysqli_num_rows($ver);
    if ($rows == 1) {
      header('location:../extend/alerta.php?msj=Ya Existe el nombre de usuario&c=salir&p=man&t=error');
    }else {
      $up = $con->query("UPDATE usuario SET tipo='$tipoUsuario', nombre='$nombreUsuario', pass='$contraUsuario', rut='$funUsuario', estado='$estadoUsuario' WHERE id='$idUsuario'");
      if ($up) {
        header('location:../extend/alerta.php?msj=Usuario actualizado&c=salir&p=man&t=success');
        session_start();
        $_SESSION["pass"] = $_POST["ContraUsuario"];
      }else {
        header('location:../extend/alerta.php?msj=No se pudo actualizar el usuario&c=salir&p=man&t=error');
      }
      $up->close();
      $con->close();
    }
    break;
    case 'obra':
    $codigoObra = htmlentities($_POST["codigo"]);
    $mandante = htmlentities($_POST["mandante"]);
    $nombreObra = htmlentities($_POST["nombreObra"]);
    $fecha_inicio = htmlentities($_POST["fechaInicio"]);
    $fecha_termino = htmlentities($_POST["fechaTermino"]);
    $fecha_inicio = strtotime($fecha_inicio);
    $fecha_termino = strtotime($fecha_termino);
    $fechaInicio = date('Y-m-d',$fecha_inicio);
    $fechaTermino = date('Y-m-d',$fecha_termino);
    $estado = htmlentities($_POST["estado"]);
    $up = $con->query("UPDATE obra SET id='$codigoObra',holding='$mandante',nombre='$nombreObra',fecha_inicio='$Fe$fechaInicio',fecha_termino='$fechaTermino',estado='$estado' WHERE id='$codigoObra'");
    if ($up) {
      header('location:../extend/alerta.php?msj=Obra actualizada&c=salir&p=man&t=success');
    }else {
      header('location:../extend/alerta.php?msj=No se pudo actualizar obra&c=salir&p=man&t=error');
    }
    $up->close();
    $con->close();
    break;
    case 'funcionario':
    $funcionario = htmlentities($_POST["funcionario"]);
    $rut = htmlentities($_POST['rut']);
    $digito = htmlentities($_POST['digito']);
    $rutCompleto = $rut.$digito;
    $nombre = htmlentities($_POST['nombre']);
    $apellido = htmlentities($_POST['apellido']);
    $cargo = htmlentities($_POST['cargo']);
    $tipoFuncionario = htmlentities($_POST['tipoFuncionario']);
    $correo = htmlentities($_POST['correo']);
    $estado = htmlentities($_POST['estado']);
    $nombramiento = htmlentities($_POST['nombramiento']);
    $nombramiento = strtotime($nombramiento);
    $fNombramiento = date('Y-m-d',$nombramiento);
    $obra = htmlentities($_POST['obra']);
    $supervisor = htmlentities($_POST['supervisor']);
    $up = $con->query("UPDATE funcionario SET rut='$rutCompleto',nombre='$nombre',apellido='$apellido',cargo='$cargo',tipo='$tipoFuncionario',correo='$correo',estado='$estado',fecha_nombramiento='$fNombramiento',id_obra='$obra',rut_supervisor='$supervisor' WHERE rut='$funcionario'");
    if ($up) {
      header('location:../extend/alerta.php?msj=Funcionario actualizado&c=salir&p=man&t=success');
    }else {
      header('location:../extend/alerta.php?msj=No se pudo actualizar el funcionario&c=salir&p=man&t=error');
    }
    $up->close();
    $con->close();
    break;
    case 'producto':
    $producto = htmlentities($_POST["producto"]);
    $codigo = htmlentities($_POST['codigo']);
    $tipo = htmlentities($_POST['tipoProducto']);
    $fecha_dep = htmlentities($_POST['depreciacion']);
    $fecha_dep = strtotime($fecha_dep);
    $fechaDep = date('Y-m-d',$fecha_dep);
    $observacion = htmlentities($_POST['observacion']);
    $estado = htmlentities($_POST['estado']);
    $up = $con->query("UPDATE producto SET codigo='$codigo',tipo='$tipo',fecha_dep='$fechaDep',observacion='$observacion', estado='$estado' WHERE codigo='$producto'");
    if ($up) {
      header('location:../extend/alerta.php?msj=Producto actualizado&c=salir&p=man&t=success');
    }else {
      header('location:../extend/alerta.php?msj=No se pudo actualizar el producto&c=salir&p=man&t=error');
    }
    $up->close();
    $con->close();
    break;
    default:
    # code...
    break;
  }
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=man&t=error');
}

?>
