 <!-- Sistem Informasi Arsip Digital Surat Keputusan
 ****************************************************
 * Developer    : Indra Styawantoro
 * Release Date : Maret 2018
 * Update       : -
 * Website      : www.indrasatya.com
 * E-mail       : indra.setyawantoro@gmail.com
 * Phone / WA   : +62-813-7778-3334
 -->

<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Sistem Informasi Arsip Digital Surat Keputusan">
        <meta name="keywords" content="Sistem Informasi Arsip Digital Surat Keputusan">
        <meta name="author" content="Indra Styawantoro">

        <?php  
        // fungsi untuk menampilkan title sesuai dengan halaman yang dibuka
        // jika halaman Beranda dipilih, tampilkan title Beranda 
        if ($_GET['module']=='beranda') {
            echo "<title>Beranda - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Surat Keputusan dipilih, tampilkan title Surat Keputusan 
        elseif ($_GET['module']=='surat_keputusan' || $_GET['module']=='form_surat_keputusan') {
            echo "<title>Surat Keputusan - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        }  
        // jika halaman Laporan dipilih, tampilkan title Laporan 
        elseif ($_GET['module']=='laporan') {
            echo "<title>Laporan - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Manajemen User dipilih, tampilkan title Manajemen User 
        elseif ($_GET['module']=='user' || $_GET['module']=='form_user') {
            echo "<title>Manajemen User - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Backup Database dipilih, tampilkan title Backup Database 
        elseif ($_GET['module']=='backup') {
            echo "<title>Backup Database - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Tentang Aplikasi dipilih, tampilkan title Tentang Aplikasi 
        elseif ($_GET['module']=='tentang') {
            echo "<title>Tentang Aplikasi - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Prtunjuk Aplikasi dipilih, tampilkan title Prtunjuk Aplikasi 
        elseif ($_GET['module']=='petunjuk') {
            echo "<title>Prtunjuk Aplikasi - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        } 
        // jika halaman Password dipilih, tampilkan title Password 
        elseif ($_GET['module']=='password') {
            echo "<title>Password - Sistem Informasi Arsip Digital Surat Keputusan</title>";
        }
        ?>
        <!-- Favicon-->
        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/datepicker/datepicker.min.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="assets/css/app.css">
        <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-overlay-menu.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- END Custom CSS-->
    </head>
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
        <!-- navbar-fixed-top-->
        <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="beranda" class="navbar-brand nav-link"><img alt="branding logo" src="assets/images/logo/logo-light.png" data-expand="assets/images/logo/logo-light.png" data-collapse="assets/images/logo/logo-sm.png" class="brand-logo"></a>
                        </li>
                        <li class="nav-item hidden-md-up float-xs-right">
                            <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-container content container-fluid">
                    <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                        <ul class="nav navbar-nav">
                            <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
                            <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav float-xs-right">
                            <li class="dropdown dropdown-user nav-item">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                                    <span class="avatar"><img src="assets/images/avatar/avatar.png" alt="avatar"></span>
                                    <!-- Tampilkan Nama User sesuai dengan Session User yang login -->
                                    <span class="user-name"><?php echo $_SESSION['nama_user']; ?></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="password" class="dropdown-item"><i class="icon-lock"></i> Ubah Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a data-toggle="modal" href="#logout" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <!-- main menu-->
        <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
            <!-- main menu header-->
            <div class="main-menu-header">
                <form action="pencarian" method="POST">
                    <input type="text" name="cari" placeholder="Cari Nomor / Nama SK ..." class="menu-search form-control round" autocomplete="off" />
                </form>
            </div>
            <!-- / main menu header-->
            <!-- main menu content-->
            <div class="main-menu-content">

                <!-- panggil file "navbar-menu.php" untuk menampilkan menu -->
                <?php include "sidebar-menu.php"; ?>

            </div>
            <!-- /main menu content-->
        </div>
        <!-- / main menu-->

        <div style="min-height:94%" class="app-content content container-fluid">
            <div class="content-wrapper">
                
                <!-- panggil file "content.php" untuk menampilkan halaman konten-->
                <?php include "content.php"; ?>
                
                <!-- Modal Logout -->
                <div class="modal fade text-xs-left" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel1"><i style="margin-right:7px" class="icon-power3"></i> Logout </h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin logout?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="logout.php" class="btn btn-danger mr-1">Ya, Logout</a>
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <footer class="footer footer-static footer-light navbar-border">
            <p class="clearfix text-muted text-sm-center mb-0 px-2">
                <span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 - <a href="http://www.indrasatya.com" target="_blank" class="text-bold-500 grey darken-2">www.indrasatya.com </a></span>
                <span class="float-md-right d-xs-block d-md-inline-block">Versi 1.0</span>
            </p>
        </footer>

        <!-- BEGIN VENDOR JS-->
        <script src="assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
        <script src="assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="assets/vendors/js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="assets/vendors/js/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
        <script src="assets/js/core/app.js" type="text/javascript"></script>
        <!-- END ROBUST JS-->

        <script type="text/javascript">
        $(document).ready(function() {
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            $('#dynamic-tables').DataTable( {
                "bAutoWidth": false,
                "iDisplayLength": 10
            } );
        } );
        </script>
    </body>
</html>
