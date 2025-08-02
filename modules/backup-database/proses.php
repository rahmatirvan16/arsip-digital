<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil file fungsi_backup_import.php untuk backup database
require_once "../../config/fungsi_backup_import.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login'>";
}
// jika user sudah login, maka jalankan perintah untuk backup dan insert
else {
    if ($_GET['act']=='backup') {
        $date = gmdate("Ymd_His", time()+60*60*7);  // waktu backup
        $dir  = "../../database";                   // direktori file backup
        $name = $date.'_database';                  // nama sql backup
        // jalankan perintah backup database
        $backup = backup_database( $dir, $name, $server, $username, $password, $database);
        
        // fungsi untuk pengecekan proses backup
        // jika backup berhasil
        if ($backup) {
            // fungsi untuk membuat id_db
            $query = mysqli_query($mysqli, "SELECT max(id_db) as kode FROM sys_database")
                                            or die('Ada kesalahan pada query tampil data id db: '.mysqli_error($mysqli));

            $data         = mysqli_fetch_assoc($query);
            $id_db        = $data['kode'] + 1;
            $nama_db      = $name.'.sql.gz';
            $aksi         = "Backup";
            $created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel sys_database
            $query = mysqli_query($mysqli, "INSERT INTO sys_database(id_db,nama_db,aksi,created_user)
                                            VALUES('$id_db','$nama_db','$aksi','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil backup database
                header("location: backup-database-success");
            }  
        }    
    }  
}       
?>