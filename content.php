<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login-error'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih pencarian, panggil file view pencarian
	if ($_GET['module']=='pencarian') {
		include "modules/pencarian/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih form pencarian, panggil file form pencarian
	elseif ($_GET['module']=='form_pencarian') {
		include "modules/pencarian/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih surat keputusan, panggil file view surat keputusan
	elseif ($_GET['module']=='surat_keputusan') {
		include "modules/surat-keputusan/view.php";
	}

	// jika halaman konten yang dipilih form surat keputusan, panggil file form surat keputusan
	elseif ($_GET['module']=='form_surat_keputusan') {
		include "modules/surat-keputusan/form.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih manajemen user, panggil file view manajemen user
	elseif ($_GET['module']=='user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form manajemen user, panggil file form manajemen user
	elseif ($_GET['module']=='form_user') {
		include "modules/user/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih backup database, panggil file view backup database
	elseif ($_GET['module']=='backup') {
		include "modules/backup-database/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih tentang aplikasi, panggil file view tentang aplikasi
	elseif ($_GET['module']=='tentang') {
		include "modules/tentang/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih petunjuk aplikasi, panggil file view petunjuk aplikasi
	elseif ($_GET['module']=='petunjuk') {
		include "modules/petunjuk/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
	// ---------------------------------------------------------------------------------
}
?>