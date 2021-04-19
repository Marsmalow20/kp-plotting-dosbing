<?php
    // include "config/koneksi.php";
    // if(isset($_SESSION['login'])){
    //     if($_SESSION['login'] === 'koordinator') {
    //         header('Location: home.php');
    //     } else if($_SESSION['login'] !== 'koordinator') {
    //         header('Location: home_mahasiswa.php');
    //     }
    //     exit;
    // }
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
        <link rel="icon" type="image/png" href="assets/img/Picture18.png" />
        <title>Application</title>
    </head>
    <body style="background: linear-gradient(90deg, hsla(177, 87%, 79%, 1) 0%, hsla(235, 89%, 70%, 1) 100%);">
        <div class="container d-flex justify-content-center mt-5 col-sm-3">
            <form action="config/cek.php" method="POST" class="border border-white rounded p-4 bg-white w-100">
                <h3 class="text-center">Login</h3>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" placeholder="Username" name="username" id="username" autocomplete="off" autofocus required>
                    <small id="nimHelp" class="form-text text-muted">Ex : A12.2017.05699</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" autocomplete="off" required>
                </div>
                <label for="login-as">Login As :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Mahasiswa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Dosen
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>