<?php
session_start();

include "../../fungsi/koneksi.php";

$idmerk= $_GET['id_kategori'];
$hasil = mysqli_query($conn, "SELECT * FROM nama_produk WHERE id_kategori = '$idmerk'");

echo "<option>--pilih Nama Produk--</option>";

while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_nama_produk]> $w[nama_produk]</option>";
}
?>
