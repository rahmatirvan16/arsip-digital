<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
	<div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Arsip Digital </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item"><a href="surat-keputusan">Arsip Digital</a></li>
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
                                <form class="form" action="modules/surat-keputusan/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <textarea rows="2" class="form-control" name="nama_sk" autocomplete="off" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan (GU/SPM)</label>
                                            <input type="text" class="form-control" name="nomor_sk" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_penetapan" autocomplete="off" required>
                                        </div>

										<div class="form-group">
                                            <label class="mt-1 mr-1">Dokumen Elektronik</label>
                                            <label class="file center-block">
                                                <input type="file" id="file" name="edoc" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 1 Mb" autocomplete="off" required>
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="simpan" value="Simpan">
                                        <a href="surat-keputusan" class="btn btn-warning btn-reset"> Batal </a>
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
		$id_sk = $_GET['id'];
	    // fungsi query untuk menampilkan data dari tabel surat_keputusan
	    $query = mysqli_query($mysqli, "SELECT id_sk,nama_sk,nomor_sk,tgl_penetapan,edoc FROM surat_keputusan WHERE id_sk='$id_sk'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

        $tanggal       = $data['tgl_penetapan'];
        $exp           = explode('-',$tanggal);
        $tgl_penetapan = $exp[2]."-".$exp[1]."-".$exp[0];
  	}
?>
	<div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Data Arsip Digital </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="surat-keputusan">Arsip Digital</a></li>
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
                                <form class="form" action="modules/surat-keputusan/proses.php?act=update" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
										
										<input type="hidden" name="id" value="<?php echo $data['id_sk']; ?>">

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <textarea rows="2" class="form-control" name="nama_sk" autocomplete="off" required><?php echo $data['nama_sk']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan (GU/SPM)</label>
                                            <input type="text" class="form-control" name="nomor_sk" autocomplete="off" value="<?php echo $data['nomor_sk']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label><input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_penetapan" autocomplete="off" value="<?php echo $tgl_penetapan; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="mt-1 mr-1">Dokumen Elektronik</label>
                                            <label class="file center-block">
                                                <input type="file" id="file" name="edoc" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 1 Mb" autocomplete="off">
                                                <span class="file-custom"></span>
                                            </label>
                                            <label><input type="checkbox" name="check_edoc" value="Y"> Ceklis jika dokumen elektronik diubah</label>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary btn-simpan mr-1" name="simpan" value="Simpan">
                                        <a href="surat-keputusan" class="btn btn-warning btn-reset"> Batal </a>
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
// jika form view data yang dipilih
elseif ($_GET['form']=='view') { 
    if (isset($_GET['id'])) {
        $id_sk = $_GET['id'];
        // fungsi query untuk menampilkan data dari tabel surat_keputusan
        $query = mysqli_query($mysqli, "SELECT id_sk,edoc,created_date FROM surat_keputusan WHERE id_sk='$id_sk'") 
                                        or die('Ada kesalahan pada query tampil data view : '.mysqli_error($mysqli));
        $data  = mysqli_fetch_assoc($query);

        $tgl  = substr($data['created_date'],0,10);
        $exp  = explode('-',$tgl);
        $date = $exp[2]."-".$exp[1]."-".$exp[0];
        
        $time = substr($data['created_date'],11);
    }
?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-file-text2"></i> Dokumen Elektronik Arsip Digital </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="surat-keputusan">Arsip Digital</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                            <h4 class="card-title">
                                <a href="surat-keputusan" class="btn btn-warning"><i class="icon-arrow-left2"></i> Kembali </a>
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
                            <div class="card-block">
                                <p>Diupload Tanggal <?php echo $date; ?> <?php echo $time; ?></p>
                                <embed src="dokumen/<?php echo $data['edoc']; ?>" type="application/pdf" width="100%" height="500px"></embed>
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