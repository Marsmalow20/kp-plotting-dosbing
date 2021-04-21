<?php
    include "../../../config/koneksi.php";

    $mhs_username = $_GET['mhs'];
    $tgl_acc = date("Y-m-d");

    $sql = "UPDATE mhs SET tgl_acc = '$tgl_acc' WHERE mhs_username = '$mhs_username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Mahasiswa telah di Acc untuk melakukan Sidang KP!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Mahasiswa gagal di Acc untuk melakukan Sidang KP!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    }
?>