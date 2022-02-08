<?php
	include("sess_check.php");
		$id = $_GET['mgn'];	
		$sql = "DELETE FROM user WHERE id_user='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: management.php?act=delete&msg=success");
?>