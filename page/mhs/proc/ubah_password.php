<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $password_lama = md5($_POST['password_lama']);
    $password = md5($_POST['password']);
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $sql = "SELECT mhs_username, mhs_password FROM mhs WHERE mhs_username = '$username' AND mhs_password = '$password_lama'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        $sql = "UPDATE mhs SET mhs_password = '$password' WHERE mhs_username = '$username'";
        $q = mysqli_query($con, $sql);
        if($q) {
            echo "
                <script>
                    alert('Password berhasil diubah!');
                    window.location.href = '../home.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Password gagal diubah!');
                    window.location.href = '../home.php';
                </script>
            ";
        }
    }
?>