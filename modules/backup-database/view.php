    <?php  
    // panggil file fungsi_file_size.php untuk mengetahui file size database
    require_once "config/fungsi_file_size.php";
    ?>   

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-database"></i> Backup Database </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Database</li>
                    <li class="breadcrumb-item active">Backup</li>
                </ol>
            </div>
        </div>
    </div>

    <?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
    }
    // jika alert = 1
    // tampilkan pesan "Backup Database berhasil"
    elseif ($_GET['alert'] == 1) { ?>
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Backup database berhasil.
        </div>
    <?php
    }   
    ?>

    <div class="content-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <a><i style="margin-right:5px" class="icon-info"></i> Klik tombol "Backup Database" untuk backup semua data pada database.</a>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body collapse in">
                        <div class="card-block card-dashboard">
                            <a href="backup-database-proses" class="btn btn-primary"><i style="margin-right:5px" class="icon-download"></i> Backup Database </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Data Backup Database</h6>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block card-dashboard">
                            <table id="dynamic-tables" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Database</th>
                                        <th>Tanggal Backup</th>
                                        <th>File Size</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                // fungsi query untuk menampilkan data dari tabel sys_database
                                $query = mysqli_query($mysqli, "SELECT a.id_db,a.nama_db,a.created_user,a.created_date,b.username
                                                                FROM sys_database as a INNER JOIN sys_user as b 
                                                                ON a.created_user=b.id_user ORDER BY a.id_db DESC")
                                                                or die('Ada kesalahan pada query tampil data backup: '.mysqli_error($mysqli));

                                while ($data = mysqli_fetch_assoc($query)) { 
                                    $tgl  = substr($data['created_date'],0,10);
                                    $exp  = explode('-',$tgl);
                                    $date = $exp[2]."-".$exp[1]."-".$exp[0];
                                    
                                    $time = substr($data['created_date'],11);

                                    $file = "database/$data[nama_db]";
                                ?>
                                    <tr>
                                        <td width="40" class="center"><?php echo $no; ?></td>
                                        <td width="180" class="center"><?php echo $data['nama_db']; ?></td>
                                        <td width="150" class="center"><?php echo $date; ?> <?php echo $time; ?></td>
                                        <td width="100" class="center"><?php echo fsize($file); ?></td>
                                        <td width="150" class="center"><?php echo $data['username']; ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>