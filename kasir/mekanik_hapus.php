<?php
	include("sess_check.php");
		$id = $_GET['mekanik'];	
		$sql = "DELETE FROM mekanik WHERE id_mekanik='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: mekanik.php?act=delete&msg=success");
?>