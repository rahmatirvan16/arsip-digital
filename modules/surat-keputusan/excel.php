<?php 
if (isset($_POST['export'])) {
	session_start();
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

	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("content-disposition: attachment;filename=DATA-ARSIP-SURAT-KEPUTUSAN.xls");
	?>

	<!-- Buat Table saat di Export Ke Excel -->
	<center>
		<h3>DATA ARSIP DIGITAL <br>
	    <?php  
        if ($tgl_awal==$tgl_akhir) { ?>
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        <?php
        } else { ?>
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        <?php
        }
        ?>
	</center>
	<br>
	<table border='1'>
		<h3>
			<thead>
				<tr>
					<td align="center" valign="top" width="50">No.</td>
					<td align="center" valign="top" width="600">Judul</td>
					<td align="center" valign="top" width="200">KETERANGAN (GU/SPM)</td>
					<td align="center" valign="top" width="150">Tanggal</td>
				</tr>
			</thead>
		</h3>

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
				    <td align="center" valign="top"><?php echo $no; ?></td>
				    <td valign="top"><?php echo $data['nama_sk']; ?></td>
				    <td align="center" valign="top"><?php echo $data['nomor_sk']; ?></td>
				    <td align="center" valign="top"><?php echo $tgl_penetapan; ?></td>
				</tr>
			<?php
				$no++;
			}
		} else { ?>
			<tr>
			    <td align="center" valign="top"></td>
			    <td valign="top">Tidak ada data yang ditemukan</td>
			    <td align="center" valign="top"></td>
			    <td align="center" valign="top"></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>

	<div style="text-align: right">
	    <h4>Sabang, <?php echo tgl_eng_to_ind("$hari_ini"); ?></h4>
	</div>
<?php  
}
?>