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
    include"../../fungsi/format_number.php";

    //MODUL TAMBAH GURU
    if ($module == 'penjualan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $id_pembelian = $_POST['id_pemesanan'];
    		$tgl_penjualan = format_indotosql($_POST['tgl_penjualan']);
    		$keterangan = $_POST['keterangan'];


        $cek = mysqli_query($conn, "SELECT * FROM terima_barang
									WHERE id_pemesanan = '$id_pembelian'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Terima Barang yang anda masukkan sudah ada. Periksa kembali data terima Barang yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($conn, "INSERT INTO terima_barang(
                                    id_pemesanan,
                                    tgl_penjualan,

                                    keterangan)
                            VALUES(
                                    '$id_pembelian',
                                    '$tgl_penjualan',

									'$keterangan')") or die(mysqli_error($conn));

				mysqli_query($conn, "UPDATE pemesanan SET status = 1 WHERE id_pemesanan = $id_pembelian");

                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }elseif ($module == 'penjualan' AND $act == 'hapus') {
            $query = mysqli_query($conn, "DELETE FROM terima_barang WHERE id_terima_barang='$_GET[id]'");
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
