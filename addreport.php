<?php
    include 'template/koneksi.php';

    error_reporting(0);

    session_start();

    if (isset($_POST['submit'])) {
        $tanngal = date("Y-m-d");
        $bobot = $_POST['bobot'];
        $rendemen = 0;
        $pemilik = $_SESSION['pemilik'];
        $kontrak = $_POST['kontrak'];
        $lahan = $_POST['lahan'];
        $supir = $_SESSION['id_supir'];

//        echo $tanngal.$bobot.$rendemen.$pemilik.$kontrak.$lahan.$supir;

        $sql = "INSERT INTO transaksi (id_transaksi, tanggal, bobot, rendemen, id_pemilik, id_kontrak, id_lahan, id_supir)
                VALUES (
                '', '$tanngal','$bobot','$rendemen','$pemilik','$kontrak','$lahan','$supir')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }