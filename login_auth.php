<?php
// memulai session
session_start();
// memanggil file koneksi
include("dist/config/koneksi.php");

// mengecek apakah tombol login sudah di tekan atau belum
if (isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if (empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	} else {

		$username = $_POST['username'];
		$password = $_POST['password'];

		// menyeleksi data user dengan username dan password yang sesuai
		$login = mysqli_query($conn, "select * from users where username='$username' and password='$password'");
		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);

		// cek apakah username dan password di temukan pada database
		if ($cek > 0) {

			$data = mysqli_fetch_assoc($login);

			// cek jika user login sebagai admin
			if ($data['role'] == "admin") {

				// buat session login dan username
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['foto'] = $data['foto'];
				$_SESSION['role'] = $data['role'];

				// alihkan ke halaman dashboard admin
				header("location: index.php?login=success");

				// cek jika user login sebagai pegawai
			} else if ($data['role'] == "kasir") {
				// buat session login dan username
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['foto'] = $data['foto'];
				$_SESSION['role'] = $data['role'];
				// alihkan ke halaman dashboard pegawai
				header("location: kasir/index.php?login=success");

				// cek jika user login sebagai pengurus
			} else if ($data['role'] == "customer") {
				// buat session login dan username
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['foto'] = $data['foto'];
				$_SESSION['role'] = $data['role'];
				// alihkan ke halaman dashboard pengurus
				header("location: customer/index.php?login=success");
			} else {
				header("location: login.php?login=false");
			}
		} else {
			header("location: login.php?err=not_found");
		}
	}
}
