<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Transaksi Baru";
include("layout_top.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
$kasir = $sess_csid;
$tgl = date('Y-m-d');

if (isset($_POST['simpan'])) {
	$kasir = $sess_csid;
	$grand = 0;
	$tg = $_POST['tgl'];
	$kon = $_POST['kon'];
	$stt = "Konfirmasi";
	$stts = "On Process";
	$no = date('dmYHis');
	$namafoto = date('mdYHis');
	$cekfoto = $_FILES["foto"]["name"];

	$sql = "SELECT tmp_trx.*, barangjasa.* FROM tmp_trx, barangjasa WHERE tmp_trx.id_brg=barangjasa.id_brg AND tmp_trx.id_kasir='$kasir' AND tmp_trx.status='On Process'";
	$query = mysqli_query($conn, $sql);
	while ($res = mysqli_fetch_array($query)) {
		$ttl = $res['jml'] * $res['harga'];
		$st = $res['stok'];
		$jml = $res['jml'];
		$newst = ((int)$st - (int)$jml);
		$br = $res['id_brg'];
		$jns = $res['jenis'];
		if ($jns == 'barang') {
			$sqlbr = "UPDATE barangjasa SET
					stok='" . $newst . "'
					WHERE id_brg='" . $br . "'";
			$ressbr = mysqli_query($conn, $sqlbr);
		} else {
		}
		$grand += $ttl;
	}
	if ($cekfoto != "") {
		$foto = substr($_FILES["foto"]["name"], -5);
		$newfoto = $namafoto . $foto;
		move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/" . $newfoto);
		$sqltmp = "UPDATE tmp_trx SET
			id_trx='" . $no . "',	
			status='" . $stt . "',
			bukti='" . $newfoto . "'
			WHERE id_kasir='" . $kasir . "' AND status='" . $stts . "'";
		$resstmp = mysqli_query($conn, $sqltmp);

		$sqltrx = "INSERT INTO trx(id_trx,id_kon,tgl_trx,total,id_kasir)
		  VALUES('$no','$kon','$tg','$grand','$kasir')";
		$resstrx = mysqli_query($conn, $sqltrx);

		if ($resstrx) {
			echo "<script type='text/javascript'> document.location = 'trx.php'; </script>";
		}
	}
}

?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Transaksi Baru</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="tmp_tambah.php" class="btn btn-warning">Tambah</a>
					</div>
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Konsumen : <?php echo $sess_csname; ?></label>
								<input type="hidden" name="kon" id="kon" value="0">
							</div>
							<table class=" table table-striped table-bordered table-hover" id="tabel-data">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th width="10%">Nama</th>
										<th width="10%">Jumlah</th>
										<th width="10%">Tanggal Booking</th>
										<th width="10%">Harga Satuan</th>
										<th width="10%">Total Harga</th>
										<th width="2%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$grand = 0;
									$sql = "SELECT tmp_trx.*, barangjasa.*, users.id, users.nama as nama_user, users.telp, users.role FROM tmp_trx, barangjasa, users WHERE tmp_trx.id_brg=barangjasa.id_brg AND tmp_trx.id_kasir=users.id AND tmp_trx.status='On Process' AND tmp_trx.id_kasir='$kasir' ORDER BY `barangjasa`.`nama` ASC";
									$ress = mysqli_query($conn, $sql);
									while ($data = mysqli_fetch_array($ress)) {
										$ttl = $data['jml'] * $data['harga'];
										echo '<tr>';
										echo '<td class="text-center">' . $i . '</td>';
										echo '<td class="text-center">' . $data['nama'] . '</td>';
										echo '<td class="text-center">' . $data['jml'] . '</td>';
										echo '<td class="text-center">' . $data['tgl_booking'] . '</td>';
										echo '<td class="text-center">' . format_rupiah($data['harga']) . '</td>';
										echo '<td class="text-center">' . format_rupiah($ttl) . '</td>';
										echo '<td class="text-center">'; ?>
										<a href="trxtmp_hapus.php?id=<?php echo $data['id_tmp']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama']; ?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
									<?php
										echo '</td>';
										echo '</tr>';
										$i++;
										$grand += $ttl;
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5" class="text-center">Total </th>
										<th class="text-right"><?php echo format_rupiah($grand); ?></th>
										<th class="text-center"> </th>
									</tr>
								</tfoot>
							</table>
						</div>
						<input type="hidden" name="tgl" class="form-control" value="<?php echo $tgl; ?>">
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Foto Kendaraan</label>
								<div class="col-sm-4">
									<input type="file" name="foto" class="form-control" accept="image/*">
								</div>
								<input type="hidden" name="jumlah" value="1">
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
						</div>
					</form>
					<!-- Large modal -->
					<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-body">
									<p>Sedang Memproses..</p>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [{
				"orderable": false,
				"targets": [5]
			}]
		});

		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<script>
	var app = {
		code: '0'
	};

	$('[data-load-code]').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var code = $this.data('load-code');
		if (code) {
			$($this.data('remote-target')).load('tmp_tambah.php?code=' + code);
			app.code = code;

		}
	});
</script>
<?php
include("layout_bottom.php");
?>