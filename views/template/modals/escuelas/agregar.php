<!--Modal-->
<div class="modal fade" id="agregarEscuela" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Añadir nueva escuela</h1>
      </div>
      <form action="" id="formularioAgregarEscuela" name="formularioAgregarEscuela" method="POST">
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
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
