    <?php  
    // panggil fungsi untuk format tanggal
    include "config/fungsi_tanggal.php";
    // ambil data hasil submit dari form
    $cari = $_POST['cari'];
    ?>

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"><i class="icon-search4"></i> Pencarian Arsip </h2>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Pencarian</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Basic Tables start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-body collapse in">
                        <div id="search-results" class="card-block">
                            <div class="col-lg-12">
                                <p class="mb-2"><i style="margin-right:5px" class="icon-point-right"></i> Hasil Pencarian Arsip " <span style="font-style:italic"><?php echo $cari; ?></span> "</p>
                                <ul class="media-list row">
                                <?php
                                // fungsi query untuk menampilkan data dari tabel surat_keputusan
                                $query = mysqli_query($mysqli, "SELECT id_sk,nama_sk,nomor_sk,tgl_penetapan,edoc FROM surat_keputusan 
                                                                WHERE nama_sk LIKE '%$cari%' OR nomor_sk LIKE '%$cari%' ORDER BY id_sk DESC")
                                                                or die('Ada kesalahan pada query tampil data surat keputusan: '.mysqli_error($mysqli));

                                $rows  = mysqli_num_rows($query);
                                // jika data ada, tampilkan data hasil pencarian
                                if ($rows > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) { 
                                        $tanggal       = $data['tgl_penetapan'];
                                        $exp           = explode('-',$tanggal);
                                        $tgl_penetapan = $exp[2]."-".$exp[1]."-".$exp[0];
                                    ?>
                                        <li class="media">
                                            <div class="media-body">
                                                <p class="lead mb-0">
                                                    <a href="pencarian-detail-<?php echo $data['id_sk']; ?>"><span class="text-bold-600"><?php echo $data['nomor_sk']; ?></span> - <?php echo $data['nama_sk']; ?></a>
                                                </p>
                                                <p style="font-style:italic">Ditetapkan Tanggal <?php echo tgl_eng_to_ind($tgl_penetapan); ?></p>
                                            </div>
                                        </li>
                                    <?php  
                                    }
                                } else { ?>
                                    <li class="media">
                                        <div class="media-body">
                                            <p>" Tidak ada data yang cocok. "</p>
                                        </div>
                                    </li>
                                <?php
                                } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Basic Tables end -->
