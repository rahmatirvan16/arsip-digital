    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"><i class="icon-file-text2"></i> Surat Keputusan </h2>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Surat Keputusan</li>
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
// tampilkan pesan "Arsip surat keputusan baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Arsip surat keputusan baru berhasil disimpan.
    </div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "data arsip surat keputusan berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data arsip surat keputusan berhasil diubah.
    </div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "data arsip surat keputusan berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data arsip surat keputusan berhasil dihapus.
    </div>
<?php
} 
// jika alert = 4
// tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 4) { ?>
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Pastikan file yang diupload sudah benar.
    </div>
<?php
} 
// jika alert = 5
// tampilkan pesan Upload Gagal "Pastikan ukuran gambar tidak lebih dari 1 Mb"
elseif ($_GET['alert'] == 5) { ?>
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Pastikan ukuran file tidak lebih dari 1 Mb.
    </div>
<?php
} 
// jika alert = 6
// tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.PDF"
elseif ($_GET['alert'] == 6) { ?>
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Pastikan file yang diupload bertipe *.PDF.
    </div>
<?php
} 
?>

    <div class="content-body"><!-- Basic Tables start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a href="surat-keputusan-add" class="btn btn-primary"><i class="icon-plus"></i> Tambah </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                                <div class="dropdown-menu">
                                    <a data-toggle="modal" class="dropdown-item" href="#pdf"><i class="icon-file-pdf mr-1"></i> PDF</a>
                                    <div class="dropdown-divider"></div>
                                    <a data-toggle="modal" class="dropdown-item" href="#excel"><i class="icon-file-excel mr-1"></i> Excel</a>
                                </div>
                            </div>
                        </h4>
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
                                        <th>Nama SK</th>
                                        <th>Nomor SK</th>
                                        <th>Ditetapkan</th>
                                        <th>e-Doc</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                // fungsi query untuk menampilkan data dari tabel surat_keputusan
                                $query = mysqli_query($mysqli, "SELECT id_sk,nama_sk,nomor_sk,tgl_penetapan,edoc FROM surat_keputusan ORDER BY id_sk DESC")
                                                                or die('Ada kesalahan pada query tampil data surat keputusan: '.mysqli_error($mysqli));

                                while ($data = mysqli_fetch_assoc($query)) { 
                                    $tanggal       = $data['tgl_penetapan'];
                                    $exp           = explode('-',$tanggal);
                                    $tgl_penetapan = $exp[2]."-".$exp[1]."-".$exp[0];
                                ?>
                                    <tr>
                                        <td width="30" class="center"><?php echo $no; ?></td>
                                        <td width="280"><?php echo $data['nama_sk']; ?></td>
                                        <td width="150" class="center"><?php echo $data['nomor_sk']; ?></td>
                                        <td width="70" class="center"><?php echo $tgl_penetapan; ?></td>
                                        <td width="50" class="center">
                                            <a data-toggle="tooltip" data-placement="top" title="Tampilkan e-Doc" style="font-size:20px" href="surat-keputusan-view-<?php echo $data['id_sk']; ?>"><i class="icon-file-text2"></i></a>
                                        </td>

                                        <td width="60" class="center">
                                            <div class="action-buttons">
                                                <a data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-primary btn-sm" href="surat-keputusan-update-<?php echo $data['id_sk']; ?>">
                                                    <i class="icon-pencil2"></i>
                                                </a>

                                                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="surat-keputusan-delete-<?php echo $data['id_sk'];?>" onclick="return confirm('Anda yakin ingin menghapus surat keputusan <?php echo $data['nama_sk']; ?> ?');">
                                                    <i class="icon-bin"></i>
                                                </a>
                                            </div>
                                        </td>
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

    <!-- Modal PDF -->
    <div class="modal fade text-xs-left" id="pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1"><i style="margin-right:7px" class="icon-download"></i> Export PDF </h4>
                </div>
                <form action="surat-keputusan-export-pdf" method="POST" target="_blank">
                    <div class="modal-body">
                        <div class="form-body">
                            <p>Tanggal Penetapan</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="export" value="Export">
                        <button type="button" class="btn btn-warning btn-reset" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Excel -->
    <div class="modal fade text-xs-left" id="excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1"><i style="margin-right:7px" class="icon-download"></i> Export Excel </h4>
                </div>
                <form action="surat-keputusan-export-excel" method="POST" target="_blank">
                    <div class="modal-body">
                        <div class="form-body">
                            <p>Tanggal Penetapan</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="export" value="Export">
                        <button type="button" class="btn btn-warning btn-reset" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>