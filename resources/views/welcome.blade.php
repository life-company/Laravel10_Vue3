<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>取引先管理システム</title>
        <!-- AdminLTE CSS -->
        <link rel="stylesheet" href="./node_modules/admin-lte/dist/css/adminlte.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">取引先管理システム</span>
                </a>
                @include('parts.sidebar')
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="app"></div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    <strong>Copyright &copy; 2024<?= date('Y') != 2024 ? '-' . date('Y') : '' ?> 八木大介</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="./node_modules/admin-lte/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    </body>
</html>
