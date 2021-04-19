<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_as = $_POST['login-as'];

    if($login_as == 'mahasiswa') {
        $sql = "SELECT * FROM mahasiswa WHERE username = ? AND password = ?";
    } else {
        $sql = "SELECT * FROM dosen WHERE username = ? AND password = ?";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($username, md5($password)));
    $user = $stmt->fetch();

    if($user) {
        $_SESSION['login'] = $user['username']
        header('Location: ../page/mhs/home.php');
    }
?>