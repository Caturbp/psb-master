<?php
include '../../koneksi/koneksi.php';
$idc = $_GET['idc'];
$idd = $_GET['idd'];
// $idu = $_GET['idu'];


// $query_calon      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.Id = $id AND b.id_user=$id";
// $query_calon      = "SELECT * FROM `akun` JOIN `pendaftaran` ON `akun`.`id_user`=`pendaftaran`.`id` WHERE `akun`.`id`='$id'";

// $query     = "SELECT a.Id,a.cicilan_ke, a.status_cicilan, c.email, d.nama,b.Id idd FROM cicilan_pendaftaran a , detail_pendaftaran b, akun c, pendaftaran d WHERE cicilan_pendaftaran.id_detail_pendaftaran = detail_pendaftaran.Id AND cicilan_pendaftaran.status_cicilan = 0 AND akun.id_user = pendaftaran.Id AND detail_pendaftaran.id_user = pendaftaran.Id ";

// $query = "SELECT `cicilan_pendaftaran`.`Id`, `cicilan_pendaftaran`.`cicilan_ke`, `cicilan_pendaftaran`.`status_cicilan`,
// `detail_pendaftaran`.`Id` as 'idd', 
// `akun`.`email`,
// `pendaftaran`.`nama`
// FROM `cicilan_pendaftaran` 
// JOIN `detail_pendaftaran` ON `detail_pendaftaran`.`Id`=`cicilan_pendaftaran`.`id_detail_pendaftaran`
// JOIN `pendaftaran` ON `detail_pendaftaran`.`id_user`=`pendaftaran`.`Id`
// JOIN `akun` ON `akun`.`id_user`=`pendaftaran`.`Id`
// WHERE `cicilan_pendaftaran`.`Id`='$idc' AND `detail_pendaftaran`.`Id`='$idd'
// ";

$query = "SELECT `cicilan_pendaftaran`.* FROM `cicilan_pendaftaran` 
JOIN `detail_pendaftaran` ON `detail_pendaftaran`.`Id`=`cicilan_pendaftaran`.`id_detail_pendaftaran` WHERE `cicilan_pendaftaran`.`Id`='$idc' AND `detail_pendaftaran`.`Id`='$idd' ";

// $query = "SELECT * FROM pendaftaran";



$exec_calon       = mysqli_query($conn, $query);
// echo mysqli_error($conn);
// echo var_dump(mysqli_fetch_assoc($exec_calon));
// die();

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
                            <h4 class="title">Data Konfirmasi Pembayaran Pendaftaran</h4>
                        </div>
                        <div class="card-content table-responsive ">
                            <a href="proses_konfirmasi_cicilan_pendaftaran.php?id=<?= $idc ?>&idd=<?= $idd ?>" class="btn btn-warning btn-sm" style="float: right;">Konfirmasi</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                    <?php
                    $end_bukti = explode('.', $bukti_pembayaran);
                    if ($end_bukti[1] !== 'pdf' || $end_bukti[1] !== 'PDF') { ?>
                        <h4>Ini File Foto Bukti Pembayaran</h4>
                        <img src="../../assets/uploads/<?= $bukti_pembayaran ?>" width="600" height="400">
                    <?php } else { ?>
                        <h4>Ini File Scan Bukti Pembayaran</h4>
                        <iframe src="../../assets/uploads/<?= $bukti_pembayaran ?>" width="600" height="400"></iframe>
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