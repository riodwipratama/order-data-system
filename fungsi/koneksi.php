<?php
// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "kampoeng_radjoet";

// Koneksi dan memilih database di server
$conn = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($conn,$database) or die("Database tidak bisa dibuka");
?>
