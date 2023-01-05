<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RM - Laporan</title>

    <!-- Custom fonts for this template-->
    <link href="template/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="template/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-4 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="h3 text-gray-900 mb-4">Laporan Tebang Angkut</h3>

                                </div>
                                <form method="post" action="addreport.php" class="user">
                                    <div class="form-group">
                                        <select class="custom-select" name="kontrak">
                                            <option >Pilih Kontrak</option>
                                            <?php
                                                include 'template/koneksi.php';
                                                $pemilik = $_SESSION['pemilik'];
                                                $sql = "SELECT * FROM kontrak WHERE pemilik='$pemilik'";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo '<option value="'.$row['id_kontrak'].'">'.$row['nama_kontrak'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select" name="lahan">
                                            <option >Pilih Lahan</option>
                                            <?php
                                                include 'template/koneksi.php';
                                                $pemilik = $_SESSION['pemilik'];
                                                $sql = "SELECT * FROM lahan WHERE pemilik='$pemilik'";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo '<option value="'.$row['id_lahan'].'">'.$row['nama_lahan'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="bobot" class="form-control form-control-user" placeholder="bobot">
                                    </div>
                                    <input type="hidden" name="pemilik" value="<?php $pemilik?>">
                                    <hr>
                                    <input name="submit" type="submit" class="btn btn-primary btn-user btn-block" value="Kirim Laporan">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="template/assets/vendor/jquery/jquery.min.js"></script>
<script src="template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="template/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="template/assets/js/sb-admin-2.min.js"></script>

</body>

</html>