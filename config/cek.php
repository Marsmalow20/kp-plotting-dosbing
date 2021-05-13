<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_as = $_POST['login-as'];

    if($login_as == 'mahasiswa') {
        $sql = "SELECT * FROM mhs WHERE mhs_username = ? AND mhs_password = ?";
    } else {
        $sql = "SELECT * FROM dosen WHERE dosen_username = ? AND dosen_password = ?";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($username, md5($password)));
    $user = $stmt->fetch();

    print_r($user);

    if($user) {
        if($login_as == 'mahasiswa') {
            $_SESSION['login'] = $user['mhs_username'];
            header('Location: ../page/mhs/mhs_pembimbing.php');
        } else {
            $_SESSION['login'] = $user['dosen_username'];
            header('Location: ../page/dsn/list_mhs_bimbingan.php');
        }

        if($_SESSION['login'] == 'koor') {
            header('Location: ../page/koor/list_dosen.php');
        }
    } else {
        echo "
            <script>
                alert('Username dan password salah!');
                window.location.href = '../index.php';
            </script>
        ";
    }
?>