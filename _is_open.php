<?php
// mulai cek status pendaftaran
$query_cek_aaa  =   "SELECT status FROM akun WHERE role_user='0' LIMIT 1";

$exac_cek_aaa   = mysqli_query($conn, $query_cek_aaa);

if ($exac_cek_aaa) {
    $value_cek_aaa = mysqli_fetch_assoc($exac_cek_aaa);
    $status_cek_aaa = $value_cek_aaa['status'];
}
// selesai cek status pendaftaran

// mulai cek kuota pendaftaran
$query_cek_bbb  =   "SELECT kuota_pendaftaran FROM akun WHERE role_user='0' LIMIT 1";

$exac_cek_bbb   = mysqli_query($conn, $query_cek_bbb);

if ($exac_cek_bbb) {
    $value_cek_bbb = mysqli_fetch_assoc($exac_cek_bbb);
    $status_cek_bbb = $value_cek_bbb['kuota_pendaftaran'];
}
// selesai cek kuota pendaftaran

// mulai cek jumlah akun pendaftaran
$query_cek_ccc  =   "SELECT COUNT(akun.Id) as jumlah FROM akun
JOIN pendaftaran ON akun.id_user=pendaftaran.Id
JOIN detail_pendaftaran ON detail_pendaftaran.id_user=pendaftaran.Id
WHERE detail_pendaftaran.status_pendaftaran!=4
AND detail_pendaftaran.status_pendaftaran!=3";

$exac_cek_ccc   = mysqli_query($conn, $query_cek_ccc);

if ($exac_cek_ccc) {
    $value_cek_ccc = mysqli_fetch_assoc($exac_cek_ccc);
    $status_cek_ccc = $value_cek_ccc['jumlah'];
}
// selesai cek jumlah akun pendaftaran

// echo var_dump($status_cek_ccc < $status_cek_bbb);
// die();

if ($status_cek_aaa == 'tutup' || ($status_cek_ccc < $status_cek_bbb) == false) { ?>
    <script>
        alert("Untuk Sementara Pendaftaran Ditutup Dikarenakan Kuota Sudah Terpenuhi!");
        window.location = 'login.php';
    </script>
<?php }
