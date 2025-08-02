<?php
if (isset($_POST['export'])) {
    session_start();
    ob_start();

    // Panggil koneksi database.php untuk koneksi database
    require_once "../../config/database.php";
    // panggil fungsi untuk format tanggal
    include "../../config/fungsi_tanggal.php";

    $hari_ini = date("d-m-Y");

    // ambil data hasil submit dari form
    $tgl1      = $_POST['tgl_awal'];
    $exp       = explode('-',$tgl1);
    $tgl_awal  = $exp[2]."-".$exp[1]."-".$exp[0];

    $tgl2      = $_POST['tgl_akhir'];
    $exp       = explode('-',$tgl2);
    $tgl_akhir = $exp[2]."-".$exp[1]."-".$exp[0];
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Data Arsip Surat Keputusan</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
        </head>
        <body>
            <div id="title">
                DATA ARSIP SURAT KEPUTUSAN 
            </div>
        <?php  
        if ($tgl_awal==$tgl_akhir) { ?>
            <div id="title-tanggal">
                Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
            </div>
        <?php
        } else { ?>
            <div id="title-tanggal">
                Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
            </div>
        <?php
        }
        ?>
            
            <hr><br>
            <div id="isi">
                <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                    <thead style="background:#e8ecee">
                        <tr class="tr-title">
                            <th height="25" align="center" valign="middle">No.</th>
                            <th height="25" align="center" valign="middle">Nama Surat Keputusan</th>
                            <th height="25" align="center" valign="middle">Nomor Surat Keputusan</th>
                            <th height="25" align="center" valign="middle">Tanggal Penetapan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $no = 1;
                    // fungsi query untuk menampilkan data dari tabel surat_keputusan
                    $query = mysqli_query($mysqli, "SELECT id_sk, nama_sk, nomor_sk, tgl_penetapan FROM surat_keputusan 
                                                    WHERE tgl_penetapan BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_sk ASC")
                                                    or die('Ada kesalahan pada query tampil data surat keputusan: '.mysqli_error($mysqli));

                    $rows = mysqli_num_rows($query);

                    // jika data ada, tampilkan data
                    if ($rows > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { 
                            $tanggal       = $data['tgl_penetapan'];
                            $exp           = explode('-',$tanggal);
                            $tgl_penetapan = $exp[2]."-".$exp[1]."-".$exp[0];
                        ?>
                            <tr>
                                <td width="50" height="17" align="center" valign="middle"><?php echo $no; ?></td>
                                <td style="padding-left:5px;" width="600" height="17" valign="middle"><?php echo $data["nama_sk"]; ?></td>
                                <td width="200" height="17" align="center" valign="middle"><?php echo $data["nomor_sk"]; ?></td>
                                <td style="padding-left:10px;" width="150" height="17" valign="middle"><?php echo tgl_eng_to_ind($tgl_penetapan); ?></td>
                            </tr>
                         <?php
                            $no++;
                        } 
                    } else { ?>
                        <tr>
                            <td width="50" height="17" align="center" valign="middle"></td>
                            <td style="padding-left:5px;" width="600" height="17" valign="middle"> Tidak ada data yang ditemukan </td>
                            <td width="200" height="17" align="center" valign="middle"></td>
                            <td style="padding-left:10px;" width="150" height="17" valign="middle"></td>
                        </tr>
                    <?php
                    } ?>
                    </tbody>
                </table>

                <div id="footer-tanggal">
                    Bandarlampung, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
                </div>
            </div>
        </body>
    </html><!-- Akhir halaman HTML yang akan di konvert -->
    <?php
    $filename="Data Arsip Surat Keputusan.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
    //==========================================================================================================
    $content = ob_get_clean();
    $content = '<page style="font-family: freeserif">'.($content).'</page>';
    // panggil library html2pdf
    require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($filename);
    }
    catch(HTML2PDF_exception $e) { echo $e; }
}
?>