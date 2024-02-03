<!--Modal-->
<div class="modal fade" id="agregarTrabajo" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Añadir nuevo trabajo</h1>
            </div>
            <form action="" id="formularioAgregarTrabajo" name="formularioAgregarTrabajo" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Escuela</label>
                        <select class="form-select" id="escuela" name="escuela" data-placeholder="Seleccione una escuela">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Universidad:</label>
                        <select name="universidad" id="universidad" class="form-select" data-placeholder="Seleccione una universidad">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Situación Académica:</label>
                        <select name="situacion_academica" id="situacion_academica" class="form-select" data-placeholder="Seleccione la situación académica">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Cliente:</label>
                        <select name="cliente" id="cliente" class="form-select" data-placeholder="Seleccione un cliente">

                        </select>
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