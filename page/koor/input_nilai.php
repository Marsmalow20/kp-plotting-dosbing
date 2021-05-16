<?php
    include "../../config/koneksi.php";

    $mhs_username = $_GET['mhs'];
    
    $sql = "SELECT * FROM dosen WHERE dosen_username = ?";
    $stat = $pdo->prepare($sql);
    $res = array($_SESSION['login']);
    $stat->execute($res);
    $data = $stat->fetchAll();

    $sql2 = "SELECT * FROM ujian WHERE mhs_username = '$mhs_username'";
    $q = mysqli_query($con, $sql2);
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
        <title>Home</title>
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
                        <a class="nav-link" href="list_dosen.php">Dosen <span class="sr-only"></span></a>
                        <a class="nav-link" href="list_mhs.php">Mahasiswa</a>
                        <a class="nav-link" href="list_bimbingan_mhs.php">Bimbingan</a>
                        <a class="nav-link active" href="daftar_sidang.php">Pendaftaran Sidang</a>
                    </div>
                </div>
                <?php foreach($data as $dt): ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $dt['dosen_nama']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="password.php"><i class="fa fa-key" style="color: #aaa;"></i> &nbspUbah Password</a>
                            <a class="dropdown-item" href="../../config/logout.php"><i class="fa fa-power-off" style="color: #aaa;"></i> &nbspLogout</a>
                        </div>
                    </li>
                </ul>
                <?php endforeach ?>
            </div>
        </nav>

        <div class="container mt-3 col-lg-4">
            <h3 class="my-4">Input Nilai Mahasiswa</h3>
            <form action="proc/simpan_nilai.php" method="POST">
                <?php foreach($q as $qq): ?>
                <div class="form-group">
                    <label for="mhs_username">Username</label>
                    <input class="form-control" type="text" placeholder="Username (NIM)" name="mhs_username" value="<?= $qq['mhs_username'] ?>" id="mhs_username" autocomplete="off" readonly>
                </div>
                <div class="form-group">
                    <label for="nilai_penyelia">Nilai Penyelia</label>
                    <input class="form-control" type="number" placeholder="Nilai Penyelia" name="nilai_penyelia" value="<?= $qq['nilai_penyelia'] ?>" min="0" max="100" id="nilai_penyelia" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nilai_pembimbing">Nilai Pembimbing</label>
                    <input class="form-control" type="number" placeholder="Nilai Pembimbing" name="nilai_pembimbing" value="<?= $qq['nilai_pembimbing'] ?>" min="0" max="100" id="nilai_pembimbing" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nilai_penguji">Nilai Penguji</label>
                    <input class="form-control" type="number" placeholder="Nilai Penguji" name="nilai_penguji" value="<?= $qq['nilai_penguji'] ?>" min="0" max="100" id="nilai_penguji" autocomplete="off">
                </div>
                <div class=" my-2 float-right">
                    <a class="btn btn-danger" href="daftar_sidang.php" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php endforeach ?>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>