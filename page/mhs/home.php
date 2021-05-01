<?php
    include "../../config/koneksi.php";

    if (!isset($_SESSION['login'])){
        header("Location: ../../index.php");
    }

    $user = $_SESSION['login'];

    $sql = "SELECT * FROM mhs WHERE mhs_username = ?";
    $stat = $pdo->prepare($sql);
    $res = array($_SESSION['login']);
    $stat->execute($res);
    $data = $stat->fetchAll();

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- Icon -->
        <script src="https://use.fontawesome.com/e186923299.js"></script>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/img/Picture18.png" />
        <title>Home</title>
    </head>
    <body>
        <?php foreach($data as $dt): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="">Application</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $dt['mhs_nama']?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="password.php"><i class="fa fa-key" style="color: #aaa;"></i> &nbspUbah Password</a>
                                <a class="dropdown-item" href="../../config/logout.php"><i class="fa fa-power-off" style="color: #aaa;"></i> &nbspLogout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php endforeach; ?>

        <div class="row justify-content-center mt-4">
            <div class="col-4">
                <div class="list-group">
                    <a href="mhs_pembimbing.php" class="list-group-item list-group-item-action list-group-item-secondary text-dark">Dosen Pembimbing</a>
                    <a href="input_objek_kp.php" class="list-group-item list-group-item-action list-group-item-light text-dark">Objek KP</a>
                    <a href="mhs_log_bimbingan.php" class="list-group-item list-group-item-action list-group-item-secondary text-dark">Log Bimbingan</a>
                    <a href="sidang.php" class="list-group-item list-group-item-action list-group-item-light text-dark">Daftar Sidang KP</a>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>