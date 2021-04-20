<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $nama = $_POST['mhs_nama'];
    $password = md5('defaultmhs');

    #semua akun mahasiswa baru tersimpan dengan password awal = 'defaultmhs'

    $sql = "INSERT INTO mhs VALUES('$username', '$password', '$nama')";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data mahasiswa berhasil tersimpan!');
                window.location.href = '../list_mhs.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data mahasiswa gagal tersimpan!');
                window.location.href = '../input_mhs.php';
            </script>
        ";
    }
?>