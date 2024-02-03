<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Sweet Alert 2-->
    <link href="<?= media();?>/css/sweetalert2.css" rel="stylesheet">
    <title><?= $data['page_title']?></title>
    <link rel="stylesheet" href="<?= media();?>/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= media();?>/css/main.min.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="login-bg">
    <!-- Container start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12">
                <form action="" id="formularioLogin" name="formularioLogin" class="my-5">
                    <div class="login-form rounded-4 p-4 mt-5">
                        <a href="index.html" class="mb-4 d-flex">
                            <img src="<?= media();?>/img/logo.svg" class="img-fluid login-logo"
                                alt="Unity Admin Dashboard" />
                        </a>
                        <h2 class="fw-light mb-4">Login</h2>
                        <div class="mb-3">
                            <label class="form-label">Usuario:</label>
                            <input type="text" class="form-control border-0" placeholder="" id="usuario"
                                name="usuario" value="<?= $data['usuario'];?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control border-0" placeholder="************"
                                id="password" name="password" value=""/>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-5">
                            <div class="g-recaptcha" data-sitekey="6LfQkbQoAAAAAGW08bs_tK9W167IHfCtcHH_5mdA">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="recordarme"
                                        value="1">
                                    <label class="form-check-label" for="flexSwitchCheckRemember">Recordar</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <a href="<?= base_url()?>/recuperarcontrasena" class="text-white">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                        <div class="d-grid py-3 mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="text-center">
                            <span>¿No tienes cuenta?</span>
                            <a href="<?= base_url()?>/registrarse" class="text-white text-decoration-underline ms-2">
                                Regístrate aquí</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container end -->
    <script>
    const base_url = "<?= base_url(); ?>";
    const media_url = "<?= media(); ?>";
    </script>
    <script src="<?= media();?>/js/validarcredenciales.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= media();?>/js/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>