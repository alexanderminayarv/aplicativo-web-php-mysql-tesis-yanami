<?= headerAdmin($data)?>
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
                    <a href="<?= base_url();?>" class="text-decoration-none">Inicio</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
            </ol>
            <!-- Breadcrumb end -->
        </div>
        <!-- Breadcrumb and stats end -->

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                    <div class="p-3 text-white">
                        <div class="mb-2">
                            <i class="bi bi-people fs-1 lh-1"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0 fw-normal">Clientes</h5>
                            <h3 class="m-0"><?= $datos['CountClient'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                    <div class="p-3 text-white">
                        <div class="mb-2">
                            <i class="bi bi-file-text fs-1 lh-1"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0 fw-normal">Trabajos</h5>
                            <h3 class="m-0"><?= $datos['CountWork'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                    <div class="p-3 text-white">
                        <div class="arrow-label">+18%</div>
                        <div class="mb-2">
                            <i class="bi bi-globe2 fs-1 lh-1"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0 fw-normal">Universidades</h5>
                            <h3 class="m-0"><?= $datos['CountUniversity'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="bg-transparent-light rounded-1 mb-3 position-relative">
                    <div class="p-3 text-white">
                        <div class="arrow-label">+24%</div>
                        <div class="mb-2">
                            <i class="bi bi-cash fs-1 lh-1"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-0 fw-normal">Ganancias</h5>
                            <h3 class="m-0">S/ <?= $datos['CountSale'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- App Hero header ends -->
    <!-- App body starts -->
    <div class="app-body">
        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-xl-8 col-sm-12 col-12">
                <div class="card mb-3">
                    <div class="card-body height-230">
                        <div class="row align-items-end">
                            <div class="col-sm-8">
                                <h3 class="mb-4">¡Bienvenido <?php echo $_SESSION['Usuario']['Nombres'];?>!🎉</h3>
                                <p>
                                    ¡Bienvenido de nuevo a Tesis Yanami! Estamos emocionados de tenerte de vuelta en
                                    nuestro sistema. <span class="text-success fw-bold">Tu participación es clave para
                                        el éxito de nuestra investigación.</span> Si necesitas ayuda o tienes preguntas,
                                    no dudes en contactarnos. ¡Sigamos trabajando juntos hacia el logro de tus metas
                                    académicas!
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="<?= media();?>/img/user-bienvenido.svg" class="congrats-img"
                                    alt="Bootstrap Gallery" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12 col-12">
                <div class="card mb-3">
                    <div class="card-body bg-hexagon height-230">
                        <h5 class="card-title">Ganancias por Año</h5>
                        <?php foreach($dato3 as $earningsPerMonth) {
                        $anio[] = $earningsPerMonth['año'];
                        $total_anio[] = $earningsPerMonth['total'];
                        } ?>
                        <div>
                            <canvas id="earningsPerYear"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Ganancias por Mes</h5>
                    </div>
                    <div class="card-body">
                        <?php foreach($dato2 as $earningsPerMonth) {
                        $mes[] = $earningsPerMonth['mes'];
                        $total[] = $earningsPerMonth['total'];
                        } ?>
                        <div>
                            <canvas id="earningsPerMonth"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-xl-8 col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Clientes más concurridos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Clientes</th>
                                    <th>Trabajos</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                               $contador = 0;
                               foreach($dato1 as $dataClients) { ?>
                                <tr>
                                    <td><?php echo $contador = $contador + 1; ?></td>
                                    <td><?php echo $dataClients['Cliente'];?></td>
                                    <td><?php echo $dataClients['CountWork'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Clientes por Universidad</h5>
                    </div>
                    <div class="card-body">
                        <?php foreach($dato as $dataUniversities) {
                        $universidad[] = $dataUniversities['Nombre'];
                        $cantidad[] = $dataUniversities['CountClient'];
                        } ?>
                        <div>
                            <canvas id="dataUniversities"></canvas>
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
    <!-- Chart -->
    <script src="<?= media();?>/js/chart/chart.js"></script>
    <script>
    const universidad = <?php echo json_encode($universidad); ?>;
    const cantidad = <?php echo json_encode($cantidad); ?>;

    const mes = <?php echo json_encode($mes); ?>;
    const total = <?php echo json_encode($total); ?>;

    const anio = <?php echo json_encode($anio); ?>;
    const total_anio = <?php echo json_encode($total_anio); ?>;

    </script>
    <script src="<?= media();?>/js/chart/dataUniversities.js"></script>
    <script src="<?= media();?>/js/chart/earningsPerMonth.js"></script>
    <script src="<?= media();?>/js/chart/earningsPerYear.js"></script>

    </body>

    </html>