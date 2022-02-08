<?php
include("sess_check.php");
$id_user = $sess_admid;
$id = $_GET['id'];
$no = $_GET['id_trx'];
$sql = "UPDATE tmp_trx SET  
        status='Done'
        WHERE id_tmp='" . $id . "' AND id_trx='" . $no . "'";
$ress = mysqli_query($conn, $sql);
header("location: index.php?act=delete&msg=success");
