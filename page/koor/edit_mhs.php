<?php
    include "../../config/koneksi.php";

    $nim = $_GET['mhs'];
    $dosen = $_GET['dosen'];

    $sql = "SELECT * FROM dosen WHERE dosen_username = ?";
    $stat = $pdo->prepare($sql);
    $res = array($_SESSION['login']);
    $stat->execute($res);
    $data = $stat->fetchAll();

    $sql = "SELECT * FROM mhs WHERE mhs_username = '$nim'";
    $q = mysqli_query($con, $sql);

    $sql2 = "SELECT dosen_username, dosen_nama FROM dosen WHERE dosen_username != '$dosen' AND dosen_username != 'koor' ORDER BY dosen_nama ";
    $stat2 = $pdo->prepare($sql2);
    $stat2->execute();
    $data2 = $stat2->fetchAll();

    $sql3 = "SELECT dosen_username, dosen_nama FROM dosen WHERE dosen_username = '$dosen'";
    $stat3 = $pdo->prepare($sql3);
    $stat3->execute();
    $data3 = $stat3->fetchAll();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/Picture18.png" />
        <title>Edit Mahasiswa</title>
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
                        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Dosen
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dosen.php">List Dosen</a>
                            <a class="dropdown-item" href="dosen_input.php">Input Dosen</a>
                            </div>
                        </li>
                        <a class="nav-link active" href="#">Mahasiswa</a>
                    </div>
                </div>
                <?php foreach($data as $dt): ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $dt['dosen_nama']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../../config/logout.php"><i class="fa fa-power-off" style="color: #aaa;"></i> &nbspLogout</a>
                        </div>
                    </li>
                </ul>
                <?php endforeach ?>
            </div>
        </nav>

        <div class="container mt-3">
            <h3>Edit Mahasiswa</h3>
            <?php
                foreach($q as $data):
            ?>
            <form action="proc/update_mhs.php" method="POST">
                <div class="form-group">
                    <label for="mhs_username">Username</label>
                    <input class="form-control" type="text" placeholder="Username (NIM)" name="mhs_username" value="<?= $data['mhs_username'] ?>" id="mhs_username" autocomplete="off" readonly>
                </div>
                <div class="form-group">
                    <label for="mhs_nama">Nama</label>
                    <input class="form-control" type="text" placeholder="Nama Mahasiswa" name="mhs_nama" value="<?= $data['mhs_nama'] ?>" id="mhs_nama" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="text-secondary" for="dosbing" style="font-size: .8em;">Dosen Pembimbing</label>
                    <select class="custom-select" id="dosbing" name="dosbing">
                        <?php foreach($data3 as $dt3): ?>
                        <option selected value="<?= $dt3['dosen_username'] ?>"><?= $dt3['dosen_nama'] ?></option>
                        <?php endforeach; ?>
                        <?php foreach($data2 as $dt2): ?>
                        <option value="<?= $dt2['dosen_username'] ?>"><?= $dt2['dosen_nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
                endforeach;
            ?>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>