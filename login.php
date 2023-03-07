<?php

session_start();

include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {

	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	$query	=	"SELECT a.status as uyee, a.kuota_pendaftaran as yeyeye, a.password,a.role_user as role,a.id as id_akun, b.id as id_daftar from akun a, pendaftaran b 
				WHERE email='$email' 
				AND b.id = a.id_user";

	$exec 	= mysqli_query($conn, $query);

	if ($exec) {

		if (mysqli_num_rows($exec) > 0) {
			while ($rows = mysqli_fetch_array($exec)) {

				if (password_verify($password, $rows['password'])) {
					$_SESSION['role_user'] 	= $rows['role'];
					$_SESSION['auth']		= $rows['id_daftar'];
					$_SESSION['status_aaa']		= $rows['uyee'];
					$_SESSION['kuota_pendaftaran_aaa']		= $rows['yeyeye'];

					echo '<script> window.location="dashboard/index.php"; </script> ';
				} else {
					echo 'Password Salah!';
				}
			}
		} else {

			$query	=	"SELECT status as uyee, kuota_pendaftaran as yeyeye, password,role_user,id from akun 
				WHERE email='$email'";

			$exec 	= mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					while ($rows = mysqli_fetch_array($exec)) {

						if (password_verify($password, $rows['password'])) {
							$_SESSION['role_user'] 	= $rows['role_user'];
							$_SESSION['auth']		= $rows['id'];
							$_SESSION['status_aaa']		= $rows['uyee'];
							$_SESSION['kuota_pendaftaran_aaa']		= $rows['yeyeye'];

							echo '<script> window.location="dashboard/index.php"; </script> ';
						} else {
							echo 'Password Salah!';
						}
					}
				} else {
					echo 'Tidak ada user terdaftar';
				}
			} else {

				$exec 	= mysqli_query($conn, $query);
			}
		}
	} else {

		echo mysqli_error($conn);
	}
}

?>



<!DOCTYPE html>
<html>

<head>
	<title>Penerimaan Siswa Baru</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="assets/css/login.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>


<body>
	<div style="background-image: url('assets/img/bg.jpg'); " class="h-100">
		<div class="container h-100 ">
			<div class="d-flex justify-content-center h-100 ">
				<div class="user_card">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="assets/img/logo.png" class="brand_logo" alt="Logo">
						</div>
					</div>


					<div class="d-flex justify-content-center form_container">

						<form method="post" action="">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="email" class="form-control input_user" placeholder="Email" required autofocus>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" placeholder="Password" required class="form-control input_pass">
							</div>

							<div class="d-flex justify-content-center login_container  mb-3">
								<button type="submit" name="submit" class="btn login_btn">Login</button>
							</div>
						</form>
					</div>

					<div class=" mb-2">
						<div class="d-flex justify-content-center links">
							Belum mepunyai akun? <a href="daftar_akun.php" class="text-light ml-2">Daftar di sini</a>
						</div>
						<!-- <div class="d-flex justify-content-center links">
						<a href="#">Lupa Password?</a>
					</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>