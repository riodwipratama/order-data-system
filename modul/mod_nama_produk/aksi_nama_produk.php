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
    if ($module == 'nama_produk' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $nama_produk = trimed($_POST['nama_produk']);

        $cek = mysqli_query($conn, "SELECT nama_produk FROM nama_produk WHERE nama_produk = '$nama_produk'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Merk yang anda masukkan sudah ada. Periksa kembali data Merk yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($conn, "INSERT INTO nama_produk(id_kategori,
                                    nama_produk)
                            VALUES(
                                    '$_POST[id_kategori]',
                                    '$_POST[nama_produk]')") or die(mysqli_error($conn));
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'nama_produk' AND $act == 'ubah') {
	$nama_produk = trimed($_POST['nama_produk']);
        mysqli_query($conn, "UPDATE nama_produk SET id_kategori     = '$_POST[id_kategori]',
                                    nama_produk     = '$nama_produk'
                                WHERE id_kategori      = '$_POST[id_nama_produk]'")or die(mysqli_error($conn));
        header('location:../../index.php?modul=' . $module . '&pesan=ubah');
    } elseif ($module == 'nama_produk' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($conn, "DELETE FROM nama_produk WHERE id_nama_produk='$_GET[id]'");
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
