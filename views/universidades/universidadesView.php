<?= headerAdmin($data);
getModal('universidades','agregar',$data);
getModal('universidades','editar',$data); ?>
<!-- App container starts -->
<div class="app-container">

    <!-- App hero header starts -->
    <div class="app-hero-header mb-4">

        <!-- Breadcrumb and Stats start -->
        <div class="d-flex align-items-center mb-3">

            <!-- Breadcrumb start -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="bi bi-house lh-1"></i>
                    <a href="index.html" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?= $data['page_table']; ?></li>
            </ol>
            <!-- Breadcrumb end -->

        </div>
        <!-- Breadcrumb and stats end -->

    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-xxl-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="bi bi-plus-circle-fill" onclick="agregarDatos()"></i>
                                        </th>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $contador=0;
                            foreach ($datos as $datos_universidades) {?>
                                    <tr>
                                        <td><?php echo $contador = $contador + 1; ?></td>
                                        <td><?php echo $datos_universidades['Nombre']?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                onclick="verDatos(<?php echo $datos_universidades['ID']?>)"><i
                                                    class="bi bi-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-icon btn-sm" href="#"><i
                                                    class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- App body ends -->
    <!--end page wrapper -->
    <?= footerAdmin($data)?>

    <script src="<?= media();?>/js/universidades/modal.js"></script>
    <script src="<?= media();?>/js/universidades/editar.js"></script>
    <script src="<?= media();?>/js/universidades/actualizar.js"></script>
    <script src="<?= media();?>/js/universidades/agregar.js"></script>
    
    <!-- plugins -->
    <script src="<?= media();?>/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= media();?>/js/datatables/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            ordering: false
        });
    });
    </script>
    <!--app JS-->
    </body>

    </html>