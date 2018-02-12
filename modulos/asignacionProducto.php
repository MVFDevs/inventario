<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Asignación de producto</h3>
  </div>
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label>Funcionario</label>
        <select class="form-control select2" style="width: 100%;" required>
          <option>asdsad</option>
          <option>Prueba</option>
          <option>Pruebita</option>
          <option>Testeo</option>
          <option>Test</option>
          <option>Test</option>
          <option>Test</option>
        </select>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Holding</label>
          <input type="text" class="form-control"  disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Obra</label>
          <input type="text" class="form-control"  disabled>
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
})
</script>
