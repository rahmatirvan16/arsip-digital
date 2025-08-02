<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // fungsi untuk membuat id_user
            $query = mysqli_query($mysqli, "SELECT max(id_user) as kode FROM sys_user")
                                            or die('Ada kesalahan pada query tampil data id user: '.mysqli_error($mysqli));

            $data         = mysqli_fetch_assoc($query);
            $id_user      = $data['kode'] + 1;
            
            // ambil data hasil submit dari form
            $nama_user    = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
            $username     = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            $password     = sha1(md5(mysqli_real_escape_string($mysqli, trim($_POST['password']))));
            $hak_akses    = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));
            $blokir       = mysqli_real_escape_string($mysqli, trim($_POST['blokir']));
            
            $created_user = $_SESSION['id_user'];

            // perintah query untuk mengecek username
            $query = mysqli_query($mysqli, "SELECT username FROM sys_user WHERE username='$username'")
                                            or die('Ada kesalahan pada query tampil data username: '.mysqli_error($mysqli));
            $rows = mysqli_num_rows($query);

            // jika username sudah ada
            if ($rows > 0) {
                // tampilkan pesan gagal hapus data
                header("location: ../../user-error1-$username");
            }
            // jika nip belum ada
            else {
                // perintah query untuk menyimpan data ke tabel sys_user
                $query = mysqli_query($mysqli, "INSERT INTO sys_user(id_user,nama_user,username,password,hak_akses,blokir,created_user)
                                                VALUES('$id_user','$nama_user','$username','$password','$hak_akses','$blokir','$created_user')")
                                                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../user-success-add");
                }
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_user      = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $nama_user    = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
                $username     = mysqli_real_escape_string($mysqli, trim($_POST['username']));
                $password     = sha1(md5(mysqli_real_escape_string($mysqli, trim($_POST['password']))));
                $hak_akses    = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));
                $blokir       = mysqli_real_escape_string($mysqli, trim($_POST['blokir']));
                
                $updated_user = $_SESSION['id_user'];
                $updated_date = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // jika password tidak diubah
                if (empty($_POST['password'])) {
                    // perintah query untuk mengubah data pada tabel sys_user
                    $query = mysqli_query($mysqli, "UPDATE sys_user SET nama_user       = '$nama_user',
                                                                        username        = '$username',
                                                                        hak_akses       = '$hak_akses',
                                                                        blokir          = '$blokir',
                                                                        updated_user    = '$updated_user',
                                                                        updated_date    = '$updated_date'
                                                                  WHERE id_user         = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../user-success-update");
                    }   
                }
                // jika password diubah
                else {
                    // perintah query untuk mengubah data pada tabel sys_user
                    $query = mysqli_query($mysqli, "UPDATE sys_user SET nama_user       = '$nama_user',
                                                                        username        = '$username',
                                                                        password        = '$password',
                                                                        hak_akses       = '$hak_akses',
                                                                        blokir          = '$blokir',
                                                                        updated_user    = '$updated_user',
                                                                        updated_date    = '$updated_date'
                                                                  WHERE id_user         = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../user-success-update");
                    }   
                }
            }
        }
    }      

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_user = $_GET['id'];

            // perintah query untuk menampilkan data user dari tabel surat keputusan berdasarkan id user
            $query1 = mysqli_query($mysqli, "SELECT created_user, updated_user FROM surat_keputusan
                                            WHERE created_user='$id_user' OR updated_user='$id_user'")
                                            or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));
            $rows1 = mysqli_num_rows($query1);

            // perintah query untuk menampilkan data user dari tabel sys_user berdasarkan id user
            $query2 = mysqli_query($mysqli, "SELECT created_user, updated_user FROM sys_user
                                            WHERE created_user='$id_user' OR updated_user='$id_user'")
                                            or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));
            $rows2 = mysqli_num_rows($query2);

            // jika data ada
            if ($rows1 > 0 || $rows2 > 0) {
                // tampilkan pesan gagal hapus data
                header("location: user-error2-$id_user");
            }
            // jika data tidak ada
            else {
                // perintah query untuk menghapus data pada tabel sys_user
                $query = mysqli_query($mysqli, "DELETE FROM sys_user WHERE id_user='$id_user'")
                                                or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

                // cek hasil query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil delete data
                    header("location: user-success-delete");
                }
            }
        }
    }    
}       
?>