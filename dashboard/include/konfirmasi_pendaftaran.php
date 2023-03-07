<h2>Konfirmasi Pendaftaran</h2>

<?php
if (isset($_SESSION['message'])) {
	echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi pendaftaran.
    </div>";
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Konfirmasi Pendaftaran</h4>
				<p class="category">Lakukan konfirmasi pendaftaran</p>
			</div>
			<div class="card-content">

				<h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama Pendaftar</b></td>
							<td><b>Email</b></td>
							<td><b>Status Pendaftaran</b></td>
							<td><b>Tanggal Daftar</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$query 	= "SELECT pendaftaran.nama, pendaftaran.id as id_daftar, akun.id as id_akun, akun.email, detail_pendaftaran.* FROM akun
						JOIN pendaftaran ON akun.id_user=pendaftaran.Id
						JOIN detail_pendaftaran ON detail_pendaftaran.id_user=pendaftaran.Id
						WHERE akun.role_user=1";
						// $query 	= "SELECT pendaftaran.nama, pendaftaran.id as id_daftar, akun.id as id_akun, akun.email, detail_pendaftaran.* FROM akun
						// JOIN pendaftaran ON akun.id_user=pendaftaran.Id
						// JOIN detail_pendaftaran ON detail_pendaftaran.id_user=pendaftaran.Id
						// WHERE akun.role_user=1
						// AND pendaftaran.upload_akte != ''
						// AND pendaftaran.upload_kartu_keluarga != ''
						// AND pendaftaran.foto_anak != ''
						// AND pendaftaran.foto_keluarga != ''";

						$exec 	=	mysqli_query($conn, $query);

						if ($exec) {
							$total	= mysqli_num_rows($exec);
							if ($total > 0) {
								while ($rows = mysqli_fetch_array($exec)) {

									$status = $rows['status_pendaftaran'];


						?>


									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><?php
											if ($status == 0) {
												print("<font color='#e74c3c'>Belum dikonfirmasi</font>");
											} else {
												print("<font color='##2ecc71'>Sudah dikonfirmasi</font>");
											}

											?>
										</td>
										<td><?php echo date('d M Y', strtotime($rows['tanggal_daftar'])); ?></td>
										<td>

											<?php
											if ($rows['status_pendaftaran'] >= 1) { ?>

												<!-- <button onclick="JavaScript:window.location.href='download.php?file=beach.jpg';"> Unduh Berkas</button><br /> -->

												<a target="_blank" href="include/preview_berkas_cetak.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" style="background-color: salmon;" class="btn btn-sm">Unduh Berkas</a>

											<?php } else { ?>
												<!-- lihat detail file -->
												<a target="_blank" href="include/preview_berkas.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-info btn-sm">Lihat Detail</a>
											<?php }
											?>

											<a href="include/hapus_pendaftar.php?id=<?= $rows['id_daftar'] ?>" style="background-color: red; color: white;" class="btn btn-sm" onclick="return confirm('Yakin akan menghapus?');">Hapus Pendaftar</a>


											<!-- end lihat detail file -->
											<!-- <a href="include/proses_konfirmasi_pendaftaran.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td> -->
									</tr>

						<?php
								}
							} else {
								echo "<td colspan='5' align='center'><h3><b>Belum ada siswa daftar</b></h3></td>";
							}
						} else {
							echo mysqli_error($conn);
						}
						?>

					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<?php

unset($_SESSION['message']);

?>