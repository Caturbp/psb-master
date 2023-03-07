<h2>Selamat Datang, <?php $role == "Admin" ?  print($nama_admin) : print($nama); ?></h2>

<?php
if ($role == 'Admin') { ?>
    <form action="" method="get">
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-sm-12">
                <div class="form-group label-floating">
                    <label class="control-label">STATUS PENDAFTARAN</label>
                    <select name="status" class="form-control">
                        <?php $selectBuka = (isset($_SESSION['status_aaa']) && @$_SESSION['status_aaa'] == 'buka') ? 'selected' : ''; ?>
                        <?php $selectTutup = (isset($_SESSION['status_aaa']) && @$_SESSION['status_aaa'] == 'tutup') ? 'selected' : ''; ?>
                        <option <?= $selectBuka ?> value="buka">Buka</option>
                        <option <?= $selectTutup ?> value="tutup">Tutup</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-sm-12">
                <div class="form-group label-floating">
                    <label class="control-label">KUOTA PENDAFTARAN</label>
                    <?php $isiKuota = (isset($_SESSION['kuota_pendaftaran_aaa']) && @$_SESSION['kuota_pendaftaran_aaa'] !== null) ? $_SESSION['kuota_pendaftaran_aaa'] : ''; ?>
                    <input min="1" value="<?= $isiKuota ?>" type="number" name="kuota_pendaftaran" id="kuota_pendaftaran" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-sm-12">
                <button type="submit" name="submitStatus" class="btn btn-primary pull-left">UPDATE STATUS</button>
            </div>
        </div>
    </form>

    <?php
    if (isset($_GET['submitStatus'])) {
        $query = "UPDATE akun SET status='$_GET[status]', kuota_pendaftaran='$_GET[kuota_pendaftaran]' WHERE role_user='$_SESSION[role_user]'";
        $exec         =    mysqli_query($conn, $query);
        if ($exec) {
            $_SESSION['message'] = "Berhasil ubah status pendaftaran";
            $_SESSION['status_aaa'] = $_GET['status'];
            $_SESSION['kuota_pendaftaran_aaa'] = $_GET['kuota_pendaftaran'];
            echo '<script>window.location = "index.php"</script>';
        } else {
            echo mysqli_error($conn);
        }
    }
    ?>
<?php }
?>