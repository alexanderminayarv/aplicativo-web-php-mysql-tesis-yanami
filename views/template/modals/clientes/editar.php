<!--Modal-->
<div class="modal fade" id="editarCliente" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Actualizar un cliente</h1>
      </div>
      <form action="" id="formularioActualizarCliente" name="formularioActualizarCliente" method="POST">
      <div class="modal-body">
          <div class="mb-3">
            <label class="col-form-label">DNI:</label>
            <input type="text" class="form-control" id="DNI_c" name="DNI_c">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres_c" name="nombres_c">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos_c" name="apellidos_c">
          </div>
          <div class="mb-3">
            <label class="col-form-label">Celular:</label>
            <input type="text" class="form-control" id="celular_c" name="celular_c">
            <input type="text" class="form-control" id="id_c" name="id_c" hidden>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="actualizarDatos();" type="submit" class="btn btn-success" id="actualizar_cliente" name="actualizar_cliente">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
