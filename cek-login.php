<?php
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

// Menyeleksi data masyarakat dengan email dan password yang sesuai
$query = "SELECT * FROM tbl_masyarakat WHERE email='$email' AND password='$password'";
$result = mysqli_query($koneksi, $query);

// Menghitung jumlah data yang ditemukan
$count = mysqli_num_rows($result);

if ($count == 1) {
    // Jika data ditemukan, set session
    $see = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $_SESSION['nama'] = $see['nama'];
    $_SESSION['id_masyarakat'] = $see['id_masyarakat'];
    header("location:index.php");
} else {
    // Jika data tidak ditemukan, arahkan kembali ke halaman login dengan pesan gagal
    header("location:login.php?pesan=gagal");
}

// Tutup koneksi database (jika diperlukan)
mysqli_close($koneksi);
?>
