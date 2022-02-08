<?php

include "dist/config/koneksi.php";

$user = $_POST['username'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$fotoname = date('mdYHis');
$newfoto = "ic-user.PNG";
$pass = $_POST['password'];
$role = "customer";

$sqlcek = "SELECT * FROM users WHERE username='$user'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if ($rowscek < 1) {
	$sql = "INSERT INTO users(nama,telp,username,password,foto,role)
		  VALUES('$nama','$telp','$user','$pass','$newfoto','$role')";
	$ress = mysqli_query($conn, $sql);
	if ($ress) {
		echo "<script>alert('Akun Berhasil dibuat!');</script>";
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	} else {
		//	echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
	}
} else {
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
}
