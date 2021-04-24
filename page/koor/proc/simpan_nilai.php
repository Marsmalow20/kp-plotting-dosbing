<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $nilai_penyelia = $_POST['nilai_penyelia'];
    $nilai_pembimbing = $_POST['nilai_pembimbing'];
    $nilai_penguji = $_POST['nilai_penguji'];

    $nilai_akhir = ($nilai_penyelia + $nilai_pembimbing + $nilai_penguji)/3;

    $sql = "UPDATE ujian SET nilai_penyelia = '$nilai_penyelia', nilai_pembimbing = '$nilai_pembimbing', nilai_penguji = '$nilai_penguji', nilai_akhir = '$nilai_akhir' WHERE mhs_username = '$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data nilai berhasil tersimpan!');
                window.location.href = '../daftar_sidang.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data nilai gagal tersimpan!');
                window.location.href = '../daftar_sidang.php';
            </script>
        ";
    }
?>