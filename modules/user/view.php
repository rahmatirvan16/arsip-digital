    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-user"></i> Manajemen User </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">User</li>
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
// tampilkan pesan "user baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> User baru berhasil disimpan.
    </div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "data user berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data user berhasil diubah.
    </div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "data user berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
    <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data user berhasil dihapus.
    </div>
<?php
} 
// jika alert = 4
// tampilkan pesan Gagal "username sudah ada"
elseif ($_GET['alert'] == 4) { ?>
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> 
        <?php 
        // fungsi query untuk menampilkan data dari tabel sys_user
        $query = mysqli_query($mysqli, "SELECT username FROM sys_user WHERE username='$_GET[id]'")
                                        or die('Ada kesalahan pada query tampil data username: '.mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($query);
        ?>
        Username <b><?php echo $data['username']; ?></b> sudah ada.
        <br>
    </div>
<?php
}   
// jika alert = 5
// tampilkan pesan Gagal "Data masih digunakan ditabel lain"
elseif ($_GET['alert'] == 5) { ?>
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> <br>
        <?php 
        // fungsi query untuk menampilkan data dari tabel sys_user
        $query = mysqli_query($mysqli, "SELECT id_user, username FROM sys_user WHERE id_user='$_GET[id]'")
                                        or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($query);
        ?>
        Username <b><?php echo $data['username']; ?></b> tidak bisa dihapus karena username tersebut sudah tercatat pada data lain.
        <br>
    </div>
<?php
}
?>

    <div class="content-body"><!-- Basic Tables start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><a href="user-add" class="btn btn-primary"><i class="icon-plus"></i> Tambah </a></h4>
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
                                        <th>Nama Pegawai</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th>Blokir User</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                // fungsi query untuk menampilkan data dari tabel sys_user
                                $query = mysqli_query($mysqli, "SELECT id_user,nama_user,username,hak_akses,blokir FROM sys_user ORDER BY id_user DESC")
                                                                or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));

                                while ($data = mysqli_fetch_assoc($query)) { 
                                ?>
                                    <tr>
                                        <td width="40" class="center"><?php echo $no; ?></td>
                                        <td width="180"><?php echo $data['nama_user']; ?></td>
                                        <td width="180"><?php echo $data['username']; ?></td>
                                        <td width="100" class="center"><?php echo $data['hak_akses']; ?></td>
                                        <td width="100" class="center"><?php echo $data['blokir']; ?></td>

                                        <td width="70" class="center">
                                            <div class="action-buttons">
                                                <a data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-primary btn-sm" href="user-update-<?php echo $data['id_user']; ?>">
                                                    <i class="icon-pencil2"></i>
                                                </a>

                                                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="user-delete-<?php echo $data['id_user'];?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data['username']; ?> ?');">
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