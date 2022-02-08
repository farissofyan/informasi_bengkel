<?php
include("sess_check.php");
$id_user = $sess_csid;
$id = $_GET['id'];
$no = $_GET['id_trx'];
$sql = "UPDATE tmp_trx SET  
        status='Batal'
        WHERE id_tmp='" . $id . "' AND id_trx='" . $no . "' AND id_kasir='" . $id_user . "'";
$ress = mysqli_query($conn, $sql);
header("location: index.php?act=delete&msg=success");
