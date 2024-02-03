<?= headerAdmin($data);?>
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
                <li class="breadcrumb-item" aria-current="page"><?= $data['page_table'];?></li>
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
            <?php foreach($datos as $datos_asesores) { ?>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="<?= media();?>/img/asesores/<?php echo $datos_asesores['Foto'];?>"
                            class="img-6x rounded-circle mb-4" alt="Admin Dashboard" />
                        <h5 class="mb-3"><?php echo $datos_asesores['Asesor'];?></h5>
                        <h6 class="mb-3 text-secondary fw-light"><?php echo $datos_asesores['Especialidad'];?></h6>
                        <div class="mb-3">
                            <span class="badge bg-opacity-10 bg-info text-success"><?php echo $datos_asesores['Celular'];?></span>
                            <span class="badge bg-opacity-10 bg-danger text-danger"><?php echo $datos_asesores['Email'];?></span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php if($datos_asesores['Facebook'] != null) { ?>
                            <a href="<?php echo $datos_asesores['Facebook'];?>" class="mx-2" target="_blank">
                                <i class="bi bi-facebook fs-5"></i>
                            </a>
                            <?php } ?>
                            <?php if($datos_asesores['Instagram'] != null) { ?>
                            <a href="<?php echo $datos_asesores['Instagram'];?>" class="mx-2" target="_blank">
                                <i class="bi bi-instagram fs-5"></i>
                            </a>
                            <?php } ?>
                            <?php if($datos_asesores['Youtube'] != null) { ?>
                            <a href="<?php echo $datos_asesores['Youtube'];?>" class="mx-2" target="_blank">
                                <i class="bi bi-youtube fs-5"></i>
                            </a>
                            <?php } ?>
                            <?php if($datos_asesores['LinkedIn'] != null) { ?>
                            <a href="<?php echo $datos_asesores['LinkedIn'];?>" class="mx-2" target="_blank">
                                <i class="bi bi-linkedin fs-5"></i>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- Row end -->
    </div>
    <!-- App body ends -->
    <?= footerAdmin($data)?>

    </body>

    </html>