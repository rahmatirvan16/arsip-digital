 <!-- Sistem Informasi Arsip Digital Surat Keputusan
 ****************************************************
 * Developer    : Indra Styawantoro
 * Release Date : Maret 2018
 * Update       : -
 * Website      : www.indrasatya.com
 * E-mail       : indra.setyawantoro@gmail.com
 * Phone / WA   : +62-813-7778-3334
 -->

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Sistem Informasi Arsip Digital Surat Keputusan">
        <meta name="keywords" content="Sistem Informasi Arsip Digital Surat Keputusan">
        <meta name="author" content="Indra Styawantoro">

        <title>Login - Sistem Informasi Arsip Digital Surat Keputusan</title>

        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon.css">
        <!-- end font icons-->
        <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="assets/css/app.css">
        <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- END Custom CSS-->
    </head>

    <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header no-border">
                                    <div class="card-title text-xs-center">
                                        <div class="p-1">
                                            <img src="assets/images/logo/logo.png" alt="branding logo"> <br><br>
                                            <h3>Sistem Informasi Arsip Digital <br> Surat Keputusan</h3>
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3"><span>Silahkan Login</span></h6>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block-login">
                                    <?php  
                                    // fungsi untuk menampilkan pesan
                                    // jika alert = "" (kosong)
                                    // tampilkan pesan "" (kosong)
                                    if (empty($_GET['alert'])) { ?>
                                        <div></div>
                                    <?php
                                    }
                                    // jika alert = 1
                                    // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password Anda"
                                    elseif ($_GET['alert'] == 1) { ?>
                                        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal Login!</strong> <br> Username atau Password salah, cek kembali Username dan Password Anda.
                                        </div>
                                    <?php
                                    } 
                                    // jika alert = 2
                                    // tampilkan pesan Sukses "Anda telah berhasil logout"
                                    elseif ($_GET['alert'] == 2) { ?>
                                        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Anda telah berhasil logout.
                                        </div>
                                    <?php
                                    }
                                    // jika alert = 3
                                    // tampilkan pesan Sukses "Anda telah berhasil logout"
                                    elseif ($_GET['alert'] == 3) { ?>
                                        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong><i style="margin-right:7px" class="icon-notification"></i>Peringatan!</strong> Anda harus login terlebih dahulu.
                                        </div>
                                    <?php
                                    }
                                    ?>

                                        <form class="form-horizontal form-simple" action="login-check.php" method="POST">
                                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                <input type="text" class="form-control form-control-lg input-lg" name="username" placeholder="Username" autocomplete="off" required>
                                                <div class="form-control-position">
                                                    <i class="icon-head"></i>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Password" autocomplete="off" required>
                                                <div class="form-control-position">
                                                    <i class="icon-key3"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center>&copy; 2025 - <a href="#">UPTD SAMSAT SABANG</a></center>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <!-- BEGIN VENDOR JS-->
        <script src="assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
        <!-- END VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
        <script src="assets/js/core/app.js" type="text/javascript"></script>
        <!-- END ROBUST JS-->
    </body>
</html>
