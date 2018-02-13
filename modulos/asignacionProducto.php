<?php include '../modelos/conexion.php'; ?>
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Asignación de producto</h3>
  </div>
  <form role="form">
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
      <div class="col-md-6">
        <div class="form-group">
          <label>Holding</label>
          <input type="text" class="form-control"  disabled name="holding" id="holding">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Obra</label>
          <input type="text" class="form-control"  disabled name="obra" id="obra">
        </div>
      </div>
      <div class="form-group">
        <label>Productos a asignar</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecciona los productos"
        style="width: 100%;">
        <option>IMP</option>
        <option>PC</option>
        <option>NBK</option>
        <option>PRO</option>
        <option>CAM</option>
        <option>EQ</option>
        <option>TEL</option>
      </select>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Asignar</button>
  </div>
</form>
</div>
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
$(document).ready(function(){
   $("#marca").change(function () {
           $("#marca option:selected").each(function () {
            elegido=$(this).val();
            $.post("controladores/buscarDatos.php", { elegido: elegido }, function(data){
            $("#obra").html(data);
            });
            $.post("controladores/buscarDatos.php", { elegido: elegido }, function(data){
            $("#holding").html(data);
            });
        });
   })
});
</script>
