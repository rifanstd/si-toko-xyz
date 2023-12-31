<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title; ?>
    </title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="/assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/assets/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/admin-lte/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Header -->
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <span class="nav-link text-dark">Selamat Datang</span>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="/logout">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="/assets/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Toko XYZ</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php if (session()->get('role') == 1): ?>
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <span><i class="nav-icon fas fa-user"></i></span>
                                    <p>
                                        Akun
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/categories" class="nav-link">
                                    <span><i class="nav-icon fas fa-th"></i></span>
                                    <p>
                                        Kategori
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/products" class="nav-link">
                                    <span><i class="nav-icon fas fa-th"></i></span>
                                    <p>
                                        Produk
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/suppliers" class="nav-link">
                                    <span><i class="nav-icon fas fa-th"></i></span>
                                    <p>
                                        Supplier
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/transactions" class="nav-link">
                                    <span><i class="nav-icon fas fa-th"></i></span>
                                    <p>
                                        Transaksi
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?= $title; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </section>
        </div>
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2023 Toko XYZ</strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="/assets/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/admin-lte/plugins/chart.js/Chart.min.js"></script>
    <script src="/assets/admin-lte/plugins/sparklines/sparkline.js"></script>
    <script src="/assets/admin-lte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="/assets/admin-lte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="/assets/admin-lte/plugins/moment/moment.min.js"></script>
    <script src="/assets/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/assets/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/assets/admin-lte/dist/js/adminlte.js"></script>
    <script src="/assets/admin-lte/dist/js/pages/dashboard.js"></script>
</body>

</html>