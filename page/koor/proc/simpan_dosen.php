<?php
    include "../../../config/koneksi.php";

    $username = $_POST['dosen_username'];
    $nama = $_POST['dosen_nama'];
    $kuota = $_POST['dosen_kuota'];
    $password = md5('default');

    #semua akun dosen baru tersimpan dengan password awal = 'default'

    $sql = "INSERT INTO dosen VALUES('$username', '$password', '$nama', '$kuota')";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data dosen berhasil tersimpan!');
                window.location.href = '../list_dosen.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data dosen gagal tersimpan!');
                window.location.href = '../input_dosen.php';
            </script>
        ";
    }
?>