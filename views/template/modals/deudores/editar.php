<!--Modal-->
<div class="modal fade" id="editarClienteDeudor" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar la venta</h1>
            </div>
            <form action="" id="formularioActualizarClienteDeudor" name="formularioActualizarClienteDeudor"
                method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">

                            <label class="col-form-label">Fecha:</label>
                            <input type="date" class="form-control" id="fecha_cd" name="fecha_cd">

                            <label class="col-form-label">Cliente:</label>
                            <input type="text" class="form-control" id="cliente_cd" name="cliente_cd">

                            <label class="col-form-label">Servicio:</label>
                            <input type="text" class="form-control" id="servicio_cd" name="servicio_cd">

                            <label class="col-form-label">Adelanto de dinero:</label>
                            <input type="text" class="form-control" id="pago_cd" name="pago_cd">
                            
                            <label class="col-form-label">Debe:</label>
                            <input type="text" class="form-control" id="debe_cd" name="debe_cd">

                            <label class="col-form-label">Nuevo Monto:</label>
                            <input type="text" class="form-control" id="monto_cd" name="monto_cd">

                            <input type="text" id="id_vcd" name="id_vcd" hidden>
                            <input type="text" id="id_dvcd" name="id_dvcd" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button onclick="actualizarDatos();" type="submit" class="btn btn-success" id="actualizar_venta"
                        name="actualizar_venta">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>