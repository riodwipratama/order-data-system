<?php
session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";
include "../../fungsi/format_number.php";

$query = mysqli_query($conn, "SELECT tb.id_pemesanan, tb.keterangan, id_terima_barang, kategori, nama_produk, tanggal_terima_brg, buyer, tgl_penjualan, quantity
                                        FROM terima_barang tb
					JOIN pemesanan p ON p.id_pemesanan = tb.id_pemesanan
					JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
					JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
								WHERE id_terima_barang = '$_GET[id]'")or die(mysqli_error($conn));
$num = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if ($num == 0) {
	echo "<script language='javascript'>
				alert('Data penjualan tidak ditemukan atau masih kosong');
				window.location='../../index.php?modul=pembelian';
	</script>";
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A5');

$pdf->SetFont('Courier', 'I', 7);
$pdf->setXY(140,1);
$pdf->Cell(0, 6, 'Operator : '.$_SESSION['nama'] .', '.format_datetime_indo(date('Y-m-d H:m:s')), 0, 1, 'L', 0);
$pdf->Ln();
$pdf->SetFont('Courier', '', 10);
$pdf->setX(10);
$pdf->Cell(0, 4, 'CV. Kampoeng Radjoet ', '', 0, 'L');
$pdf->setX(140);
$pdf->Cell(0, 4, 'Tanggal ', '', 0, 'L');
$pdf->setX(160);
$pdf->Cell(0, 4, ': '.format_sqltoindo(date('Y-m-d')), '', 1, 'L');
$pdf->Cell(0, 4, 'Gg. Masjid Kelurahan No.28', '', 1, 'L');$pdf->setX(150);
$pdf->setX(10);
$pdf->Cell(0, 4, 'Telp. ', '', 1, 'L');
$pdf->setX(10);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(0, 4, 'FAKTUR PENERIMAAN BARANG', '', 1, 'C');
$pdf->Ln();

$pdf->SetFont('Courier', '', 10);

$w = array(6, 45, 50, 30, 35, 40); //163
//=========0, 1,  2,  3,  4,  5,  6, 7=====//
$pdf->setX(5);
$pdf->SetFont('courier', 'B', 8);
$pdf->Cell($w[1], 6, 'KATEGORI', 'TB', 0, 'C');
$pdf->Cell($w[2], 6, 'NAMA PRODUK', 'TB', 0, 'C');
$pdf->Cell($w[3], 6, 'TANGGAL SELESAI', 'TB', 0, 'C');
$pdf->Cell($w[4], 6, 'QUANTITY', 'TB', 0, 'C');
$pdf->Cell($w[4], 6, 'KETERANGAN', 'TB', 0, 'C');
$pdf->Ln(7);

$pdf->setX(5);
$pdf->SetFont('courier', '', 8);
$pdf->Cell($w[1], 6, $data['kategori'], 'TB', 0, 'C');
$pdf->Cell($w[2], 6, $data['nama_produk'], 'TB', 0, 'C');
$pdf->Cell($w[3], 6, $data['tgl_penjualan'], 'TB', 0, 'C');
$pdf->Cell($w[4], 6, $data['quantity'], 'TB', 0, 'C');
$pdf->Cell($w[4], 6, $data['keterangan'], 'TB', 0, 'C');
$pdf->Ln();

$pdf->setX(5);
$pdf->SetFont('courier', 'B', 9);
$pdf->Cell($w[1], 6, '', 'T', 0, 'C');
$pdf->Cell($w[2], 6, '', 'T', 0, 'C');
$pdf->Ln();

//footer selalu sama
$pdf->SetFont('courier', '', 8);
$pdf->Ln();
$pdf->setX(20);
$pdf->Cell(163 / 2, 6, 'MENGETAHUI,', 0, 0, 'C');
$pdf->Cell(163 / 2, 6, 'PEMESAN,', 0, 0, 'C');

$pdf->SetFont('courier', '', 8);
$pdf->Ln(20);
$pdf->setX(20);
$pdf->Cell(163 / 2, 6, 'CV. Kampoeng Radjoet', 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, strtoupper($data['buyer']), 0, 1, 'C', 0);
$pdf->Ln(20);
$pdf->Cell(0, 6, 'CV. Kampoeng Radjoet.', 0, 1, 'C', 0);
$pdf->Output();
?>
