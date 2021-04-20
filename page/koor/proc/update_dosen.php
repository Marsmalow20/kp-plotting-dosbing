<?php
    include "../../../config/koneksi.php";

    $username = $_POST['dosen_username'];
    $nama = $_POST['dosen_nama'];
    $kuota = $_POST['dosen_kuota'];

    $sql = "UPDATE dosen SET dosen_nama='$nama', dosen_kuota='$kuota' WHERE dosen_username='$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data dosen berhasil diedit!');
                window.location.href = '../list_dosen.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data dosen gagal diedit!');
                window.location.href = '../list_dosen.php';
            </script>
        ";
    }
?>