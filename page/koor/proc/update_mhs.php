<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $nama = $_POST['mhs_nama'];
    $dosbing = $_POST['dosbing'];
    $tgl_input_kp = $_POST['tgl_input_kp'];

    $sql = "UPDATE mhs, bimbingan SET mhs.mhs_nama='$nama', tgl_input_kp = '$tgl_input_kp', bimbingan.dosen_username='$dosbing' WHERE mhs.mhs_username = bimbingan.mhs_username AND mhs.mhs_username = '$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Data mahasiswa berhasil diedit!');
                window.location.href = '../list_mhs.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data mahasiswa gagal diedit!');
                window.location.href = '../list_mhs.php';
            </script>
        ";
    }
?>