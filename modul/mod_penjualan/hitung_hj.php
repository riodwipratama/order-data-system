<?php
session_start();
include "../../fungsi/koneksi.php";
include "../../fungsi/format_number.php";
		$query = mysqli_query($conn, "SELECT * FROM pembelian WHERE id_pembelian = '$_GET[id]'")or die(mysqli_error($conn));
		$data = mysqli_fetch_array($query);

        $laba = $data['harga_pembelian'] * 0.1;
		$hj = $data['harga_pembelian'] + $laba;

		$data2 = array('hj' => indo_number_nospace($hj));
        echo json_encode($data2);

?>
