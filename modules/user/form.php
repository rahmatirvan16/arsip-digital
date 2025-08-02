<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
	<div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-pencil22"></i> Input User </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item"><a href="user">User</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form" action="modules/user/proses.php?act=insert" method="POST">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" class="form-control" name="nama_user" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
											<label>Hak Akses</label>
											<select class="form-control" name="hak_akses" placeholder="-- Pilih --" autocomplete="off" required>
												<option value=""></option>
												<option value="Admin">Admin</option>
												<option value="User">User</option>
											</select>
										</div>

										<div class="form-group">
											<label>Blokir User</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1 mr-1">
													<input type="radio" name="blokir" class="custom-control-input" value="Ya" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Ya </span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="blokir" class="custom-control-input" checked value="Tidak" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Tidak </span>
												</label>
											</div>
										</div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="simpan" value="Simpan">
                                        <a href="user" class="btn btn-warning btn-reset"> Batal </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
		$id_user = $_GET['id'];
	    // fungsi query untuk menampilkan data dari tabel user
	    $query = mysqli_query($mysqli, "SELECT id_user,nama_user,username,hak_akses,blokir FROM sys_user WHERE id_user='$id_user'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Data User </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="user">User</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form" action="modules/user/proses.php?act=update" method="POST">
                                    <div class="form-body">
										
										<input type="hidden" name="id" value="<?php echo $data['id_user']; ?>">

                                        <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" class="form-control" name="nama_user" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Kosongkan password jika tidak diubah" autocomplete="off">
                                        </div>

                                        <div class="form-group">
											<label>Hak Akses</label>
											<select class="form-control" name="hak_akses" autocomplete="off" required>
												<option value="<?php echo $data['hak_akses']; ?>"><?php echo $data['hak_akses']; ?></option>
												<option value="Admin">Admin</option>
												<option value="User">User</option>
											</select>
										</div>

										<div class="form-group">
											<label>Blokir User</label>
											<div class="input-group">
											<?php  
											if ($data['blokir']=='Ya') { ?>
												<label class="display-inline-block custom-control custom-radio ml-1 mr-1">
													<input type="radio" name="blokir" class="custom-control-input" checked value="Ya" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Ya </span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="blokir" class="custom-control-input" value="Tidak" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Tidak </span>
												</label>
											<?php
											} elseif ($data['blokir']=='Tidak') { ?>
												<label class="display-inline-block custom-control custom-radio ml-1 mr-1">
													<input type="radio" name="blokir" class="custom-control-input" value="Ya" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Ya </span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="blokir" class="custom-control-input" checked value="Tidak" required>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0"> Tidak </span>
												</label>
											<?php
											}
											?>
											</div>
										</div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="simpan" value="Simpan">
                                        <a href="user" class="btn btn-warning btn-reset"> Batal </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
?>