<?php
include("sess_check.php");
include("dist/function/format_rupiah.php");

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
$pagedesc = "Konfirmasi Transaksi";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Konfirmasi Pesanan</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
        </div>

        <div class="row bg-white">
            <div class="col-md-12" style="padding-top: 20px;">
                <table id="table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bukti</th>
                            <th>ID Transaksi</th>
                            <th>Nama Jasa</th>
                            <th>Waktu Pesan</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $grand = 0;
                        $sql = "SELECT tmp_trx.*, barangjasa.*, users.id, users.nama as nama_user FROM tmp_trx, barangjasa, users WHERE tmp_trx.id_brg=barangjasa.id_brg AND tmp_trx.id_kasir=users.id and status!='Batal' and status!='On Process' and tgl_booking is not null";
                        $ress = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($ress)) { ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><img src="../customer/foto/<?= $data['bukti'] ?>" alt="bukti transfer" width="50px"></td>
                                <td class="text-center"><?= $data['id_trx'] ?></td>
                                <td class="text-center"><?= $data['nama'] ?></td>
                                <td class="text-center"><?= $data['tgl_booking'] ?></td>
                                <td class="text-center"><?= $data['nama_user'] ?></td>
                                <td class="text-center"><?php if ($data['status'] == "Done") { ?>
                                        <div class="badge bg-success">Berhasil</div>
                                    <?php } elseif ($data['status'] == "Konfirmasi") { ?>
                                        <div class="badge bg-warning">Konfirmasi</div>
                                    <?php } elseif ($data['status'] == "Batal") { ?>
                                        <div class="badge bg-danger">Batal</div>
                                    <?php } else {
                                                            echo "<div class='badge bg-danger'>Belum Pembayaran</div>";
                                                        } ?>
                                </td>
                                <td class="text-center">Rp<?= $data['harga'] ?></td>
                                <td><?php if ($data['status'] == "Done") { ?>
                                    <?php } elseif ($data['status'] == "Konfirmasi") { ?>
                                        <a href="konfirmasi_sukses.php?id=<?php echo $data['id_tmp']; ?>&id_trx=<?php echo $data['id_trx']; ?>" onclick="return confirm('Apakah anda yakin akan menkonfirmasi pesanan <?php echo $data['nama']; ?>?');" class="btn btn-primary btn-xs">Konfirmasi</a> <a href="konfirmasi_batal.php?id=<?php echo $data['id_tmp']; ?>&id_trx=<?php echo $data['id_trx']; ?>" onclick="return confirm('Apakah anda yakin akan membatalkan konfirmasi <?php echo $data['nama']; ?>?');" class="btn btn-danger btn-xs">Batal</a>
                                    <?php } else {
                                    } ?>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<?php
include("layout_bottom.php");
?>