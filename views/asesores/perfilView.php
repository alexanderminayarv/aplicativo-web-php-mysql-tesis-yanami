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
        <div class="row justify-content-center">
            <div class="col-xxl-12">
                <div class="card mb-3 bg-primary">
                    <div class="card-body bg-hexagon">
                        <!-- Row start -->
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="<?= media();?>/img/asesores/<?php echo $_SESSION['Usuario']['Foto'];?>"
                                    class="img-5xx rounded-circle" alt="Bootstrap Gallery" />
                            </div>
                            <div class="col">
                                <h6 class="text-white"><?php echo $_SESSION['Usuario']['Especialidad'];?></h6>
                                <h4 class="m-0 text-white"><?php echo $_SESSION['Usuario']['Nombres'];?></h4>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-xxl-3 col-sm-6 col-12 order-xxl-1 order-xl-2 order-lg-2 order-md-2 order-sm-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Datos personales</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-vcard-fill fs-2 me-2"></i>
                            <span><?php echo $_SESSION['Usuario']['DNI'];?></span>
                        </h6>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-fill fs-2 me-2"></i>
                            <span><?php echo $_SESSION['Usuario']['Nombres'];?></span>
                        </h6>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-fill fs-2 me-2"></i>
                            <span><?php echo $_SESSION['Usuario']['Apellidos'];?></span>
                        </h6>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill fs-2 me-2"></i>
                            <span><?php echo $_SESSION['Usuario']['Celular'];?></span>
                        </h6>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill fs-2 me-2"></i>
                            <span><?php echo $_SESSION['Usuario']['Email'];?></span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-sm-12 col-12 order-xxl-2 order-xl-1 order-lg-1 order-md-1 order-sm-1">
                <div class="card mb-3">
                    <div class="card-img">
                        <img src="<?= media();?>/img/bg-profile.png" class="card-img-top img-fluid"
                            alt="Bootstrap Dashboards" />
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12 order-xxl-3 order-xl-3 order-lg-3 order-md-3 order-sm-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Redes sociales</h5>
                    </div>
                    <div class="card-body">
                       <?php if($_SESSION['Usuario']['Facebook'] != null) { ?>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-facebook fs-2 me-2"></i>
                            <a href="<?php echo $_SESSION['Usuario']['Facebook'];?>" target="_blank">Facebook</a>
                        </h6>
                        <?php } ?>

                        <?php if($_SESSION['Usuario']['Instagram'] != null) { ?>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-instagram fs-2 me-2"></i>
                            <a href="<?php echo $_SESSION['Usuario']['Instagram'];?>" target="_blank">Instagram</a>
                        </h6>
                        <?php } ?>

                        <?php if($_SESSION['Usuario']['Youtube'] != null) { ?>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-youtube fs-2 me-2"></i>
                            <a href="<?php echo $_SESSION['Usuario']['Facebook'];?>" target="_blank">YouTube</a>
                        </h6>
                        <?php } ?>

                        <?php if($_SESSION['Usuario']['LinkedIn'] != null) { ?>
                        <h6 class="d-flex align-items-center mb-3">
                            <i class="bi bi-linkedin fs-2 me-2"></i>
                            <a href="<?php echo $_SESSION['Usuario']['LinkedIn'];?>" target="_blank">LinkedIn</a>
                        </h6>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

    </div>

    <!-- App body ends -->
    <?= footerAdmin($data)?>
   
    </body>

    </html>