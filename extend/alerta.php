<?php include '../modelos/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Inventario</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
</head>
<body>
  <?php
  $mensaje = htmlentities($_GET['msj']);
  $c = htmlentities($_GET['c']);
  $p = htmlentities($_GET['p']);
  $t = htmlentities($_GET['t']);
  switch ($t) {
    case 'error':
      $titulo = "Ooopss...";
      break;
    case 'success':
      $titulo = "Buen trabajo";
      break;
  }
  switch ($c) {
    case 'us':
      $carpeta = '../usuarios/';
      break;
    case 'home':
      $carpeta = '../inicio/';
      break;
    case 'salir':
      $carpeta = '../';
      break;
    case 'pe':
      $carpeta = '../perfil/';
      break;
    case 'cli':
      $carpeta = '../clientes/';
      break;
    case 'prop':
      $carpeta = '../propiedades/';
      break;
  }
  switch ($p) {
    case 'in':
      $pagina = 'index.php';
      break;
    case 'home':
      $pagina = 'index.php';
      break;
    case 'salir':
      $pagina = '';
      break;
    case 'perfil':
      $pagina = 'perfil.php';
      break;
    case 'man':
      $pagina = 'mantenedor.php';
      break;
    case 'can':
      $pagina = 'cancelados.php';
      break;
    case 'lg':
        $pagina = 'login.php';
      break;
  }
  if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    $dir = $carpeta.$pagina.'?id='.$id;
  }else {
    $dir = $carpeta.$pagina;
  }

   ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.js"></script>
<script>
swal({
title: '<?php echo $titulo ?>',
text: "<?php echo $mensaje ?>",
type: '<?php echo $t ?>',
confirmButtonColor: '#3085d6',
confirmButtonText: 'Ok'
}).then(function () {
location.href='<?php echo $dir ?>';
});
$(document).click(function () {
  location.href='<?php echo $dir ?>';
});

$(document).keyup(function (e) {
  if (e.wich == 27) {
    location.href='<?php echo $dir ?>';
  }
});
</script>
</body>
</html>
