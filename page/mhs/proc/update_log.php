<?php
    include "../../../config/koneksi.php";

    $log_id = $_POST['log_id'];
    $tgl = $_POST['tgl'];
    $ket = $_POST['ket'];

    $sql = "UPDATE log SET tgl = '$tgl', ket = '$ket' WHERE log_id = '$log_id'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Log Bimbingan berhasil diedit!');
                window.location.href = '../mhs_log_bimbingan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Log Bimbingan gagal diedit!');
                window.location.href = '../mhs_log_bimbingan.php';
            </script>
        ";
    }
?>