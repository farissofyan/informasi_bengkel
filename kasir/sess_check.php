<?php
// memulai session
session_start();
// membaca nilai variabel session 
$chk_sess = $_SESSION['role'];
// memanggil file koneksi
include("dist/config/koneksi.php");
include("dist/config/library.php");
// mengambil data pengguna dari tabel pengguna
// menyimpan id_pengguna yang sedang login
$sess_kasirid = $_SESSION['id'];
$sess_kasiruser = $_SESSION['username'];
$sess_kasirname = $_SESSION['nama'];
$sess_kasirfoto = $_SESSION['foto'];
// mengarahkan ke halaman login.php apabila session belum terdaftar
if (!isset($chk_sess)) {
	header("location: ../login.php?login=false");
}
