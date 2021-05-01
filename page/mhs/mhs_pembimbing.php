<?php
    include "../../config/koneksi.php";

    $user = $_SESSION["login"];

    $sql = "SELECT * FROM mhs WHERE mhs_username = ?";
    $stat = $pdo->prepare($sql);
    $res = array($_SESSION['login']);
    $stat->execute($res);
    $data = $stat->fetchAll();
    
    $sql3 = "SELECT mhs.mhs_username, mhs.mhs_nama, dosen.dosen_username,dosen.dosen_nama FROM mhs, bimbingan, dosen WHERE mhs.mhs_username = bimbingan.mhs_username AND bimbingan.dosen_username = dosen.dosen_username AND mhs.mhs_username = ?";
    $stat3 = $pdo->prepare($sql3);
    $stat3->execute($res);
    $data3 = $stat3->fetchAll();

    $coba = "SELECT mhs.mhs_username, mhs.mhs_nama, dosen.dosen_username,dosen.dosen_nama FROM mhs, bimbingan, dosen WHERE mhs.mhs_username = bimbingan.mhs_username AND bimbingan.dosen_username = dosen.dosen_username AND mhs.mhs_username = '$user'";
    $q = mysqli_query($con, $coba);
    $result = mysqli_num_rows($q);

    $sql4 = "SELECT mhs_username, (SELECT dosen_nama FROM dosen WHERE dosen_username = dosen1) as satu, (SELECT dosen_nama FROM dosen WHERE dosen_username = dosen2) as dua, (SELECT dosen_nama FROM dosen WHERE dosen_username = dosen3) as tiga FROM pilihan WHERE mhs_username = ?";
    $stat4 = $pdo->prepare($sql4);
    $stat4->execute($res);
    $data4 = $stat4->fetchAll();
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
        <link rel="icon" type="image/png" href="img/Picture18.png" />
        <title>Dosen</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="">Application</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="home.php">Home</a>
                        <a class="nav-link active" href="mhs_pembimbing.php">Dosen Pembimbing <span class="sr-only"></span></a>
                        <a class="nav-link" href="input_objek_kp.php">Objek KP<span class="sr-only"></span></a>
                        <a class="nav-link" href="mhs_log_bimbingan.php">Log Bimbingan<span class="sr-only"></span></a>
                        <a class="nav-link" href="sidang.php">Daftar Sidang KP<span class="sr-only"></span></a>
                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <?php foreach($data as $dt): ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $dt['mhs_nama'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="password.php"><i class="fa fa-key" style="color: #aaa;"></i> &nbspUbah Password</a>
                            <a class="dropdown-item" href="../../config/logout.php"><i class="fa fa-power-off" style="color: #aaa;"></i> &nbspLogout</a>
                        </div>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container mt-3">
            <h3>Dosen Pembimbing</h3>
            <div class="row mt-4">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Dosen Pembimbing
                        </div>
                        <div class="card-body">
                            <?php foreach ($data3 as $dt3): ?>
                            <h5 class="card-title"><?= $dt3['dosen_nama'] ?></h5>
                            <p class="card-text"><?= $dt3['dosen_username'] ?></p>
                            <?php endforeach ?>
                        </div>
                        <div class="card-footer text-muted">
                        <?=
                            ($result <= 0 ?
                            '<a class="btn btn-primary" href="input_pembimbing.php" role="button">Input Dosen Pembimbing</a>' :
                            '<a class="btn btn-primary disabled" href="input_pembimbing.php" role="button">Input Dosen Pembimbing</a>')
                        ?>
                        
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-header">
                            Data Pilihan Dosen
                        </div>
                        <div class="card-body">
                            <ul class="list-group text-left mt-3 mb-3">
                                <?php foreach($data4 as $dt4): ?>
                                <li class="list-group-item">Dosen 1 <span class="float-right"><?= $dt4['satu'] ?></span> </li>
                                <li class="list-group-item">Dosen 2 <span class="float-right"><?= $dt4['dua'] ?></span> </li>
                                <li class="list-group-item">Dosen 3 <span class="float-right"><?= $dt4['tiga'] ?></span> </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            text
                        </div>
                    </div>
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