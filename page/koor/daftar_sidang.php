<?php
    include "../../config/koneksi.php";
    $sql= "SELECT ujian.mhs_username, mhs.mhs_nama,dosen.dosen_nama, ujian.file_ujian, ujian.nilai_akhir FROM ujian JOIN mhs ON ujian.mhs_username = mhs.mhs_username JOIN bimbingan ON bimbingan.mhs_username = mhs.mhs_username JOIN dosen ON bimbingan.dosen_username = dosen.dosen_username";

    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $sql = "SELECT ujian.mhs_username, mhs.mhs_nama,dosen.dosen_nama, ujian.file_ujian, ujian.nilai_akhir FROM ujian JOIN mhs ON ujian.mhs_username = mhs.mhs_username JOIN bimbingan ON bimbingan.mhs_username = mhs.mhs_username JOIN dosen ON bimbingan.dosen_username = dosen.dosen_username WHERE mhs.mhs_username LIKE '%$keyword%' OR mhs.mhs_nama LIKE '%$keyword%' OR dosen.dosen_nama LIKE '%$keyword%'";
        if ($_POST['keyword'] == '') {
            $sql = "SELECT ujian.mhs_username, mhs.mhs_nama,dosen.dosen_nama, ujian.file_ujian, ujian.nilai_akhir FROM ujian JOIN mhs ON ujian.mhs_username = mhs.mhs_username JOIN bimbingan ON bimbingan.mhs_username = mhs.mhs_username JOIN dosen ON bimbingan.dosen_username = dosen.dosen_username";
        }
    }
    
    $q= mysqli_query($con,$sql);

    $sql = "SELECT * FROM dosen WHERE dosen_username = ?";
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

        <div class="container mt-3">
            <h3>Pendaftaran Sidang Mahasiswa</h3>
            <div class="row justify-content-between">
                <div class="col-2">
                    
                </div>
                <div class="col-4">
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari Mahasiswa" autocomplete="off">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pembimbing</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($q as $data): ?>
                    <tr>
                        <th scope="row"><?= $data['mhs_username'] ?></th>
                        <td><?= $data['mhs_nama'] ?></td>
                        <td><?= $data['dosen_nama'] ?></td>
                        <td><?= number_format($data['nilai_akhir'], 2, '.', '') ?></td>
                        <td>
                            <a href="../mhs/proc/download.php?file=<?= $data['mhs_username'] . ".zip" ?>"><i class="fa fa-download" style="font-size: 25px;" title="Download File"></i></a>
                            <a href="input_nilai.php?mhs=<?= $data['mhs_username'] ?>"><i class="fa fa-bar-chart" style="font-size: 25px;" title="Input Nilai"></i></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>