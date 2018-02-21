<?php
$conexion = mysqli_connect("localhost","root","","inventario");
$rut = $_POST['rut'];
$datos = $conexion->query("SELECT producto.codigo , tipo_producto.descripcion FROM producto INNER JOIN tipo_producto ON tipo_producto.id = producto.tipo WHERE producto.rut_funcionario = '$rut'");
$row = mysqli_num_rows($datos);
$array = $datos->fetch_all();
for ($i=0; $i < $row ; $i++) {
  echo '<tr id=fila'.$i.' >
  <td>'.$array[$i][0].'</td>'."\n".'<td>'.$array[$i][1].'</td><td><button type="button" name="btn" class="eliminar" value="'.$array[$i][0].'"><i class="fa fa-trash"></i></button></td></tr>';
}
?>
<script type="text/javascript">
$(
  function () {
    $('.eliminar').click(function () {
      //Recogemos la id del contenedor padre
      var parent = $('.eliminar').parents('tr').attr('id');
      var codigo = $(this).val();
      swal({
        title: 'Estas seguro de eliminar el producto?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText:'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminalo!'
      }).then((result) => {
        if (result.value) {
          $.post( 'controladores/eliminarProducto.php', { codigo: codigo} ).done( function( respuesta )
          {
            $('#'+parent).remove();
          }),
          swal(
            'Eliminado!',
            '',
            'success'
          )
        }
      })



    }

  );
}
);
</script>
