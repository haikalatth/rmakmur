<?php
    include 'template/koneksi.php';

    error_reporting(0);

    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: home.php");
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['jabatan'] = $row['jabatan'];

            header("Location: home.php");
        } else {
            $sql = "SELECT * FROM supir WHERE id_supir='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id_supir'] = $row['id_supir'];
                $_SESSION['nama_supir'] = $row['nama_supir'];
                $_SESSION['pemilik'] = $row['juragan'];

                header("Location: report.php");
            }else{
                $pesan = urlencode('Username atau password salah');
                header('Location: login.php?pesan='.$pesan);
            }
        }
    }