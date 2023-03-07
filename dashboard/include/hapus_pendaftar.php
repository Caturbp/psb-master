<?php

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {

    $id         =     $_GET['id'];

    // delete pendaftaran
    $query1        =     "DELETE FROM pendaftaran WHERE Id = $id";
    $exec1         =     mysqli_query($conn, $query1);

    // delete akun
    $query2        =     "DELETE FROM akun WHERE id_user = $id";
    $exec2         =     mysqli_query($conn, $query2);

    //delete detail_pendaftaran 
    $query3        =     "DELETE FROM detail_pendaftaran WHERE id_user = $id";
    $exec3         =     mysqli_query($conn, $query3);


    if ($exec1 && $exec2 && $exec3) {
        $_SESSION['message']     =     "Hapus Data Pendaftaran";
        echo '<script>window.location="../index.php?page=7"</script>';
    }
}
