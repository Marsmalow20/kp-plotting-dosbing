<?php
    include "../../config/koneksi.php";
    
    $log_id = $_GET['log_id'];

    $sql = "SELECT * FROM log WHERE log_id = '$log_id'";
    $q = mysqli_query($con, $sql);

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
                        <a class="nav-link" href="mhs_pembimbing.php">Dosen Pembimbing <span class="sr-only"></span></a>
                        <a class="nav-link" href="input_objek_kp.php">Objek KP<span class="sr-only"></span></a>
                        <a class="nav-link active" href="mhs_log_bimbingan.php">Log Bimbingan<span class="sr-only"></span></a>
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
            <div class="container mt-3">
                <h3>Edit Log Bimbingan KP</h3>
                <form action="proc/update_log.php" method="POST">
                    <?php 
                        foreach($q as $qq):
                            $leng = strlen($qq['ket']);
                    ?>
                    <div class="form-group">
                        <label for="log_id">ID Log Bimbingan</label>
                        <input class="form-control" type="text" name="log_id" value="<?= $qq['log_id'] ?>" id="log_id" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mhs_username">NIM</label>
                        <input class="form-control" type="text" name="mhs_username" value="<?= $qq['mhs_username'] ?>" id="mhs_username" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Bimbingan</label>
                        <input class="form-control" type="date" name="tgl" id="tgl" value="<?= $qq['tgl'] ?>">
                    </div>
                    <div class="form-floating my-3">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control" placeholder="Masukan keterangan bimbingan" name="ket" id="ket" onkeyup="count(this.value)" maxlength="200"><?= $qq['ket'] ?></textarea>
                        <large id="passwordHelp" class="form-text my-2">Max Character : <span id="charcount"><?= $leng ?></span>/200</large>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php endforeach ?>
                </form>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script>
            const charcount = document.getElementById("charcount");

            function count(str) {
                let leng = str.length;

                charcount.innerHTML = leng;
            }
        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>