<?php
    include "../../config/koneksi.php";
    
    $user = $_SESSION['login'];

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
        <title>Mahasiswa</title>
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
            <div class="container mt-3">
                <h3>Ubah Password</h3>
                <form action="proc/ubah_password.php" method="POST">
                    <div class="form-group">
                        <label for="dosen_username">NIM</label>
                        <input class="form-control" type="text" name="dosen_username" value="<?= $user ?>" id="dosen_username" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input class="form-control" type="password" name="password_lama" placeholder="Password Lama" id="password_lama" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" onkeyup="check()" id="password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="con_password">Konfirmasi Password</label>
                        <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" onkeyup="check()" id="con_password" autocomplete="off" required>
                    </div>

                    <div id="pass_eight" class="form-text text-muted"><i class="fa fa-ellipsis-h" aria-hidden="true">&nbsp</i> Password minimal 8 karakter</div>
                    <div id="pass_num" class="form-text text-muted"><i class="fa fa-ellipsis-h" aria-hidden="true">&nbsp</i> Password mengandung angka</div>
                    <div id="pass_case" class="form-text text-muted"><i class="fa fa-ellipsis-h" aria-hidden="true">&nbsp</i> Password mengandung lowercase & uppercase</div>
                    <div id="pass_confirm" class="form-text text-muted"><i class="fa fa-ellipsis-h" aria-hidden="true">&nbsp</i> Password harus sama dengan konfirmasi password</div>

                    <button type="submit" class="btn btn-primary mt-3 disabled" id="btn-submit">Ubah Password</button>
                </form>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script>
            const password = document.getElementById('password');
            const con_password = document.getElementById('con_password');
            const pass_eight = document.getElementById('pass_eight');
            const pass_num = document.getElementById('pass_num');
            const pass_case = document.getElementById('pass_case');
            const pass_confirm = document.getElementById('pass_confirm');
            const btn = document.getElementById('btn-submit');

            const check_num = /[0-9]/i;
            const check_lower = /[a-z]/g;
            const check_upper = /[A-Z]/g;
            
            let eight = 0, num = 0, lu_case = 0, conf = 0;

            function check() {

                if (password.value.length >= 8) {
                    pass_eight.className = "form-text text-success";
                    pass_eight.innerHTML = '<i class="fa fa-check" aria-hidden="true">&nbsp</i> Password minimal 8 karakter';
                    eight = 1;
                    
                } else {
                    pass_eight.className = "form-text text-danger";
                    pass_eight.innerHTML = '<i class="fa fa-times" aria-hidden="true">&nbsp</i> Password minimal 8 karakter';
                    eight = 0;
                }

                if (password.value.match(check_num)) {
                    pass_num.className = "form-text text-success";
                    pass_num.innerHTML = '<i class="fa fa-check" aria-hidden="true">&nbsp</i> Password mengandung angka';
                    num = 1;
                } else {
                    pass_num.className = "form-text text-danger";
                    pass_num.innerHTML = '<i class="fa fa-times" aria-hidden="true">&nbsp</i> Password mengandung angka';
                    num = 0;
                }

                if (password.value.match(check_lower) && password.value.match(check_upper)) {
                    pass_case.className = "form-text text-success";
                    pass_case.innerHTML = '<i class="fa fa-check" aria-hidden="true">&nbsp</i> Password mengandung lowercase & uppercase';
                    lu_case = 1;
                } else {
                    pass_case.className = "form-text text-danger";
                    pass_case.innerHTML = '<i class="fa fa-times" aria-hidden="true">&nbsp</i> Password mengandung lowercase & uppercase';
                    lu_case = 0;
                }

                if (password.value == con_password.value) {
                    pass_confirm.className = "form-text text-success";
                    pass_confirm.innerHTML = '<i class="fa fa-check" aria-hidden="true">&nbsp</i> Password harus sama dengan konfirmasi password';
                    conf = 1;
                } else {
                    pass_confirm.className = "form-text text-danger";
                    pass_confirm.innerHTML = '<i class="fa fa-times" aria-hidden="true">&nbsp</i> Password harus sama dengan konfirmasi password';
                    conf = 0;
                }

                let passed = parseInt(eight + num + lu_case + conf);

                if (passed == 4) {
                    btn.disabled = false;
                    btn.classList.remove('disabled');
                } else {
                    btn.disabled = true;
                    btn.classList.add('disabled');
                }
            }
        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>