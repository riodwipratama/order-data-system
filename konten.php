<?php
if ($_SESSION == NULL) {
    echo "<script>alert('Anda belum login, silahkan login untuk mengakses halaman administrator !.'); window.location = 'login.php'</script>";
} else {
    //NOTIFIKASI PESAN ERROR BERDASARKAN GET URL pesan
    include"fungsi/fungsi_pesan.php";
    //AKHIR NOTIFIKASI

    if ($_GET['modul'] == 'home') {
        include "modul/mod_home/home_admin.php";
    } elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL KARYAWAN
    elseif ($_GET['modul'] == 'petugas') {
        include "modul/mod_petugas/petugas.php";
    } elseif ($_GET['modul'] == 'tambah_petugas') {
        include "modul/mod_petugas/tambah_petugas.php";
    } elseif ($_GET['modul'] == 'ubah_petugas') {
        include "modul/mod_petugas/ubah_petugas.php";
    } elseif ($_GET['modul'] == 'hapus_petugas') {
        include "modul/mod_petugas/hapus_petugas.php";
    }

    //MODUL JABTAN
    elseif ($_GET['modul'] == 'kategori') {
        include "modul/mod_kategori/kategori.php";
    } elseif ($_GET['modul'] == 'tambah_kategori') {
        include "modul/mod_kategori/tambah_kategori.php";
    } elseif ($_GET['modul'] == 'ubah_kategori') {
        include "modul/mod_kategori/ubah_kategori.php";
    } elseif ($_GET['modul'] == 'hapus_kategori') {
        include "modul/mod_kategori/hapus_kategori.php";
    }

    //MODUL NAMA PRODUK
    elseif ($_GET['modul'] == 'nama_produk') {
        include "modul/mod_nama_produk/nama_produk.php";
    } elseif ($_GET['modul'] == 'tambah_nama_produk') {
        include "modul/mod_nama_produk/tambah_nama_produk.php";
    } elseif ($_GET['modul'] == 'ubah_nama_produk') {
        include "modul/mod_nama_produk/ubah_nama_produk.php";
    } elseif ($_GET['modul'] == 'hapus_nama_produk') {
        include "modul/mod_nama_produk/hapus_nama_produk.php";
    }

    //MODUL PEMBELIAN
    elseif ($_GET['modul'] == 'pembelian') {
        include "modul/mod_pembelian/pembelian.php";
    } elseif ($_GET['modul'] == 'tambah_pembelian') {
        include "modul/mod_pembelian/tambah_pembelian.php";
    } elseif ($_GET['modul'] == 'laporan_pembelian') {
        include "modul/mod_pembelian/laporan_pembelian.php";
    }

    //MODUL PENJUALAN
    elseif ($_GET['modul'] == 'penjualan') {
        include "modul/mod_penjualan/penjualan.php";
    } elseif ($_GET['modul'] == 'tambah_penjualan') {
        include "modul/mod_penjualan/tambah_penjualan.php";
    } elseif ($_GET['modul'] == 'laporan_penjualan') {
        include "modul/mod_penjualan/laporan_penjualan.php";
    }

    //MODUL STOK BARANG
    elseif ($_GET['modul'] == 'antrian') {
        include "modul/mod_antrian/antrian.php";
    } elseif ($_GET['modul'] == 'detail_antrian') {
        include "modul/mod_antrian/detail_antrian.php";
    }


    //MODUL PASSWORD
    elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL UBAH FOTO
    elseif ($_GET['modul'] == 'foto') {
        include "modul/mod_profil/foto_admin.php";
    }
}
?>
