<?php
    include "../../../config/koneksi.php";

    $mhs_username = $_GET['mhs'];
    $tgl_acc = '0000-00-00';

    $sql = "UPDATE mhs SET tgl_acc = '$tgl_acc' WHERE mhs_username = '$mhs_username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Mahasiswa telah BATAL di Acc untuk melakukan Sidang KP!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Mahasiswa masih di Acc untuk melakukan Sidang KP!');
                window.location.href = '../list_mhs_bimbingan.php';
            </script>
        ";
    }
?>