<!--Modal-->
<div class="modal fade" id="editarUniversidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Actualizar una universidad</h1>
      </div>
      <form action="" id="formularioActualizarUniversidad" name="formularioActualizarUniversidad" method="POST">
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_u" name="nombre_u">
            <input type="text" class="form-control" id="id_u" name="id_u" hidden>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="actualizarDatos();" type="submit" class="btn btn-success" id="actualizar_universidad" name="actualizar_universidad">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
