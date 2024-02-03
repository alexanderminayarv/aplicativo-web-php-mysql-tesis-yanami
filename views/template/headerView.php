<!doctype html>
<html lang="en" class="dark-theme">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $data['page_title']; ?></title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="<?= media();?>/images/favicon.svg" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="<?= media();?>/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= media();?>/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="<?= media();?>/css/overlayScrollbars.min.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= media();?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= media();?>/css/dataTables.bootstrap5.min.css" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= media();?>/css/sweetalert2.css">

    <!-- Select2 CSS -->
	<link rel="stylesheet" href="<?= media();?>/css/select2.min.css" />
	<link rel="stylesheet" href="<?= media();?>/css/select2-bootstrap-5-theme.min.css" />
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">

            <!-- Toggle buttons start -->
            <div class="d-flex col">
                <button class="toggle-sidebar" id="toggle-sidebar">
                    <i class="bi bi-list lh-1 text-white"></i>
                </button>
                <button class="pin-sidebar" id="pin-sidebar">
                    <i class="bi bi-list lh-1 text-white"></i>
                </button>
            </div>
            <!-- Toggle buttons end -->

            <!-- App brand starts 
            <div class="app-brand py-2 col">
                <a href="<?= base_url();?>">
                    <img src="assets/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
                </a>
            </div>
            App brand ends -->

            <!-- App header actions start -->
            <div class="header-actions col">
                <div class="d-lg-flex d-none align-items-center gap-2">
                    <div class="dropdown">
                        <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-envelope-fill fs-5 lh-1 text-white"></i>
                        </a>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle header-action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-bell-fill fs-5 lh-1 text-white"></i>
                            <span class="count-label"><?php echo $_SESSION['Cantidad_Deudores']['CantDebe'];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow-lg">
                            <h5 class="fw-semibold px-3 py-2 text-primary">
                                Notificaciones
                            </h5>
                            <?php foreach($_SESSION['Deudores'] as $deudores) { ?>
                            <div class="dropdown-item">
                                <div class="d-flex py-2 border-bottom">
                                    <div class="icon-box md bg-success rounded-circle me-3">
                                        <i class="bi bi-emoji-frown-fill text-white fs-4"></i>
                                    </div>
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold"><?php echo $deudores['Cliente']?></h6>
                                        <p class="mb-1 text-secondary">S/ <?php echo $deudores['Debe']?></p>
                                        <p class="small m-0 text-secondary"><?php echo $deudores['Fecha']?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?> 
                            <div class="d-grid mx-3 my-1">
                                <a href="<?= base_url();?>/ventas" class="btn btn-secondary">Ver todo</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown ms-3">
                    <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                        href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= media();?>/img/asesores/<?php echo $_SESSION['Usuario']['Foto'];?>" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
                        <div class="ms-2 text-truncate d-lg-block d-none text-white">
                            <span class="d-flex opacity-50 small"><?php echo $_SESSION['Usuario']['Especialidad'];?></span>
                            <span><?php echo $_SESSION['Usuario']['Usuario'];?></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg">
                        <div class="header-action-links">
                            <a class="dropdown-item" href="<?= base_url();?>/asesores/perfil"><i
                                    class="bi bi-person border border-primary text-primary"></i>Perfil</a>
                        </div>
                        <div class="mx-3 mt-2 d-grid">
                            <a onclick="logout()" class="btn btn-primary btn-sm">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- App header actions end -->
        </div>

        <!-- App header ends -->

        <!-- Main container start -->
        <div class="main-container">

            <!-- Sidebar wrapper start -->
            <nav id="sidebar" class="sidebar-wrapper">

                <!-- Sidebar profile starts -->
                <div class="sidebar-profile">
                    <img src="<?= media();?>/img/asesores/<?php echo $_SESSION['Usuario']['Foto'];?>" class="profile-user mb-3" alt="Admin Dashboard" />
                    <div class="text-center">
                        <h6 class="profile-name m-0 text-nowrap text-truncate">
                            <?php echo $_SESSION['Usuario']['Nombres'];?>
                        </h6>
                    </div>
                    <div class="d-flex align-items-center mt-lg-3 gap-2">
                        <a href="calendar.html" class="icon-box md grd-success-light rounded-2">
                            <i class="bi bi-calendar2-check fs-5 text-success"></i>
                        </a>
                        <a href="events.html" class="icon-box md grd-info-light rounded-2">
                            <i class="bi bi-stickies fs-5 text-info"></i>
                        </a>
                        <a href="settings.html" class="icon-box md grd-danger-light rounded-2">
                            <i class="bi bi-whatsapp fs-5 text-danger"></i>
                        </a>
                    </div>
                </div>
                <!-- Sidebar profile ends -->
                <div class="sidebarMenuScroll">
                    <!-- Sidebar menu starts -->
                    <ul class="sidebar-menu">
                        <li class="active current-page">
                            <a href="<?= base_url();?>/dashboard">
                                <i class="bi bi-speedometer2"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
						<li class="treeview">
                            <a href="#!">
                                <i class="bi bi-stickies"></i>
                                <span class="menu-text">Información del usuario</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?= base_url();?>/asesores/perfil">Perfil</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="<?= base_url();?>/ventas">
                                <i class="bi bi-cash"></i>
                                <span class="menu-text">Ventas</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url();?>/clientes">
                                <i class="bi bi-people"></i>
                                <span class="menu-text">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url();?>/escuelas">
                                <i class="bi bi-building"></i>
                                <span class="menu-text">Escuelas</span>
                            </a>
                        </li>
						<li>
                            <a href="<?= base_url();?>/servicios">
                                <i class="bi bi-calendar2"></i>
                                <span class="menu-text">Servicios</span>
                            </a>
                        </li>
						<li>
                            <a href="<?= base_url();?>/trabajos">
                                <i class="bi bi-file-text"></i>
                                <span class="menu-text">Trabajos</span>
                            </a>
                        </li>
						<li>
                            <a href="<?= base_url();?>/universidades">
                                <i class="bi bi-globe2"></i>
                                <span class="menu-text">Universidades</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url();?>/asesores">
                                <i class="bi bi-people"></i>
                                <span class="menu-text">Asesores</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar menu ends -->

            </nav>
            <!-- Sidebar wrapper end -->