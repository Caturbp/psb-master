<?php

include '../../koneksi/koneksi.php';

if ($_GET['id_jadwal']) {
    $id = $_GET['id_jadwal'];
    $query        =    "DELETE FROM jadwal WHERE id_jadwal='$id'";
    $exec         =    mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['message'] = "Berhasil Hapus Jadwal";
        echo '<script>window.location = "../index.php?page=22"</script>';
    } else {
        echo mysqli_error($conn);
    }
}
