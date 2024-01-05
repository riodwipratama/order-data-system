<?php

session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";

$bulan = substr($_POST['bulan'], 0, 2);
$tahun = substr($_POST['bulan'], 3, 4);

$query = mysqli_query($conn, "SELECT * FROM pemesanan p
                        JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
                        JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
			WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun'") or die(mysqli_error($conn));
$num = mysqli_num_rows($query);

if ($num == 0) {
    echo "<script language='javascript'>
                        alert('Data pembelian tidak ditemukan atau masih kosong');
                        window.location='../../index.php?modul=laporan_pembelian';
			</script>";
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN MASUK PEMESANAN', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 5, 'Periode Bulan : ' . format_month($bulan) . ' ' . $tahun, 0, 1, 'C');
$pdf->Ln();

$w = array(6, 25, 25, 35, 35, 20, 30); //163
//=========0, 1,  2,  3,  4,  5,  6, 7=====//

$list = array('NO', 'TGL PEMESANAN', 'BATAS WAKTU', 'KATEGORI', 'NAMA PRODUK', 'QUANTITY', 'BUYER');
//=============0, ========1, ========== 2, ======= 3, ======== 4,  =======5, ======6,  ==========7,
$pdf->setX(70);
$pdf->SetFont('Arial', 'B', 7);

$pdf->Cell($w[0], 6, 'NO', 'TLR', 0, 'L');
$pdf->Cell($w[1], 6, 'TANGGAL PESAN', 'TLR', 0, 'C');
$pdf->Cell($w[2], 6, 'BATAS WAKTU', 'TLR', 0, 'C');
$pdf->Cell($w[3], 6, 'KATEGORI', 'TLR', 0, 'C');
$pdf->Cell($w[4], 6, 'NAMA PRODUK', 'TLR', 0, 'C');
$pdf->Cell($w[5], 6, 'QUANTITY', 'TLR', 0, 'C');
$pdf->Cell($w[6], 6, 'BUYER', 'TLR', 0, 'C');
$pdf->Ln();

//Color and font restoration
$pdf->setX(4);
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(1);
$pdf->SetFont('Arial', '', 7);
//Data

$fill = false;
$i = 0;
$thbeli = 0;

while ($row = mysqli_fetch_array($query)) {
    $thbeli += $row['quantity'];

    $pdf->setX(70);
    $i++;
    $pdf->Cell($w[0], 6, $i, 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[1], 6, format_date($row['tgl_pembelian']), 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[2], 6, $row['tanggal_terima_brg'], 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[3], 6, $row['kategori'], 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[4], 6, $row['nama_produk'], 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[5], 6, $row['quantity'], 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[6], 6, $row['buyer'], 'TLRB', 1, 'C', $fill);
    $fill = !$fill;
}
$r_thbeli = $thbeli / $num;

//Closure line



$pdf->setX(70);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($w[0] + $w[1] + $w[2] + $w[3] + $w[4], 6, 'TOTAL', '', 0, 'C');
$pdf->Cell($w[5], 6, $thbeli, 1, 1, 'R');

//footer selalu sama
$pdf->SetFont('Arial', '', 9);
$pdf->Ln();
$pdf->setX(120);
$pdf->Cell(5, 6, 'CV. Kampoeng Radjoet, ' . format_date(date('Y-m-d')), 0, 1, 'C', 0);
$pdf->Ln(-2);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Disiapkan Oleh,', 0, 0, 'C');
$pdf->Cell(163 / 2, 6, 'Diketahui Oleh,', 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 9);
$pdf->Ln(20);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, $_SESSION['nama'], 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'CV. Kampoeng Radjoet.', 0, 1, 'C', 0);

$pdf->Ln(-2);
$pdf->SetFont('Arial', '', 9);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Petugas', 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'Pimpinan', 0, 0, 'C', 0);
$pdf->Output();
?>
