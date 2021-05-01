<?php
    include "../../../config/koneksi.php";

    $username = $_POST['dosen_username'];
    $password_lama = md5($_POST['password_lama']);
    $password = md5($_POST['password']);
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $sql = "SELECT dosen_username FROM dosen WHERE dosen_username = '$username' AND dosen_password = '$password_lama'";
    $q = mysqli_query($con, $sql);

    if ($q) {
        $sql = "UPDATE dosen SET dosen_password = '$password' WHERE dosen_username = '$username'";
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
    } else {
        echo "
                <script>
                    alert('Password lama salah!');
                    window.location.href = '../home.php';
                </script>
            ";
    }
?>