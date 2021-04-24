<?php
    include "../../../config/koneksi.php";

    # get pretty much everything needed soon.
    $username = $_POST['mhs_username'];
    $nama_file = $_FILES['berkas']['name'];
    $tmp_name = $_FILES['berkas']['tmp_name'];
    $file_size = $_FILES['berkas']['size'];
    $ekstensi = explode('.', $nama_file);
    $ekstensi = strtolower(end($ekstensi));

    # define allowed format to upload
    $allowed_format = ['zip'];

    # check if uploaded file is an allowed format
    if(!in_array($ekstensi, $allowed_format)) {
        echo "
            <script>
                alert('Mohon Upload file dengan ekstensi .zip!');
                window.location.href = '../input_sidang.php';
            </script>
        ";
        exit;
    }

    # check if uploaded file is smaller than 3MB
    if ($file_size > 3000000) {
        echo "
            <script>
                alert('Mohon Upload file dengan ukuran kurang dari 3MB');
                window.location.href = '../input_sidang.php';
            </script>
        ";
        exit;
    }

    # set default file name to save in server.
    $save_file = strtolower($username) . "." . $ekstensi;

    # move uploaded file to server filepath.
    move_uploaded_file($tmp_name, '../../../upload/' . $save_file);

    # insert or update into database
    $sql = "INSERT INTO ujian (mhs_username, file_ujian) VALUES ('$username', '$save_file') ON DUPLICATE KEY UPDATE file_ujian = '$save_file'";
    $q = mysqli_query($con, $sql);

    if($q) {
        echo "
            <script>
                alert('Daftar Sidang berhasil!');
                window.location.href = '../sidang.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Daftar Sidang gagal!');
                window.location.href = '../sidang.php';
            </script>
        ";
    }
?>