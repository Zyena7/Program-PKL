<?php 
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if(!empty($_SESSION['email'])){
        header("location:index.php");
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Halaman Pendaftaran</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-9 mx-auto">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Pendaftaran Pengguna</h1>
                                    </div>
                                    <form class="user" action="proses-pendaftaran.php" method="post">
                                        <?php
                                        if(isset($_GET['pesan'])){
                                            if($_GET['pesan'] == "gagal"){
                                                echo "<div class='text-danger'><b>Pendaftaran gagal. Silakan coba lagi.</b></div><br>";
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputNik" aria-describedby="mikHelp" name="nik"
                                                placeholder="Nik" required maxlength="16">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" name="nama"
                                                placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Kata Sandi" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Sudah punya akun? <a class="font-weight-bold small" href="login.php">Login disini.</a>
                                    </div>
                                    <div class="text-center">   
                                        <hr>       
                                        <div class="text-center">
                                            Untuk login ke halaman Admin <a class="font-weight-bold small" href="admin/login.php">Login disini.</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>

</html>
