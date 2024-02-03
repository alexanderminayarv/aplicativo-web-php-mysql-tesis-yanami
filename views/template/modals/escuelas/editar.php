<!--Modal-->
<div class="modal fade" id="editarEscuela" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Actualizar una escuela</h1>
      </div>
      <form action="" id="formularioActualizarEscuela" name="formularioActualizarEscuela" method="POST">
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_s" name="nombre_s">
            <input type="text" class="form-control" id="id_s" name="id_s" hidden>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="actualizarDatos();" type="submit" class="btn btn-success" id="actualizar_escuela" name="actualizar_escuela">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
