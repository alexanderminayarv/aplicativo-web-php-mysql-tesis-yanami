<!--Modal-->
<div class="modal fade" id="editarTrabajo" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar una escuela</h1>
            </div>
            <form action="" id="formularioActualizarTrabajo" name="formularioActualizarTrabajo" method="POST">
                <div class="modal-body">
                <div class="mb-3">
                        <label class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="titulo_t" name="titulo_t">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Escuela</label>
                        <select class="form-select2" id="escuela_t" name="escuela_t" data-placeholder="Seleccione una escuela">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Universidad:</label>
                        <select name="universidad_t" id="universidad_t" class="form-select2" data-placeholder="Seleccione una universidad">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Situación Académica:</label>
                        <select name="situacion_academica_t" id="situacion_academica_t" class="form-select2" data-placeholder="Seleccione la situación académica">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Cliente:</label>
                        <select name="cliente_t" id="cliente_t" class="form-select2" data-placeholder="Seleccione un cliente">

                        </select>
                        <input type="text" id="id_t" name="id_t" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button onclick="actualizarDatos();" type="submit" class="btn btn-success" id="actualizar_trabajo"
                        name="actualizar_trabajo">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>