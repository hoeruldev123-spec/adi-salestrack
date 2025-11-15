<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ADI SalesTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ========================= CSS ========================= -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap-5.0.0-alpha-2.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/LineIcons.2.0.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/animate.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/lindy-uikit.css') ?>" />
    
    <link rel="shortcut icon" href="<?= base_url('images/logo.png'); ?>" />
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================= hero ========================= -->
    <section id="home" class="hero-section-wrapper-2">

        <!-- Header -->
        <header class="header header-2">
            <div class="navbar-area">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?= base_url('/') ?>">
                            <img src="<?= base_url('images/logo/alldata_logo.png') ?>" alt="Logo" />
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent2">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="page-scroll active" href="#home">Home</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#services">Services</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                            </ul>
                            <a href="<?= base_url('login') ?>" class="button button-sm radius-10 d-none d-lg-flex">
                                Get Started
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Hero Content -->
        <div class="hero-section hero-style-2">
            <div class="container">
                <div class="row align-items-end">

                    <div class="col-lg-6">
                        <div class="hero-content-wrapper">
                            <h4 class="wow fadeInUp" data-wow-delay=".2s">Efficient. Accurate. Integrated.</h4>
                            <h2 class="mb-30 wow fadeInUp" data-wow-delay=".4s">
                                ADI SalesTrack
                            </h2>
                            <p class="mb-50 wow fadeInUp" data-wow-delay=".6s">
                                Aplikasi internal untuk memonitor pipeline penjualan, progress proyek, 
                                serta revenue tracking secara real-time.
                            </p>
                            <div class="hero-btn mt-4 d-flex" style="gap: 12px;">
                                <a href="<?= base_url('login') ?>" class="btn btn-primary px-4 py-2">
                                    Login
                                </a>

                                <a href="<?= base_url('register') ?>" class="btn btn-outline-primary px-4 py-2">
                                    Register
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="<?= base_url('images/hero/hero-img.svg') ?>" alt=""
                                class="wow fadeInRight" data-wow-delay=".2s">
                            <img src="<?= base_url('images/hero/paattern.svg') ?>" class="shape shape-1">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ========================= JS ========================= -->
    <script src="<?= base_url('js/bootstrap.5.0.0.alpha-2-min.js') ?>"></script>
    <script src="<?= base_url('js/count-up.min.js') ?>"></script>
    <script src="<?= base_url('js/wow.min.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>

</body>
</html>
