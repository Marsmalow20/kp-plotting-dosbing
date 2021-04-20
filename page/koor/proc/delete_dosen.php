<?php
    include "../../../config/koneksi.php";

    $username = $_GET['dosen_username'];

    $sql = "DELETE FROM dosen WHERE dosen_username='$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data dosen berhasil dihapus!');
                window.location.href = '../list_dosen.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data dosen gagal dihapus!');
                window.location.href = '../list_dosen.php';
            </script>
        ";
    }
?>