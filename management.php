<?php
include("sess_check.php");

// query database mencari data pengguna
$sql = "SELECT * FROM users WHERE id ='" . $sess_admid . "'";
$ress = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($ress);

// deskripsi halaman
$pagedesc = "Pengaturan";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Management User</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="management_tambah.php" class="btn btn-success">Tambah</a>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="tabel-data">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th width="10%">Nama</th>
									<th width="5%">Role</th>
									<th width="10%">Username</th>
									<th width="10%">Password</th>
									<th width="10%">Foto</th>
									<th width="5%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = "SELECT * FROM users ORDER BY nama ASC";
								$ress = mysqli_query($conn, $sql);
								while ($data = mysqli_fetch_array($ress)) {
									echo '<tr>';
									echo '<td class="text-center">' . $i . '</td>';
									echo '<td class="text-center">' . $data['nama'] . '</td>';
									echo '<td class="text-center">' . $data['role'] . '</td>';
									echo '<td class="text-center">' . $data['username'] . '</td>';
									echo '<td class="text-center">' . $data['password'] . '</td>';
									echo '<td class="text-center"><img src="foto/' . $data['foto'] . '" width="50px"</td>';
									echo '<td class="text-center">
													  <a href="management_edit.php?kas=' . $data['id'] . '" class="btn btn-warning btn-xs">Edit</a>'; ?>
									<a href="management_hapus.php?kas=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama']; ?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
								<?php
									echo '</td>';
									echo '</tr>';
									$i++;
								}
								?>
							</tbody>
						</table>
					</div>
					<!-- Large modal -->
					<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-body">
									<p>One fine body…</p>
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
				"targets": [4]
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
			$($this.data('remote-target')).load('karyawan_detail.php?code=' + code);
			app.code = code;

		}
	});
</script>
<?php
include("layout_bottom.php");
?>