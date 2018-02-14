<?php include '../modelos/conexion.php'; ?>
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Asignación de producto</h3>
  </div>
  <form role="form" method="post" action="controladores/prueba.php">
    <div class="box-body">
      <div class="form-group">
        <label>Funcionario</label>
        <select class="form-control select2" style="width: 100%;" required id="funcionario" name="funcionario">
          <?php
            $datos = mysqli_query($con,"SELECT rut,nombre,apellido FROM funcionario");
            foreach ($datos as $item) {
           ?>
          <option value="<?php echo $item['rut'] ?>"><?php echo $item['nombre'] ?> <?php echo $item['apellido'] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Productos a asignar</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecciona los productos"
        style="width: 100%;" name="productos[]">
        <?php
          $datos = mysqli_query($con,"SELECT producto.codigo , tipo_producto.descripcion FROM producto INNER JOIN tipo_producto ON tipo_producto.id = producto.tipo WHERE estado = '0'");
          foreach ($datos as $item) {
         ?>
        <option value="<?php echo $item['codigo'] ?>"><?php echo $item['codigo'] ?> - <?php echo $item['descripcion'] ?></option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</div>
<script type="text/javascript">
$(function () {
  $('.select2').select2()
})
</script>
