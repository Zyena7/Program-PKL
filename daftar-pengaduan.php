<?php
session_start();

if (empty($_SESSION['email'])) {
    header("location: login.php?pesan=no");
}
$page = "List";
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
    <title>Pelaporan - Daftar Laporan</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- Data Table -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- END Data Table -->
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo/logo2.png">
                </div>
                <div class="sidebar-brand-text mx-3">BID TIK Polda Kalsel</div>
            </a>

            <?php include "menu.php"; ?>

            <hr class="sidebar-divider">
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['nama']; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Laporan</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row col-lg-12">
                                        &nbsp; &nbsp;
                                    </div>
                                    <div class="table-responsive p-3">
                                        <?php
                                        if (isset($_GET['pesan'])) {
                                            if ($_GET['pesan'] == "gagal") {
                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Data gagal diubah. Pastikan anda sudah mengisinya dengan benar.
                                                </div>";
                                            } else if ($_GET['pesan'] == "sukses") {
                                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                    Selamat! Data berhasil diubah.
                                                </div>";
                                            } else if ($_GET['pesan'] == "ekstensi") {
                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Format gambar hanya .PNG, .JPEG, .JPG dan .BMP
                                                </div>";
                                            } else if ($_GET['pesan'] == "lengkapi") {
                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Pastikan anda sudah mengisi data dengan lengkap.
                                                </div>";
                                            } else if ($_GET['pesan'] == "hapus") {
                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Data berhasil dihapus.
                                                </div>";
                                            }
                                        }
                                        ?>
                                        <table class="table align-items-center table-bordered table-flush table-hover" id="tabel-pengaduan">
                                            <thead class="thead-light">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Tanggal Pengaduan</th>
                                                    <th>Status Laporan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'koneksi.php';
                                                $no = 1;
                                                $idm = $_SESSION['id_masyarakat'];
                                                $data = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan WHERE id_masyarakat='$idm' ORDER BY laporan_masuk DESC");
                                                while ($row = mysqli_fetch_array($data)) {
                                                    $status = $row['balasan_pengaduan'];
                                                    $text = "";
                                                    $statusClass = "";
                                                    if ($status == "Belum") {
                                                        $text = "Belum";
                                                        $statusClass = "text-danger";
                                                    } elseif ($status == "Proses") {
                                                        $text = "Proses";
                                                        $statusClass = "text-warning";
                                                    } elseif ($status == "Selesai") {
                                                        $text = "Selesai";
                                                        $statusClass = "text-success";
                                                    }

                                                    echo "<tr align='center'>
                                                    <td>$no</td>
                                                    <td><a href='detail-pengaduan.php?id=" . $row['id_pengaduan'] . "'> " . $row['subjek_pengaduan'] . " </a></td>
                                                    <td>" . tgl_indo($row['tgl_pengaduan']) . "</td>
                                                    <td class='" . $statusClass . "'>" . $text . "</td>
                                                    <td>
                                                        <a class='btn btn-sm btn-primary' href='ubah-pengaduan.php?id=" . $row['id_pengaduan'] . "'> Ubah </a>
                                                        <a class='btn btn-sm btn-danger' href='hapus-pengaduan.php?id=" . $row['id_pengaduan'] . "'> Hapus </a>
                                                    </td>
                                                </tr>";
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->

                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Apakah anda ingin keluar!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Yakin akan logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                    <a href="logout.php" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <!-- Data Table -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabel-pengaduan').DataTable();
        })
    </script>
    <!-- END Data Table -->

</body>

</html>