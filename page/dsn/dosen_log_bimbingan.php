<?php
    include "../../config/koneksi.php";
    
    $mhs_username = $_GET['mhs'];

    $sql = "SELECT * FROM log WHERE mhs_username = '$mhs_username'";
    $q = mysqli_query($con, $sql);

    $sql2 = "SELECT mhs_nama, tgl_acc FROM mhs WHERE mhs_username = '$mhs_username'";
    $q2 = mysqli_query($con, $sql2);

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
                        <a class="nav-link active" href="#">Mahasiswa Bimbingan</a>
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
            <h3>Log Bimbingan KP Mahasiswa : </h3>
            <div class="row justify-content-between mt-3">
                <?php foreach($q2 as $qq): ?>
                <div class="col-6">
                    <h4 class="text-secondary">
                        <?=  $qq['mhs_nama'] . " - " . $mhs_username ?>
                    </h4>
                </div>
                <div class="col-2">
                    <?php if($qq['tgl_acc'] == '0000-00-00') { ?> 
                        <a class="btn btn-success" href="proc/acc_sidang.php?mhs=<?= $mhs_username ?>" role="button" onclick="return confirm('Acc mahasiswa <?=  $qq['mhs_nama'] ?> ?')">Acc Sidang&nbsp<i class="fa fa-check"></i></a>
                    <?php } else { ?>
                        <a class="btn btn-danger" href="proc/cancel_sidang.php?mhs=<?= $mhs_username ?>" role="button" onclick="return confirm('Batal Acc mahasiswa <?=  $qq['mhs_nama'] ?> ?')"> Batal Acc Sidang&nbsp<i class="fa fa-close"></i></a>
                    <?php } ?>
                </div>
                <?php endforeach ?>
            </div>
            <table class="table table-striped mt-4">
                <thead class="thead-dark">
                    <tr class="d-flex">
                        <th class="col-1" scope="col">No</th>
                        <th class="col-2" scope="col">Tanggal</th>
                        <th class="col-4" scope="col">Keterangan Mahasiswa</th>
                        <th class="col-4" scope="col">Komentar Dosen</th>
                        <th class="col-1" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($q as $data):
                    ?>
                    <tr class="d-flex">
                        <th class="col-1" scope="row"><?= $i++ ?></th>
                        <td class="col-2"><?= date('d M Y', strtotime($data["tgl"])) ?></td>
                        <td class="col-4"><?= $data['ket'] ?></td>
                        <td class="col-4"><?= $data['komentar'] ?></td>
                        <td class="col-2">
                            <a href="edit_log_dosen.php?log_id=<?= $data['log_id'] ?>"><i class="fa fa-edit" style="font-size: 25px;" title="Tambah Komentar"></i></a>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
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