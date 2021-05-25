<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIVTrans</title>

        <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/dist/css/adminlte.min.css">

        <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/fontawesome-free/css/all.min.css">

        <!-- Datatable -->
        <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <!-- jQuery -->
        <script src="<?= base_url()?>assets/admin-lte/plugins/jquery/jquery.min.js"></script>
    </head>
    <style>
        * {
            font-size:14px
        }

        .thin {
            font-weight:300;
        }

        .icon-sm {
            font-size: 12px;
            padding-right:5px;
        }

        .table-font-sm tr th,
        .table-font-sm tr td {
            font-size:12px;
        } 

        .table-font-sm tr th:nth-child(1) {
            width:5%;
        }

        .table-font-sm tr th:last-child,
        .table-font-sm tr td:last-child {
            width:20%;
            text-align:center;

        }
        .upload-box{
            border-radius:3px;
            width:100%;
            border:dashed 4px #989994;
            height:290px;
            color:#989994;
            text-align:center;
            display:table;
            margin:20px 0px;
        }  
        .upload-box .upload-icon {
            display:table-cell;
            vertical-align:middle;
        }
        .upload-icon i, .icon-lg {
            font-size: 36px;
        }
        .upload-box--drag {
            border:solid 4px #007BFF;
            color:#007BFF;
        }
    </style>
    <body>

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                 <a type="button" class="nav-link" data-toggle="modal" data-target="#logoutModal" href="" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="<?= base_url()?>assets/images/landing/logo.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
            <span class="brand-text ">SIVTrans</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="<?= base_url()?>upload/foto_profil_user/<?= $this->session->userdata('picture_profile')?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block"><?= strtoupper($this->session->userdata('username'))?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <?php include 'template/sidebar.php'; ?>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-4">
            <?php echo $contents; ?>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; Muh Fachrul YS 2021 .</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content w-50 m-auto">
                    <div class="modal-body text-center">
                        <h3>Log Out</h3>
                        <hr>
                        <p>Apakah Anda Yakin ingin Keluar??</p>
                        <div style="display:inline">
                            <a href="<?= base_url()?>auth/log_out" class="btn btn-sm btn-danger">Ya, Keluar</a>
                            <button class="btn btn-sm btn-secondary">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>assets/admin-lte/dist/js/adminlte.js"></script>
    <!-- Data Tables -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>assets/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  </body>
</html>