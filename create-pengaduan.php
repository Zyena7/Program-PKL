<?php 
	session_start();

    // cek apakah yang mengakses halaman ini sudah login
	if(empty($_SESSION['email'])){
		header("location:login.php?pesan=no");
	}

  include "koneksi.php";
  $page = "Buat";

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
  <title>Pengaduan - Buat Baru</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
            <h1 class="h3 mb-0 text-gray-800">Buat Laporan</h1>
          </div>
          <div class="row">
         ` <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-body">
                <?php
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                     echo "<div class='alert alert-danger' role='alert'>
                            Data gagal disimpan. Pastikan anda sudah mengisinya dengan benar.
                          </div>";
                    }
                    else if($_GET['pesan'] == "sukses"){
                      echo "<div class='alert alert-success' role='alert'>
                            Data berhasil dikirim. Petugas berwenang akan memerika pengaduan, kemudian akan mengirimkan ke pejabat yang berwenang <a class='text-dark' href='daftar-pengaduan.php'><b>Cek Daftar Pengaduan</b></a>
                           </div>";                   
                    }
                    else if($_GET['pesan'] == "ekstensi"){
                      echo "<div class='alert alert-danger' role='alert'>
                            Format gambar hanya .PNG, .JPEG, .JPG dan .BMP
                           </div>";                   
                    }
                    else if($_GET['pesan'] == "lengkapi"){
                      echo "<div class='alert alert-danger' role='alert'>
                           Pastikan anda sudah mengisi data dengan lengkap.
                           </div>";                   
                    }
                  }
                ?>

                  <form action="add-pengaduan.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                     <label class="text-info">Tanda *) Wajib Diisi</label>
                     <input type="hidden" name="IdMasyarakat" value="<?php  echo $_SESSION['id_masyarakat'];?> ">
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label for="tgl" class="text-primary">Tanggal Pengaduan *)</label>
                      </div>
                      <div class="col-lg-7">
                       <label class="text-default"><?php echo tgl_indo(date('Y-m-d'))?> </label>
                      </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-lg-3">
                        <label for="subjek" class="text-primary">Subjek Pengaduan *)</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="subjek" id="subjek" aria-describedby="subjekdesc">
                            <option value="Penipuan Online">Penipuan Online</option>
                            <option value="Pencurian Identitas">Pencurian Identitas</option>
                            <option value="Cyberbullying">Cyberbullying</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                     <div class="col-lg-10">
                      <label class="text-primary">Laporan Pengaduan *)</label>
                      <textarea name="isi" class="form-control" placeholder="Masukkan isi pengaduan ..."></textarea>
                     </div>
                    </div>

                    <div class="form-group">
                     <label class="text-primary"  aria-describedby="buktidoc" >Bukti Dokumen/Foto *)</label>
                     <small id="buktidoc" class="form-text text-muted">Bukti dokumen berupa foto atau gambar dengan format .JPG, .PNG, BMP</small>
                    </div>

                    <div class="form-group row">
                     <div class="col-lg-10">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="customFile">
                        <label class="custom-file-label" for="customFile">Upload file</label>
                      </div>
                     </div>
                    </div>
                    <br>
                    <center>
                    <button type="reset" class="btn btn-lg btn-danger">Reset</button> &nbsp;
                    <button type="submit" name="send" class="btn btn-lg btn-success" onClick='return confirmSubmit()'>Kirim</button>
                    </center>
                    <br>
                    
                  </form>
                </div>
              </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
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
  <script LANGUAGE="JavaScript">
    function confirmSubmit()
    {
      var agree=confirm("Pastikan anda sudah mengisi data dengan benar! Tekan tombol OK untuk mengirim pesan.");
      if (agree)
      return true ;
      else
      return false ;
    }
  </script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>