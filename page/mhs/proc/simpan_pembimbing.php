<?php
    include "../../../config/koneksi.php";

    $username = $_POST['mhs_username'];
    $dosen = [$_POST['dosen1'],$_POST['dosen2'],$_POST['dosen3']];    

    $sql = "INSERT INTO pilihan VALUES(?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $stmt->bindParam(2, $dosen[0], PDO::PARAM_STR);
    $stmt->bindParam(3, $dosen[1], PDO::PARAM_STR);
    $stmt->bindParam(4, $dosen[2], PDO::PARAM_STR);    

    if($stmt->execute()){

        foreach($dosen as $key => $dsn){
            $sql = "SELECT dosen_kuota FROM dosen WHERE dosen_username = '$dsn' AND dosen_kuota > (SELECT COUNT(*) FROM bimbingan WHERE bimbingan.dosen_username = '$dsn')";
            $stmt = $pdo->prepare($sql);            
            $stmt->execute();            
            if($stmt->rowCount()){
                $sql = "INSERT INTO bimbingan VALUES(?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(1, $username, PDO::PARAM_STR);
                $stmt->bindParam(2, $dsn, PDO::PARAM_STR);
                $stmt->execute();
                break;
            }            
            if($key + 1 == count($dosen)){                
                $sql = "SELECT dosen.dosen_username FROM dosen WHERE dosen_kuota > (SELECT COUNT(*) FROM bimbingan WHERE bimbingan.dosen_username = dosen.dosen_username) LIMIT 1";                
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch();                                

                $sql = "INSERT INTO bimbingan VALUES(?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(1, $nim, PDO::PARAM_STR);
                $stmt->bindParam(2, $result[0], PDO::PARAM_STR);
                $stmt->execute();
            }                                    
        }

        header("Location: ../mhs_pembimbing.php");
    }
?>