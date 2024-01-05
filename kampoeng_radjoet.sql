-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 03.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakerin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_petugas`, `nama_petugas`, `username`, `password`, `hak_akses`, `foto`) VALUES
(1, 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', ''),
(3, 'Operator', 'pengguna', '827ccb0eea8a706c4c34a16891f84e7b', 'operator', 'file/foto_petugas/default_user.png'),
(4, 'Mochammad Rio Dwi Pratama', 'pemakai', '827ccb0eea8a706c4c34a16891f84e7b', 'operator', 'file/foto_petugas/default_user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_produk`
--

CREATE TABLE `nama_produk` (
  `id_nama_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_produk`
--

INSERT INTO `nama_produk` (`id_nama_produk`, `id_kategori`, `nama_produk`) VALUES
(9, 16, 'Handuk Turban Legend'),
(10, 13, 'Handuk bayi'),
(11, 17, 'Handuk Pet Microfiber'),
(12, 18, 'Lap Microfiber'),
(13, 13, 'Handuk mandi'),
(14, 16, 'Handuk Dewasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_nama_produk` int(11) NOT NULL,
  `tanggal_terima_brg` varchar(30) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `buyer` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_nama_produk`, `tanggal_terima_brg`, `tgl_pembelian`, `quantity`, `buyer`, `keterangan`, `status`) VALUES
(26, 9, '1-2 minggu', '2018-10-06', '5000 pcs', 'Saya', 'mix 3 warna', 1),
(27, 10, '2 minggu', '2018-10-06', '500 pcs', 'oriflame', 'Mix 3 warna(merah, biru, hijau)', 1),
(28, 12, '3 minggu', '2018-11-07', '2500 pcs', '3M', 'Mix 3 warna biru, hitam, merah\r\n', 1),
(29, 12, '5 minggu', '2018-11-20', '2000 pcs', '3 M', 'Mix 5 warna (merah, putih, hijau, kuning, orange)', 1),
(30, 11, '10 minggu', '2018-11-21', '10000 pcs', '3 M', 'Mix 10 warna saja\r\n', 0),
(31, 14, '3 minggu', '2018-11-25', '500 pcs', 'Anda', 'Mix 5 warna(merah, kuning, hijau, biru, putih)', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(13, 'Personal Cleaning Care -'),
(16, 'Home Cleaning Care -'),
(17, 'Pet Cleaning Care -'),
(18, 'Equipment Cleaning Care -');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terima_barang`
--

CREATE TABLE `terima_barang` (
  `id_terima_barang` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terima_barang`
--

INSERT INTO `terima_barang` (`id_terima_barang`, `id_pemesanan`, `tgl_penjualan`, `keterangan`) VALUES
(20, 27, '2018-10-07', 'lunak'),
(21, 28, '2018-11-08', 'Shipping'),
(19, 0, '2018-10-10', ''),
(22, 29, '2018-11-25', 'Selesai dikirim pukul 3 sore\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `nama_produk`
--
ALTER TABLE `nama_produk`
  ADD PRIMARY KEY (`id_nama_produk`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_merk` (`id_nama_produk`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `terima_barang`
--
ALTER TABLE `terima_barang`
  ADD PRIMARY KEY (`id_terima_barang`),
  ADD KEY `id_pembelian` (`id_pemesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nama_produk`
--
ALTER TABLE `nama_produk`
  MODIFY `id_nama_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `terima_barang`
--
ALTER TABLE `terima_barang`
  MODIFY `id_terima_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
