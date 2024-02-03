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
                <form action="" id="formularioRegistrarse" name="formularioRegistrarse" class="my-5" method="POST">
                    <div class="login-form rounded-4 p-4 mt-5">
                        <a href="index.html" class="mb-4 d-flex">
                            <img src="<?= media();?>/img/logo.svg" class="img-fluid login-logo"
                                alt="Unity Admin Dashboard" />
                        </a>
                        <h2 class="fw-light mb-4">Registrarse</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">DNI:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="dni"
                                        name="dni" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nombres:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="nombres"
                                        name="nombres" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="apellidos"
                                        name="apellidos" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Especialidad:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="especialidad"
                                        name="especialidad" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Celular:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="celular"
                                        name="celular" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control border-0" placeholder="" id="email"
                                        name="email" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Usuario:</label>
                                    <input type="text" class="form-control border-0" placeholder=""
                                        id="usuario" name="usuario" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password:</label>
                                    <input type="password" class="form-control border-0" placeholder="************"
                                        id="password" name="password" />
                                </div>
                            </div>
                        </div>

                        <div class="d-grid py-3 mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Registrarse
                            </button>
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
    <script src="<?= media();?>/js/registrarse.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= media();?>/js/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>