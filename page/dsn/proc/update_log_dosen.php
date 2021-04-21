<?php
    include "../../../config/koneksi.php";

    $log_id = $_POST['log_id'];
    $komentar = $_POST['komentar'];

    $sql = "UPDATE log SET komentar = '$komentar' WHERE log_id = '$log_id'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Log Bimbingan berhasil diedit!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Log Bimbingan gagal diedit!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    }
?>