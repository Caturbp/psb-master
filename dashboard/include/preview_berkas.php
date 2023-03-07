<?php
include '../../koneksi/koneksi.php';
$id = $_GET['ida'];
$idd = $_GET['idd'];
$idu = $_GET['idu'];


// $query_calon      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.Id = $id AND b.id_user=$id";
$query_calon      = "SELECT * FROM `akun` JOIN `pendaftaran` ON `akun`.`id_user`=`pendaftaran`.`id` WHERE `akun`.`id`='$id'";

$exec_calon       = mysqli_query($conn, $query_calon);

if ($exec_calon) {
    while ($user_nih = mysqli_fetch_array($exec_calon)) {
        foreach ($user_nih as $key => $val) {
            ${$key} = $val;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>

    <title>Dashboard <?php echo $role; ?></title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


</head>

<body>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                    <div class="card" style="margin-top: 50px">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Biodata Pendaftar</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
                            <table class="table table-hover">

                                <tbody>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>: <?php echo $email; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td>: <?php echo $nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Panggilan</b></td>
                                        <td>: <?php echo $nama_panggilan;; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>TTL</b></td>
                                        <td>: <?php echo $tempat_lahir . ", " . $tanggal_lahir; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin</b></td>
                                        <td>: <?php echo $jenis_kelamin; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Anak Ke -</b></td>
                                        <td>: <?php echo $anak_ke . " dari " . $jumlah_saudara ?> bersaudara</td>
                                    </tr>

                                    <tr>
                                        <td><b>Asal Sekolah</b></td>
                                        <td>: <?php echo $asal_sekolah; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h3><b>Data Orangtua</b></h3>
                            <table class="table table-hover">

                                <tbody>
                                    <tr>
                                        <td><b>Nama Ayah</b></td>
                                        <td>: <?php echo $nama_ayah;; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>TTL</b></td>
                                        <td>: <?php echo $tempat_lahir_ayah . ", " . $tanggal_lahir_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pendidikan Terakhir</b></td>
                                        <td>: <?php echo $pendidikan_terakhir_ayah;; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Pekerjaan</b></td>
                                        <td>: <?php echo $pekerjaan_ayah; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Agama</b></td>
                                        <td>: <?php echo $agama_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Ibu</b></td>
                                        <td>: <?php echo $nama_ibu;; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>TTL</b></td>
                                        <td>: <?php echo $tempat_lahir_ibu . ", " . $tanggal_lahir_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pendidikan Terakhir</b></td>
                                        <td>: <?php echo $pendidikan_terakhir_ibu; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Pekerjaan</b></td>
                                        <td>: <?php echo $pekerjaan_ibu; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Agama</b></td>
                                        <td>: <?php echo $agama_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telp/HP</b></td>
                                        <td>: <?php echo $telp; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-content table-responsive ">
                            <a href="proses_konfirmasi_pendaftaran.php?ida=<?= $id ?>&idd=<?= $idd ?>&idu=<?= $idu ?>" class="btn btn-warning btn-sm" style="float: right;">Konfirmasi</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                    <?php
                    $end_akte = explode('.', $upload_akte);
                    if ($end_akte[1] !== 'pdf' || $end_akte[1] !== 'PDF') { ?>
                        <h4>Ini File Foto Akte Kelahiran</h4>
                        <img src="../../assets/uploads/<?= $upload_akte ?>" width="600" height="400">
                    <?php } else { ?>
                        <h4>Ini File PDF Akte Kelahiran</h4>
                        <iframe src="../../assets/uploads/<?= $upload_akte ?>" width="600" height="400"></iframe>
                    <?php }
                    ?>

                    <?php
                    $end_kartu_keluarga = explode('.', $upload_kartu_keluarga);
                    if ($end_kartu_keluarga[1] !== 'pdf' || $end_kartu_keluarga[1] !== 'PDF') { ?>
                        <h4>Ini File Foto kartu keluarga</h4>
                        <img src="../../assets/uploads/<?= $upload_kartu_keluarga ?>" width="600" height="400">
                    <?php } else { ?>
                        <h4>Ini File PDF kartu keluarga</h4>
                        <iframe src="../../assets/uploads/<?= $upload_kartu_keluarga ?>" width="600" height="400"></iframe>
                    <?php }
                    ?>

                    <?php
                    $end_foto_anak = explode('.', $foto_anak);
                    if ($end_foto_anak[1] !== 'pdf' || $end_foto_anak[1] !== 'PDF') { ?>
                        <h4>Ini File foto anak</h4>
                        <img src="../../assets/uploads/<?= $foto_anak ?>" width="600" height="400">
                    <?php } else { ?>
                        <h4>Ini File PDF foto anak</h4>
                        <iframe src="../../assets/uploads/<?= $foto_anak ?>" width="600" height="400"></iframe>
                    <?php }
                    ?>

                    <?php
                    $end_foto_keluarga = explode('.', $foto_keluarga);
                    if ($end_foto_keluarga[1] !== 'pdf' || $end_foto_keluarga[1] !== 'PDF') { ?>
                        <h4>Ini File foto keluarga</h4>
                        <img src="../../assets/uploads/<?= $foto_keluarga ?>" width="600" height="400">
                    <?php } else { ?>
                        <h4>Ini File PDF foto keluarga</h4>
                        <iframe src="../../assets/uploads/<?= $foto_keluarga ?>" width="600" height="400"></iframe>
                    <?php }
                    ?>

                </div>

            </div>

        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src=" ../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script>
    $(document).ready(function() {
        $("#cetak").click(function() {
            window.print();
        });
    });
</script>

</html>