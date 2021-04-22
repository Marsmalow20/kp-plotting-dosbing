<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $domisili_kp = $_POST['domisili_kp'];

    $sql = "UPDATE mhs SET domisili_kp = '$domisili_kp' WHERE mhs_username = '$username'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Domisili KP berhasil tersimpan!');
                window.location.href = '../input_objek_kp.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Domisili KP gagal tersimpan!');
                window.location.href = '../input_objek_kp.php';
            </script>
        ";
    }
?>