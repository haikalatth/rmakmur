<?php
    session_start();
    if(!isset($_SESSION['jabatan'])){
        if(!isset($_SESSION['id_supir'])){
            header('Location: login.php?pesan=Kamu Belum Login');
        }else{
            header('Location: login.php?pesan=Silakan Login Menggunakan Akun Anggota');
        }
    }
    $title = 'HOME';
    $active = 'home';

    $user = $_SESSION['nama'];
    include 'template/head.php' ?>
    <p>HA?</p>
<?php include 'template/foot.php' ?>
