<!--Modal-->
<div class="modal fade" id="agregarCliente" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Añadir nuevo cliente</h1>
      </div>
      <form action="" id="formularioAgregarCliente" name="formularioAgregarCliente" method="POST">
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label">DNI:</label>
            <input type="text" class="form-control" id="DNI" name="DNI">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Celular:</label>
            <input type="text" class="form-control" id="celular" name="celular">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Agregar</button>
      </div>
      </form>
    </div>
  </div>
</div>
