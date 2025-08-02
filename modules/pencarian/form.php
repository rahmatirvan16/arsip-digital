<?php  
if (isset($_GET['id'])) {
    $id_sk = $_GET['id'];
    // fungsi query untuk menampilkan data dari tabel pengguna
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
            <h3 class="content-header-title"><i class="icon-file-text2"></i> Dokumen Elektronik Surat Keputusan </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="surat-keputusan">Surat Keputusan</a></li>
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