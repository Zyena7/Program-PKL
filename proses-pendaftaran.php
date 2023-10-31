<?php
// Lakukan koneksi ke database sesuai dengan konfigurasi Anda
include "koneksi.php";

// Periksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir pendaftaran
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lakukan validasi data, misalnya: periksa apakah email sudah terdaftar

    // Jika email sudah terdaftar, munculkan pesan error
    // Anda bisa menggunakan query SELECT ke database untuk memeriksa apakah email sudah ada di database

    // Contoh query untuk memeriksa apakah email sudah terdaftar
    $query = "SELECT * FROM tbl_masyarakat WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email sudah terdaftar, tampilkan pesan error
        header("location: register.php?pesan=email_sudah_terdaftar");
        exit();
    }

    // Jika email belum terdaftar, lakukan proses pendaftaran
    // Hash password sebelum menyimpannya di database (disarankan menggunakan algoritma hashing yang aman)
    $md5_password = md5($password);

    // Simpan data pengguna ke database
    $insert_query = "INSERT INTO tbl_masyarakat (nik, nama, email, password) VALUES ('$nik', '$nama', '$email', '$md5_password')";
    if (mysqli_query($koneksi, $insert_query)) {
        // Pendaftaran berhasil, redirect ke halaman login
        header("location: login.php?pesan=registrasi_berhasil");
    } else {
        // Pendaftaran gagal, tampilkan pesan error
        header("location: register.php?pesan=registrasi_gagal");
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
} else {
    // Jika akses ke halaman ini bukan melalui POST request, redirect ke halaman pendaftaran
    header("location: register.php");
}
?>