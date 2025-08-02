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
            // fungsi untuk membuat id_sk
            $query = mysqli_query($mysqli, "SELECT max(id_sk) as kode FROM surat_keputusan")
                                            or die('Ada kesalahan pada query tampil data id sk: '.mysqli_error($mysqli));

            $data               = mysqli_fetch_assoc($query);
            $id_sk              = $data['kode'] + 1;
            
            // ambil data hasil submit dari form
            $nama_sk            = mysqli_real_escape_string($mysqli, trim($_POST['nama_sk']));
            $nomor_sk           = mysqli_real_escape_string($mysqli, trim($_POST['nomor_sk']));
            
            $tanggal            = mysqli_real_escape_string($mysqli, trim($_POST['tgl_penetapan']));
            $exp                = explode('-',$tanggal);
            $tgl_penetapan      = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $nama_file          = $id_sk."_".$_FILES['edoc']['name'];
            $ukuran_file        = $_FILES['edoc']['size'];
            $tipe_file          = $_FILES['edoc']['type'];
            $tmp_file           = $_FILES['edoc']['tmp_name'];
            
            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('pdf','PDF');
            
            // Set path folder tempat menyimpan filenya
            $path               = "../../dokumen/".$nama_file;
            
            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
            
            $created_user       = $_SESSION['id_user'];

            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
            if(in_array($extension, $allowed_extensions)) {
                // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path)) { // Cek apakah file berhasil diupload atau tidak
                        // Jika file berhasil diupload, Lakukan : 
                        // perintah query untuk menyimpan data ke tabel surat keputusan
                        $query = mysqli_query($mysqli, "INSERT INTO surat_keputusan(id_sk,nama_sk,nomor_sk,tgl_penetapan,edoc,created_user)
                                                        VALUES('$id_sk','$nama_sk','$nomor_sk','$tgl_penetapan','$nama_file','$created_user')")
                                                        or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil simpan data
                            header("location: ../../surat-keputusan-success-add");
                        }   
                    } else {
                        // Jika file gagal diupload, tampilkan pesan gagal upload
                        header("location: ../../surat-keputusan-error1");
                    }
                } else {
                    // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                    header("location: ../../surat-keputusan-error2");
                }
            } else {
                // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                header("location: ../../surat-keputusan-error3");
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_sk              = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $nama_sk            = mysqli_real_escape_string($mysqli, trim($_POST['nama_sk']));
                $nomor_sk           = mysqli_real_escape_string($mysqli, trim($_POST['nomor_sk']));
                
                $tanggal            = mysqli_real_escape_string($mysqli, trim($_POST['tgl_penetapan']));
                $exp                = explode('-',$tanggal);
                $tgl_penetapan      = $exp[2]."-".$exp[1]."-".$exp[0];
                
                $nama_file          = $id_sk."_".$_FILES['edoc']['name'];
                $ukuran_file        = $_FILES['edoc']['size'];
                $tipe_file          = $_FILES['edoc']['type'];
                $tmp_file           = $_FILES['edoc']['tmp_name'];
                
                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('pdf','PDF');
                
                // Set path folder tempat menyimpan filenya
                $path               = "../../dokumen/".$nama_file;
                
                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);
                
                $updated_user       = $_SESSION['id_user'];
                $updated_date       = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // jika edoc tidak diubah
                if (empty($_POST['check_edoc'])) {
                    // perintah query untuk mengubah data pada tabel surat_keputusan
                    $query = mysqli_query($mysqli, "UPDATE surat_keputusan SET  nama_sk         = '$nama_sk',
                                                                                nomor_sk        = '$nomor_sk',
                                                                                tgl_penetapan   = '$tgl_penetapan',
                                                                                updated_user    = '$updated_user',
                                                                                updated_date    = '$updated_date'
                                                                          WHERE id_sk           = '$id_sk'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../surat-keputusan-success-update");
                    }   
                }
                // jika edoc diubah
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if(in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path)) { // Cek apakah file berhasil diupload atau tidak
                                // Jika file berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel surat_keputusan
                                $query = mysqli_query($mysqli, "UPDATE surat_keputusan SET  nama_sk         = '$nama_sk',
                                                                                            nomor_sk        = '$nomor_sk',
                                                                                            tgl_penetapan   = '$tgl_penetapan',
                                                                                            edoc            = '$nama_file',
                                                                                            updated_user    = '$updated_user',
                                                                                            updated_date    = '$updated_date'
                                                                                      WHERE id_sk           = '$id_sk'")
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../surat-keputusan-success-update");
                                }  
                            } else {
                                // Jika file gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../surat-keputusan-error1");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1 Mb, tampilkan pesan gagal upload
                            header("location: ../../surat-keputusan-error2");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan PDF, tampilkan pesan gagal upload
                        header("location: ../../surat-keputusan-error3");
                    } 
                }
            }
        }
    }      

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_sk = $_GET['id'];

            // perintah query untuk menampilkan data edoc berdasaran id_sk
            $query = mysqli_query($mysqli, "SELECT edoc FROM surat_keputusan WHERE id_sk='$id_sk'")
                                            or die('Ada kesalahan pada query tampil edoc: '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            $edoc = $data['edoc'];
            
            // hapus file edoc dari folder dokumen
            $hapus_file = unlink("../../dokumen/$edoc");   

            // cek hapus file
            if ($hapus_file) {
                // perintah query untuk menghapus data pada tabel surat_keputusan
                $query = mysqli_query($mysqli, "DELETE FROM surat_keputusan WHERE id_sk='$id_sk'")
                                                or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

                // cek hasil query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil delete data
                    header("location: surat-keputusan-success-delete");
                }
            }
        }
    }    
}       
?>