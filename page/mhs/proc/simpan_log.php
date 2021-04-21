<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $tgl = $_POST['tgl'];
    $ket = $_POST['ket'];

    $sql = "INSERT INTO log VALUES('', '$username', '$tgl', '$ket', '')";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Log Bimbingan berhasil tersimpan!');
                window.location.href = '../mhs_log_bimbingan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Log Bimbingan gagal tersimpan!');
                window.location.href = '../mhs_log_bimbingan.php';
            </script>
        ";
    }
?>