<!--Modal-->
<div class="modal fade" id="editarVenta" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar la venta</h1>
            </div>
            <form action="" id="formularioActualizarVenta" name="formularioActualizarVenta" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="<?= media();?>/img/logo.png" width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Cliente:</label>
                                <select class="form-select4" id="cliente_v" name="cliente_v"
                                    data-placeholder="Seleccione al cliente">
                                </select>

                                <label class="col-form-label mt-3">Fecha:</label>
                                <input type="date" class="form-control" id="fecha_v" name="fecha_v">

                                <label class="col-form-label mt-3">Servicio:</label>
                                <select class="form-select4" id="servicio_dv" name="servicio_dv"
                                    data-placeholder="Seleccione el servicio">
                                </select>

                                <label class="col-form-label mt-3">Precio:</label>
                                <input type="text" class="form-control" id="precio_dv" name="precio_dv">
                            </div>
                            <hr>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Descuento:</label>
                                        <input type="text" class="form-control" id="descuento_dv" name="descuento_dv" value="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Pago:</label>
                                        <input type="text" class="form-control" id="pago_dv" name="pago_dv">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Banco:</label>
                                <select class="form-select4 mb-3" id="banco_dv" name="banco_dv"
                                    data-placeholder="Seleccione el banco">
                                </select>
                                <input type="text" id="id_v" name="id_v" hidden>
                                <input type="text" id="id_dv" name="id_dv" hidden>
                            </div>
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