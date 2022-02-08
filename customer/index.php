<?php
include("sess_check.php");
include("../dist/function/format_rupiah.php");

$tgl = date('Y-m-d');
$ttl = 0;
$sql = "SELECT * FROM trx WHERE tgl_trx='$tgl'";
$ress = mysqli_query($conn, $sql);
$jmltrx = mysqli_num_rows($ress);
// query database mencari data admin
while ($data = mysqli_fetch_array($ress)) {
	$tot = $data['total'];
	$ttl += $tot;
}
// deskripsi halaman
$pagedesc = "Beranda";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Beranda</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<html>
 <head>

 </head>
 <body>
   <center><h1> <b>Service Motor Tanpa Antre Lewat Booking</b></h1> </center> 
   <center><h1> <b>Online Service di Media Bengkel </b></h1> </center> <br>
		<i>By Media Bengkel - Category : Info</i><br><br>
   <center><img src="../foto/banner.jpg" alt="Banner" width="1000" height="350"></center>
		<h2>Kini pengguna sepeda motor dipermudah dengan hadirnya layanan servis motor yang praktis dan tidak perlu antre di Media Bengkel. Caranya dengan booking service di website Media Bengkel.  <br> </h2>

		<h2>Dengan mengakses website Media Bengkel yang memudahkan pengguna sepeda motor yang ingin melakukan service kendaraan di Media Bengkel. Anda bisa melakukan booking online sesuai dengan tanggal keinginan anda. <br> </h2>

		<h2>Langkah pertama yaitu mengakses Media Bengkel diwebsite. Setelah terbuka halaman website nya, lakukan pendaftaran/registrasi data diri pada kolom yang sudah disediakan.

		<h2>Setelah melakukan registrasi, selanjutnya anda login dengan data yang sudah anda daftarkan. Anda sudah bisa melakukan booking service. Pilih menu Booking dan Booking Service, Kemudian lanjut mengisi tipe service yang anda inginkan.

		<h2>Masukkan tanggal service yang anda inginkan. Setelah semua terisi, klik Booking untuk mengonfirmasi booking service dan masukkan foto kendaraan yang akan diservice. Setelah itu klik simpan.

		<h2>Tak perlu menunggu lama, Anda bisa melanjutkan aktivitas dan akan diinfokan kembali kapan motor bisa diambil. Praktis, bukan ? <br><br><br>

				<u><h1><center><b>Keep Moving Forward - Media Bengkel</center></b></h1></u>

		<h3> Share this post : </h3>

   <a class="navbar-brand hidden-xs" href="https://www.instagram.com/faris_sofyan/">
			<img src="https://clipart.info/images/ccovers/1516920567instagram-png-logo-transparent.png" alt="brand" width="32" class="float-left image-brand"></a>
 
	<a class="navbar-brand hidden-xs" href="https://www.facebook.com/Ehhh.Fariss/">
			<img src="https://clipart.info/images/ccovers/1509135366facebook-symbol-png-logo.png" alt="brand" width="32" class="float-left image-brand"></a>
	
	<a class="navbar-brand hidden-xs" href="https://github.com/farissofyan/">
			<img src="https://pngimg.com/uploads/github/github_PNG40.png" alt="brand" width="32" class="float-left image-brand"></a>

	<a class="navbar-brand hidden-xs" href="https://wa.me/0895358560637">
			<img src="https://www.silicon.co.uk/wp-content/uploads/2018/03/2000px-WhatsApp.svg_.png" alt="brand" width="32" class="float-left image-brand"></a>
		

				</body>
</html>

<script>
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>
<?php
include("layout_bottom.php");
?>