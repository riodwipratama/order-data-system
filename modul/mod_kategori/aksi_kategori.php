<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'kategori' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $nama_merk = trimed($_POST['kategori']);

        $cek = mysqli_query($conn, "SELECT kategori FROM tbl_kategori WHERE kategori = '$nama_merk'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Kategori yang anda masukkan sudah ada. Periksa kembali data kategori yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($conn, "INSERT INTO tbl_kategori(
                                    kategori)
                            VALUES(
                                    '$_POST[kategori]')") or die(mysql_error());
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'kategori' AND $act == 'ubah') {
		$nama_merk = trimed($_POST['kategori']);
        mysqli_query($conn, "UPDATE tbl_kategori SET Kategori     = '$nama_merk'
                                WHERE id_kategori      = '$_POST[id_kategori]'");
        header('location:../../index.php?modul=' . $module . '&pesan=ubah');
    } elseif ($module == 'kategori' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($conn, "DELETE FROM tbl_kategori WHERE id_kategori='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
    }
}
?>
