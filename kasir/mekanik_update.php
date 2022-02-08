<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id=$_POST['mekanik'];
		$nama=$_POST['nama'];
		$telp=$_POST['telp'];
		$alamat=$_POST['alamat'];
		$sql = "UPDATE mekanik SET
				telp_mekanik='". $telp ."',
				nama_mekanik='". $nama ."',
				alamat_mekanik='". $alamat ."'
				WHERE id_mekanik='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: mekanik.php?act=update&msg=success");
	}
?>