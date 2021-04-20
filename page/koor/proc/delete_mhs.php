<?php
    include "../../../config/koneksi.php";

    $username = $_GET['mhs'];

    $sql = "DELETE FROM mhs WHERE mhs_username='$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data mahasiswa berhasil dihapus!');
                window.location.href = '../list_mhs.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data mahasiswa gagal dihapus!');
                window.location.href = '../list_mhs.php';
            </script>
        ";
    }
?>