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
    if ($module == 'pembelian' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $id_nama_produk = $_POST['id_nama_produk'];
        //$nama_produk = $_POST['nama_produk'];
        $tgl_terima_barang = $_POST['tanggal_terima_brg'];
        $tgl_pembelian = format_indotosql($_POST['tgl_pembelian']);
        $harga_pembelian = $_POST['quantity'];
        $penjual = $_POST['buyer'];
        $keterangan = $_POST['keterangan'];

        $cek = mysqli_query($conn, "SELECT * FROM pemesanan WHERE keterangan = '$keterangan'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Pembelian yang anda masukkan sudah ada. Periksa kembali data pembelian yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO pemesanan(
                                    id_nama_produk,
                                    tanggal_terima_brg,
                                    tgl_pembelian,
                                    quantity,
                                    buyer,
                                    keterangan,
                                    status)
                            VALUES(
                                    '$id_nama_produk',
                                    '$tgl_terima_barang',
                                    '$tgl_pembelian',
                                    '$harga_pembelian',
                                    '$penjual',
									'$keterangan',
									'0')") or die(mysqli_error($conn));
            if ($query) {
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            } else {
                header('location:../../index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'pembelian' AND $act == 'hapus') {
            $query = mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan='$_GET[id]'");
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
