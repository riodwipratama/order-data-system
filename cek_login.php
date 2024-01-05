<?php
include "fungsi/koneksi.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login=mysqli_query($conn, "SELECT * FROM akses
        WHERE username='$username' AND password='$pass'")or die(mysqli_error($conn));
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION['id_pengguna']     = $r['username'];
  $_SESSION['nama']            = $r['nama_petugas'];
  $_SESSION['passuser']        = $pass;
  $_SESSION['hak_akses']       = $r['hak_akses'];
  //$_SESSION['foto']            = $r['foto_admin'];


  // session timeout
  $_SESSION['login'] = 1;
  timer();

	$sid_lama = session_id();

	session_regenerate_id();

	$sid_baru = session_id();

  header('location:index.php?modul=home');
}
else{
  echo "<script>alert('Username/ Password yang anda masukkan salah, silahkan coba kembali !.'); window.location = 'index.php'</script>";
}
?>
