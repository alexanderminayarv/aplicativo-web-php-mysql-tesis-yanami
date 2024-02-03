<!--Modal-->
<div class="modal fade" id="agregarVenta" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Añadir nueva venta</h1>
            </div>
            <form action="" id="formularioAgregarVenta" name="formularioAgregarVenta" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="<?= media();?>/img/logo.png" width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Cliente:</label>
                                <select class="form-select3" id="cliente" name="cliente"
                                    data-placeholder="Seleccione al cliente">
                                </select>

                                <label class="col-form-label mt-3">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">

                                <label class="col-form-label mt-3">Servicio:</label>
                                <select class="form-select3" id="servicio" name="servicio"
                                    data-placeholder="Seleccione el servicio">
                                </select>

                                <label class="col-form-label mt-3">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                            <hr>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Descuento:</label>
                                        <input type="text" class="form-control" id="descuento" name="descuento" value="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Pago:</label>
                                        <input type="text" class="form-control" id="pago" name="pago">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Banco:</label>
                                <select class="form-select3 mb-3" id="banco" name="banco"
                                    data-placeholder="Seleccione el banco">
                                </select>
                            </div>
                        </div>
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