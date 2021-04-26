<?php
    include "../../../config/koneksi.php";

    $user = $_GET['mhs'];

    $sql = "SELECT mhs.mhs_username, mhs.mhs_nama, dosen.dosen_nama FROM mhs LEFT JOIN bimbingan ON mhs.mhs_username = bimbingan.mhs_username LEFT JOIN dosen ON bimbingan.dosen_username = dosen.dosen_username WHERE mhs.mhs_username = '$user'";
    $q = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM log WHERE mhs_username = '$user'";
    $q2 = mysqli_query($con, $sql2);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/Picture18.png" />
        <title>Hello, world!</title>
    </head>
    <body>
        <div class="">
            <div class="row text-center my-4">
                <div class="col">
                    <h1>Log Bimbingan</h1>
                </div>
            </div>
            <table class="table table-borderless">
                <?php foreach($q as $data): ?>
                <tr>
                    <td width="200">NIM</td>
                    <td>: <?= $data['mhs_username'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $data['mhs_nama'] ?></td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing</td>
                    <td>: <?= $data['dosen_nama'] ?></td>
                </tr>
                <?php endforeach ?>
            </table>

            <table class="table">
                
                <thead>
                    <tr>
                        <th class="col-1">#</th>
                        <th class="col-2">Tanggal</th>
                        <th class="col-4">Keterangan Mahasiswa</th>
                        <th class="col-4">Komentar Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($q2 as $dt): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= date('d M Y', strtotime($dt["tgl"])) ?></td>
                        <td><?= $dt["ket"] ?></td>
                        <td><?= $dt["komentar"] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <script>window.print();</script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>