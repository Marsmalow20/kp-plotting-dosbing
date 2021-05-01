<?php
    include "../../config/koneksi.php";
    $user = $_SESSION['login'];

    $sql = "SELECT * FROM mhs WHERE mhs_username = ?";
    $stat = $pdo->prepare($sql);
    $res = array($_SESSION['login']);
    $stat->execute($res);
    $data = $stat->fetchAll();
    
    $sql2 = "SELECT dosen_username, dosen_nama FROM dosen WHERE dosen_username != 'koor' ORDER BY dosen_nama";
    $stat2 = $pdo->prepare($sql2);
    $stat2->execute();
    $data2 = $stat2->fetchAll();
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
            <h3>Input Dosen Pembimbing</h3>
            <form action="proc/simpan_pembimbing.php" method="POST" id="form">
                <input class="form-control" type="text" placeholder="" name="mhs_username" id="mhs_username" autocomplete="off" value="<?= $user ?>" readonly>
                <div class="form-group">
                    <label class="text-secondary" for="dosen1" style="font-size: .8em;">Dosen 1</label>
                    <select class="custom-select" id="dosen1" name="dosen1">
                        <option selected disabled>- Pilih Alternatif Dosen 1 -</option>
                        <?php foreach($data2 as $dt2): ?>
                        <option value="<?= $dt2['dosen_username'] ?>"><?= $dt2['dosen_nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-secondary" for="dosen2" style="font-size: .8em;">Dosen 2</label>
                    <select class="custom-select" id="dosen2" name="dosen2">
                        <option selected disabled>- Pilih Alternatif Dosen 2 -</option>
                        <?php foreach($data2 as $dt2): ?>
                        <option value="<?= $dt2['dosen_username'] ?>"><?= $dt2['dosen_nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-secondary" for="dosen3" style="font-size: .8em;">Dosen 3</label>
                    <select class="custom-select" id="dosen3" name="dosen3">
                        <option selected disabled>- Pilih Alternatif Dosen 3 -</option>
                        <?php foreach($data2 as $dt2): ?>
                        <option value="<?= $dt2['dosen_username'] ?>"><?= $dt2['dosen_nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>