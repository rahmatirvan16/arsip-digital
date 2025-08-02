    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"><i class="icon-home3"></i> Beranda </h2>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i style="margin-right:7px" class="icon-home3"></i>Beranda</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="alert alert-primary alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <!-- tampilkan nama user dan hak akses user berdasarkan session user yang login -->
        Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong>. Anda login sebagai <strong><?php echo $_SESSION['hak_akses']; ?></strong>.
    </div>

    <div class="content-body"><!-- stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah seluruh data surat keputusan
                                $query = mysqli_query($mysqli, "SELECT count(id_sk) as jumlah FROM surat_keputusan")
                                                                or die('Ada kesalahan pada query tampil data jumlah seluruh surat keputusan: '.mysqli_error($mysqli));

                                $data = mysqli_fetch_assoc($query);
                                $total_seluruh = $data['jumlah'];
                                ?>
                                    <h3 class="pink"><?php echo $total_seluruh; ?></h3>
                                    <span>Total Seluruh Arsip</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-files-empty pink font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                $tahun = date("Y");
                                // fungsi query untuk menampilkan jumlah data surat keputusan pertahun
                                $query = mysqli_query($mysqli, "SELECT count(id_sk) as jumlah FROM surat_keputusan WHERE LEFT(tgl_penetapan,4)='$tahun'")
                                                                or die('Ada kesalahan pada query tampil data jumlah surat keputusan pertahun: '.mysqli_error($mysqli));

                                $data = mysqli_fetch_assoc($query);
                                $total_pertahun = $data['jumlah'];
                                ?>
                                    <h3 class="teal"><?php echo $total_pertahun; ?></h3>
                                    <span>Total Arsip Tahun <?php echo $tahun; ?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-file-text2 teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan jumlah data user
                                $query = mysqli_query($mysqli, "SELECT count(id_user) as jumlah FROM sys_user")
                                                                or die('Ada kesalahan pada query tampil jumlah data user: '.mysqli_error($mysqli));

                                $data = mysqli_fetch_assoc($query);
                                $total_user = $data['jumlah'];
                                ?>
                                    <h3 class="deep-orange"><?php echo $total_user; ?></h3>
                                    <span>Pengguna Aplikasi</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-user1 deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                <?php  
                                // fungsi query untuk menampilkan tanggal terakhir backup database
                                $query = mysqli_query($mysqli, "SELECT id_db, created_date FROM sys_database WHERE aksi='Backup' ORDER BY id_db DESC LIMIT 1")
                                                                or die('Ada kesalahan pada query tampil data backup database: '.mysqli_error($mysqli));

                                $rows  = mysqli_num_rows($query);

                                if ($rows > 0) {
                                    $data = mysqli_fetch_assoc($query);

                                    $tgl  = substr($data['created_date'],0,10);
                                    $exp  = explode('-',$tgl);
                                    $date = $exp[2]."-".$exp[1]."-".$exp[0];
                                    echo "<h3 class='cyan'>$date</h3>";
                                } else {
                                    echo "<h3 class='cyan'>-</h3>";
                                }
                                ?>
                                    <span>Backup Database</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-database cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ stats -->
    </div>